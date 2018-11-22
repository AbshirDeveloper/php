app.controller("fetched", function($scope, $http){
    $http.get("guitardata.json").then(function(response){
    $scope.user = response.data;    
    },
    function(reason){
    $scope.error = reason;    
    }
)
})

