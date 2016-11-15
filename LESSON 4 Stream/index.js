"use strict";

//----------------------------------------------------

const fs    = require("fs");
const crypto = require('crypto');

//----------------------------------------------------

var hash = crypto.createHash('md5');
const input = fs.createReadStream("data.txt");
const output = fs.createWriteStream("copy.txt");

// input.pipe(hash).pipe(output);
// input.pipe(hash).pipe(process.stdout);

//--------Первая часть конец--------


//--------Вторая часть--------
const Transform   = require("stream").Transform;
class Trans extends Transform {
    constructor(options) {
        super(options);
    }
    _transform(chunk, encoding, done) {
        this.setEncoding('hex');
        this.push(chunk);
        done();
    }
}
const tr = new Trans();
const copy = input.pipe(tr);
copy.pipe(output);
copy.pipe(process.stdout);