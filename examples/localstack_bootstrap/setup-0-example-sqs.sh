#!/usr/bin/env bash

set -euo pipefail

# enable debug
# set -x

echo "=========================="
echo "Creating sample SQS queues"
echo "=========================="

QUEUE_NAMES=(
  "example-send-email-queue"
  "example-process-payment-queue"
  "example-generate-thumbnail-queue"
  "example-consolidate-reports-queue"
  "example-slack-notification-queue"
)

HOST=localhost
PORT=${EDGE_PORT:-4566}
REGION=${AWS_REGION:-us-east-1}
BASE_URL="http://$HOST:$PORT"

create_queue_with_dlq() {
  local QUEUE_NAME=$1
  local DLQ_NAME="${QUEUE_NAME}-dlq"

  echo "Creating DLQ: [$DLQ_NAME]"

  local DLQ_URL=$(awslocal --endpoint-url="$BASE_URL" sqs create-queue \
    --queue-name "$DLQ_NAME" \
    --region "$REGION" \
    --query 'QueueUrl' --output text
  )

  local DLQ_SQS_ARN=$(awslocal \
    --endpoint-url="$BASE_URL" sqs get-queue-attributes \
    --attribute-names QueueArn \
    --queue-url="$DLQ_URL" \
    | sed 's/"QueueArn"/\n"QueueArn"/g' | grep '"QueueArn"' | awk -F '"QueueArn":' '{print $2}' | tr -d '"' | xargs
  )

  echo "Creating queue: [$QUEUE_NAME]"

  awslocal --endpoint-url="$BASE_URL" sqs create-queue \
    --queue-name "$QUEUE_NAME" \
    --attributes '{
      "RedrivePolicy": "{\"deadLetterTargetArn\":\"'"$DLQ_SQS_ARN"'\",\"maxReceiveCount\":\"2\"}",
      "VisibilityTimeout": "10"
    }' \
    --region "$REGION"
}

for QUEUE_NAME in "${QUEUE_NAMES[@]}"; do
  create_queue_with_dlq "${QUEUE_NAME}"
done

echo "Queues created:"
awslocal --endpoint-url="$BASE_URL" sqs list-queues