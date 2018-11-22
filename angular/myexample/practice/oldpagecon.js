var app = angular.module("newapp");

app.controller("old", function($scope, $location){

    $scope.first = function(){
        $location.path("first");
    }

    $scope.second = function(){
        $location.path("second");
    }

    $scope.third = function(){
        $location.path("third");
    }
    
    })