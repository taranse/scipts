"use strict";

//----------------------------------------------------

const Readable  = require("stream").Readable;
const Writable  = require("stream").Writable;
const Transform   = require("stream").Transform;

//--------------)>

class CReadable extends Readable {
  constructor(options) {
    super(options);
  }

  _read() {
    function gen() {
      const idx = Math.floor(Math.random( ) * (20+1));
      return idx;
    }
    this.push(gen().toString());
  }
}

class CWritable extends Writable {
  constructor(options) {
    super(options);
  }

  _write(chunk, encoding, done) {
    console.log(chunk.toString());
    done();
  }
}

class CLimit extends Transform {
  constructor(max, options) {
    super(options);
    this.letensy1 = typeof max != "undefined" ? max : 1000;
  }

  _transform(chunk, encoding, done) {
      setInterval(() => {
        this.push('transform - ' + chunk.toString())
      }, this.letensy1)
  }
}
//--------------)>

const read = new CReadable();
const write = new CWritable();
const tr = new CLimit(1000);
read.pipe(write);
read.pipe(tr).pipe(write);