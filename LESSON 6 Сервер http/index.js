const http = require('http');
const url = require('url');
const port = 3000;
const server = http.createServer();
server.on('error', err => console.error(err));
server.on('request', handler);

function handler(req, res) {
    console.log(req.method, req.url);
    const urlParse = url.parse(req.url, true);
        res.end(JSON.stringify(urlParse));
}
server.listen(port);