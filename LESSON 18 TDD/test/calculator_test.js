'use strict';
let assert = require('assert');
let Calculator = require('../Class/calculator.js');

function createCalculator() {
    return new Calculator();
}

describe('string calculator factorial', function () {
    it('should return 0 if fist param is empty', function(){
        let calculator = createCalculator();

        let factorial = calculator.number('');

        assert.equal(factorial, 0);
    });
    it('should return 1 if first param is 0', function () {
        let calculator = createCalculator();

        let factorial = calculator.number(0);

        assert.equal(factorial, 1);

    });
    it('should return 2 factorial if first param is 2', function () {
        let calculator = createCalculator();

        let factorial = calculator.number(2);

        assert.equal(factorial, 2);

    });
    it('should return 6 factorial if first param is 3', function () {
        let calculator = createCalculator();

        let factorial = calculator.number(3);

        assert.equal(factorial, 1*2*3);

    });
    it('should return 1*2*3*4*5*6*7*8*9*10 factorial if first param is 10', function () {
        let calculator = createCalculator();

        let factorial = calculator.number(10);

        assert.equal(factorial, 1*2*3*4*5*6*7*8*9*10 );

    });
    it('should return 1*2*3*4*5*__*7*8*9*10 factorial if first param is 10 and second param is 6', function () {
        let calculator = createCalculator();

        let factorial = calculator.number(10, 6);

        assert.equal(factorial, 1*2*3*4*5*7*8*9*10 );

    });
    it('should return 1*2*3*4*5*6*7*__*9*10 factorial if first param is 10 and second param is 6', function () {
        let calculator = createCalculator();

        let factorial = calculator.number(10, 8);

        assert.equal(factorial, 1*2*3*4*5*6*7*9*10 );

    });
})