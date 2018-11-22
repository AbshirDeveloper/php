var app = angular.module("newapp", ['ngRoute','ngResource']);


app.config(function($routeProvider, $locationProvider){
$routeProvider.when('/third', {
    templateUrl: "third.php",
    controller: "third"
}),
$routeProvider.when('/second', {
    templateUrl: "second.php",
    controller: "second"
}),
$routeProvider.when('/first', {
    templateUrl: "first.php",
    controller: "first"
})
})



