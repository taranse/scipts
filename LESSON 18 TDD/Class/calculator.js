'use strict';
class Calculator {
    constructor(){
        this.defaultEmptyValue = 0;
    }
    number(input){
        if(this.isEmpty(input)) {
            return this.defaultEmptyValue;
        }
        return this.isNull(input);
    }
    isNull(input){
        return parseInt(input, 10) == 0 ? 1 : parseInt(input, 10);
    }
    isEmpty(input) {
        return input == undefined || input === '';
    }
}
module.exports =  Calculator;