FROM node:11.15.0 AS build

WORKDIR /app

COPY src/package* /app/

RUN npm install

## ---------------------------------------
FROM node:11.15.0-alpine

WORKDIR /app

COPY --from=build --chown=node:node /app/node_modules /app/node_modules
COPY --chown=node:node src/ /app/

#RUN npm run test
RUN npm rebuild node-sass

USER node

ENV NODE_ENV=prod

CMD ["node -r esm /app/server.js"]
