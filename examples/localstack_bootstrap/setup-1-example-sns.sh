#!/usr/bin/env bash

set -euo pipefail

# Enable debug
# set -x

echo "=========================="
echo "Creating sample SNS topics"
echo "=========================="

HOST=localhost
PORT=${EDGE_PORT:-4566}
REGION=${AWS_REGION:-us-east-1}
BASE_URL="http://$HOST:$PORT"

TOPIC_NAMES=(
  "example-send-notifications-topic"
  "example-unsubscribed-topic"
)

create_topic() {
  local TOPIC_NAME=$1

  echo "Creating SNS Topic: [$TOPIC_NAME]"
  awslocal --endpoint-url="$BASE_URL" sns create-topic \
    --name "$TOPIC_NAME" \
    --region "$REGION"
}

for TOPIC_NAME in "${TOPIC_NAMES[@]}"; do
  create_topic "${TOPIC_NAME}"
done

echo "Topics created:"
awslocal --endpoint-url="$BASE_URL" sns list-topics --region "$REGION"