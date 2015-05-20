(function(){
	var app=angular.module('ruedelasoif', []);
	
	app.controller('BarathonController', function(){
		this.evenements=soirees;
	});
	
	app.controller('TabController', function(){
		this.tab=1;
		this.setTab=function(setTab){
			this.tab=setTab;
		};
		this.isSet=function(checkTab){
			return this.tab===checkTab;
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
