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
    if(urlParse.pathname == '/new'){
        // res.write(res.statusCode.toString());
        if(typeof newItem == 'undefined') newItem = new App();
        var arg = {
            name: urlParse.query.name,
            count: urlParse.query.count
        };
        newItem.add(arg);
        res.end(newItem.response);

    }
    else if(urlParse.pathname == '/add'){
        // res.end(`${newItem}`);
        if(typeof newItem == 'undefined') res.end('На складе нет ни одного товара');
        else {
            var b = newItem.cl;
            for(var i = 0; i < b; i++){
                if(newItem[i].name == urlParse.query.name) {
                    newItem.update(i, urlParse.query.count);
                    var r = `Идентефикатор товара "${newItem[i].name}" - ${i}\nНовое количество товара - ${urlParse.query.count}`;
                    break
                }
            }
            res.end(r);
        }
    }
    else if(urlParse.pathname == '/sklad'){
        res.end(JSON.stringify(newItem));
    }
}
server.listen(port);