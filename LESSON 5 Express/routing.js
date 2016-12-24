'use strict';
const express = require('express');
const router = express.Router();

router.get('/', (req, res) => {
	res.statusCode = 200; //Если я правильно понимаю, эту строчку писать не обязательно, код ответа и так будет 200
	res.end('Hello Express.js');
});
router.get('/hello', (req, res) => {
	res.statusCode = 200; 
	res.end('Hello stranger !');	
});
router.get('/hello/:name', (req, res) => {
	res.statusCode = 200; 
	let name = req.params.name;
	res.end(`Hello, ${name} !`);	
});
router.post('/post', (req, res) => {
	if(Object.keys(req.body).length) {
		if(req.headers.key) res.json(req.body);		
		else{
			res.statusCode = 401;
			res.end('Not Found key');
		}
	}
	else{
		res.statusCode = 404;
		res.end('Not Found');
	}
});
router.use('/sub/*', (req,res,next) => {
	res.statusCode = 200; 
	res.end(`You requested URI: ${req.baseUrl}`);	
})

module.exports = router;