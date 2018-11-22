var app=angular.module("myapp");

app.factory("eventservice",function($resource){
    return {
           getEvent : function()
           {
           return $resource('/myexample/files/:id', {id:'@id'}).get({id:'1.json'});
           }
    };
});