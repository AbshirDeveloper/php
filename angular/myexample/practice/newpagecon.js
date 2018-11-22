var app = angular.module("newapp");


app.controller("first", function($scope){
    $scope.title = "Welcome"
    $scope.message = "this is the first page";
})

app.controller("second", function($scope){
    $scope.title = "Welcome",
    $scope.message = "This is the second page"
})

app.controller("third", function($scope){
    $scope.title = "Welcome",
    $scope.message = "this is the third page"
})