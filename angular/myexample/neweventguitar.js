var app=angular.module("myapp");

app.controller("event",function($scope,$location,eventservice,second,$resource){

     second.getEvent2().$promise.then(function(event){
         $scope.event2=event;
         console.log(event2);
     },function(response2){console.log(response2);
     });
     
  });