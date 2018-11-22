var app=angular.module("myapp",['ngRoute','ngResource']);

app.config(function($routeProvider,$locationProvider){
 $routeProvider.when('/newEvent',{
 	templateUrl:"Allevents.html",
 	controller:"eventcontroller"
 }),

 $routeProvider.when('/list',{
	templateUrl:"newguitar.html",
	controller:"event"
}

);
 
  
});

