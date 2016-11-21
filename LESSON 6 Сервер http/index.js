const http = require('http');
const url = require('url');

const App = require('./add');
//------------------------------

const port = 3000;
const server = http.createServer();
var newItew;

server.on('error', err => console.error(err));
server.on('request', handler);

function handler(req, res) {
    const urlParse = url.parse(req.url, true);
    switch (urlParse.pathname) {
        case '/new' :
            if (typeof newItem == 'undefined') newItem = new App();
            var arg = {
                name: urlParse.query.name,
                count: urlParse.query.count
            };
            res.end(JSON.stringify(newItem.add(arg)));
            break;
        case '/add':
            if (typeof newItem == 'undefined') res.end('На складе нет ни одного товара');
            else {
                urlParse.query.id ?
                    (
                        urlParse.query.count ?
                            res.end(JSON.stringify(newItem.update(urlParse.query.id, urlParse.query.count))) : res.end("Введите новое количество товара")
                    ) : res.end("Введите идентефикатор товара");
                // newItem.update(urlParse.query.id, urlParse.query.count);
            }
            break;
        case '/sklad':
            if (typeof newItem == 'undefined') res.end('На складе нет ни одного товара');
            else res.end(JSON.stringify(newItem.getSklad()));
            break;
        case '/delete':
            if (typeof newItem == 'undefined') res.end('На складе нет ни одного товара');
            else urlParse.query.id ? res.end(newItem.delete(urlParse.query.id)) : res.end("Введите идентефикатор товара");
            break;
        default:
            res.statusCode = 404;
            res.end('page not found');
    }
}
server.listen(port);