const express = require("express");
let app = module.exports = express();
//----------------------------------

app.get('/:method', (req, res) => {
    let method = req.params.method;
   switch (method) {
       case 'create':
           res.send(users.create(req.query));
           break;
       case 'read':
           break;
       case 'update':
           break;
       case 'deleate':
           break;
   }
});