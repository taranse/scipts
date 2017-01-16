'use strict';
class Calculator {
    constructor(){
        this.defaultEmptyValue = 0;
    }
    number(input){
        if(this.isEmpty(input)) {
            return this.defaultEmptyValue;
        }
        let factorial = this.factorialWhile(input);
        return this.isNull(factorial);
    }

    factorialWhile(input) {
        let factorial = 1;
        for (let i = 1; i < input; i++) {
            factorial *= i + 1;
        }
        return factorial;
    }
    isNull(input){
        return parseInt(input, 10) == 0 ? 1 : parseInt(input, 10);
    }
    isEmpty(input) {
        return input == undefined || input === '';
    }
}
module.exports =  Calculator;