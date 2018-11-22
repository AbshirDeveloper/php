var app = angular.module("myapp");

app.controller("parentscope", function($rootScope){
    $rootScope.color = "Red";
})

app.controller("second", function($scope){
    $scope.color = "green";
    $scope.arr = [1,2,3,4,5,6];
    $scope.letters = ["ab","cd","ef","gh","ij","kl"];
    $scope.names = [
        {name: 1, country: "India"},
        {name: 2, country: "Somalia"},
        {name: 3, country: "America"},
        {name: 4, country: "Pakistan"}
    ]
   
})
//app.controller("firstcon", function($scope){
//    $scope.firstname = "Protek";
//    $scope.arr = [1,2,3,4];
//    $scope.show = function(a){
//    $scope.firstname = "Header Changed";
//    $scope.arr.push(a);
//    }
//});
//
//app.controller("secondcon", function($scope){
//    $scope.check = true;
//    $scope.middle = "Chicago";
//    $scope.change = function(){
//        if($scope.check){
//            $scope.check = false;
//        } else {
//            $scope.check = true;
//        }
//    }
//});

//app.controller("second", function($scope){
    
//    $scope.name = "Google";
//    $scope.link = "http://www.google.com";
//    $scope.change = function(){
//    $scope.link = "http://www.yahoo.com";
//    $scope.name = "Yahoo"
//    }
//    $scope.lastname = "consulting";
//})