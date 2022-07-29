FROM mysql:8.0.30

WORKDIR /app
COPY . . 
RUN npm install --production
CMD ["node", "/app/src/indewx.js"]

