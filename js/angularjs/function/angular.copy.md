## angular.copy

Creates a deep copy of source, which should be an object or an array.

+ If no destination is supplied, a copy of the object or array is created.
+ If a destination is provided, all of its elements (for arrays) or properties (for objects) are deleted and then all elements/properties from the source are copied to it.
+ If source is not an object or array (inc. null and undefined), source is returned.
+ If source is identical to 'destination' an exception will be thrown.

## Usage
```js
angular.copy(source,[descination]);
```

## Arguments
|param|type|Detail|
|-----|----|------|
|source|Object|The source that will be used to make a copy. Can be any type, including primitives, null, and undefined.|
|destination(optional)|object/array|Destination into which the source is copied. If provided, must be of the same type as source.|

## Example
```html
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Example - example-example46-production</title>
  

  <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular.min.js"></script>
  

  
</head>
<body ng-app="copyExample">
  <div ng-controller="ExampleController">
<form novalidate class="simple-form">
Name: <input type="text" ng-model="user.name" /><br />
E-mail: <input type="email" ng-model="user.email" /><br />
Gender: <input type="radio" ng-model="user.gender" value="male" />male
<input type="radio" ng-model="user.gender" value="female" />female<br />
<button ng-click="reset()">RESET</button>
<button ng-click="update(user)">SAVE</button>
</form>
<pre>form = {{user | json}}</pre>
<pre>master = {{master | json}}</pre>
</div>

<script>
 angular.module('copyExample', [])
   .controller('ExampleController', ['$scope', function($scope) {
     $scope.master= {};

     $scope.update = function(user) {
       // Example with 1 argument
       $scope.master= angular.copy(user);
     };

     $scope.reset = function() {
       // Example with 2 arguments
		$scope.master = {};
        angular.copy($scope.master, $scope.user);
     };

     $scope.reset();
   }]);
</script>
</body>
</html>
```
