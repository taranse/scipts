'use strict';
let assert = require('assert');
let Calculator = require('../Class/calculator.js');

describe('string calculator factorial', function () {
    it('should return 0 if fist param factorial is empty', function(){
        let calculator = new Calculator();

        let factorial = calculator.number('');

        assert.equal(factorial, 0);
    })
})