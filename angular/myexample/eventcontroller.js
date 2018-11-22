var app=angular.module("myapp");
 
 app.controller("eventcontroller",function($scope,$location,eventservice,second,$resource){
   
    eventservice.getEvent().$promise.then(function(event1){
    	$scope.event1=event1;
    	console.log(event1);
    },function(response1){console.log(response1);
    });

    
 });