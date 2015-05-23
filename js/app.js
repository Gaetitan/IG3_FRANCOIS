(function(){
	var app=angular.module('ruedelasoif', []);

	app.controller('FormController', function(){
		this.form = 1;

		this.setForm = function(newValue){
			this.form = newValue;
		};

		this.isSet = function(formName){
			return this.form === formName;
		};
	});
	
})();
