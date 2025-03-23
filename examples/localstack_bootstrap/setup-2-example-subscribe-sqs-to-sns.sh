#!/usr/bin/env bash

set -euo pipefail

# Enable debug
# set -x

echo "=========================="
echo "Subscribing SQS to SNS"
echo "=========================="

HOST=localhost
PORT=${EDGE_PORT:-4566}
REGION=${AWS_REGION:-us-east-1}
ACCOUNT=${AWS_ACCOUNT_ID:-000000000000}
BASE_URL="http://$HOST:$PORT"

create_subscription() {
  local TOPIC_NAME=$1
  local QUEUE_NAME=$2

  awslocal --endpoint-url="$BASE_URL" sns subscribe \
    --topic-arn "arn:aws:sns:$REGION:$ACCOUNT:$TOPIC_NAME" \
    --protocol sqs \
    --notification-endpoint "arn:aws:sqs:$REGION:$ACCOUNT:$QUEUE_NAME" \
    --attributes RawMessageDelivery=true \
    --region "$REGION"
}

echo "Subscribe queues to the topic: example-send-notifications-topic"
create_subscription "example-send-notifications-topic" "example-send-email-queue"
create_subscription "example-send-notifications-topic" "example-slack-notification-queue"

echo "Subscriptions created:"
awslocal --endpoint-url="$BASE_URL" sns list-subscriptions --region "$REGION"