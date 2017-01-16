'use strict';
class Calculator {
    constructor(){
        this.defaultEmptyValue = 0;
    }
    number(input, skip){
        if(this.isEmpty(input)) {
            return this.defaultEmptyValue;
        }
        let factorial = this.factorialWhile(input, skip);
        return this.isNull(factorial);
    }

    factorialWhile(input, skip) {
        let factorial = 1;
        for (let i = 1; i <= input; i++) {
            if(i == skip) continue;
            factorial *= i;
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