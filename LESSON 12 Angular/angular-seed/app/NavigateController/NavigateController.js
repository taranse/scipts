'use strict';

angular
    .module('myApp')
    .controller('NavigateController', function() {

    var vm = this;
	vm.phone = true;
	vm.addAccount = function(myAccount) {
		vm.myAccount = myAccount;
    };

});