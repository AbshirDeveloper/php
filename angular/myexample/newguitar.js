var app=angular.module("myapp");

app.factory("second",function($resource){
    return {
           getEvent2 : function()
           {
           return $resource('/myexample/files/:id', {id:'@id'}).get({id:'guitardata.json'});
           }
    };
});