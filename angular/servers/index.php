<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.min.js"></script> 
<script src="app.js"></script>  
<script src="app2.js"></script> 
</head>
<body ng-app="myapp">
<div ng-controller="fetched">
<div id="whole" ng-repeat="x in user.allProducts">
<style>
    #box {
        border-style: dotted;
        width: 500px;
        float: left;
        margin-left: 5px;
        height: 750px;
    }
    #inside{
        margin-left: 10px;
    }
    #whole {
        width: 1100px;
    }
</style>
<div id="box">
<!--
<div id="inside">
<p><h3>product discription:</h3><span>{{x.productdiscription}}</span></p>
<p><h3>shipping details:</h3><span>{{x.shippingdetails}}</span></p>
<p><h3>custmer reviews:</h3><span>{{x.custmerreviews}}</span></p>
<p><h3>price:</h3><span>{{x.price}}</span></p>
<p><h3>imagepath:</h3><span>{{x.imagepath}}</span></p>
<p><h3>stock availability:</h3><span>{{x.stockavailability}}</span></p>
<p><h3>noof items:</h3><span>{{x.noofitems}} </span></p>
</div>


-->  
</div>
</div>   
</div>
<input type="text" ng-model="x" />

{{x}}
</body>

</html>