'use strict';
class Calculator {
    constructor(){
        this.defaultEmptyValue = 0;
    }
    number(input){
        if(this.isEmpty(input)) {
            return this.defaultEmptyValue;
        }
        return 1;
    }

    isEmpty(input) {
        return input == undefined || input === '';
    }
}
module.exports =  Calculator;