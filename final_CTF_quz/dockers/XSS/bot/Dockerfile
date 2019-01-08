FROM node:alpine

RUN adduser -D -s /bin/ash bot \
    && cd /home/bot \
    && npm init -f \
    && npm install zombie@5.x --save-dev \
    && apk add --no-cache python3

USER bot

WORKDIR /home/bot
