(function(){
	var app=angular.module('ruedelasoif', []);
	
	app.controller('BarathonController', function(){
		this.evenements=soirees;
	});
	
	app.controller('TabController', function(){
		this.tab = 0;

		this.setTab = function(newValue){
			this.tab = newValue;
		};

		this.isSet = function(tabName){
			return this.tab === tabName;
		};
	});
	
	app.controller('FormController', function(){
		this.form = 0;

		this.setForm = function(newValue){
			this.form = newValue;
		};

		this.isSet = function(formName){
			return this.form === formName;
		};
		

		
	});
	
	
	var soirees=[
		{
			nom: 'Stannis',
			ville: 'Montpellier',
			date: '1433181600',
			image: "images/stannis.jpg"
		},
		{
			nom: 'Nuit de l\'ingénieur',
			ville:'Montpellier',
			date:'1431544500',
			image: "images/nuitdelingenieur.gif"
		},
		{
			nom: 'L\'ambiance',
			ville:'Marseille',
			date:'1434223800',
			image: "images/lambiance.jpg"
		}
	];
})();
