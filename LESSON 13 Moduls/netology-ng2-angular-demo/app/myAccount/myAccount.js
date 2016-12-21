'use strict';

angular
    .module('myApp')
    .controller('myAccount', function() {

    var vm = this;
	vm.phone = true;
	vm.addAccount = function(myAccount) {
		vm.myAccount = myAccount;
    };

});