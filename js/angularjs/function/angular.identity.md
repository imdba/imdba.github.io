## angular.identity

A function that returns its first argument. This function is useful when writing code in the functional style.
(返回第一个参数的函数 , 这个函数用于编写功能风格代码)

```js
function transformer(transformationFn, value) {
  return (transformationFn || angular.identity)(value);
};
```

## Usage
```js
angular.identity(value)
```

## Arguments
|Param|Type|Details|
|-----|----|-------|
|value|*|to be returned.|

Returns
* - the value passed in


## Examples
```js
<!DOCTYPE HTML>
<html ng-app="exampleApp">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="../../../vendor/angular-1.4.8/angular.min.js"></script>
    <script>
        var exampleApp = angular.module('exampleApp',[]);
        exampleApp.controller('ShowController',['$scope', function($scope){
            $scope.result = "";
            $scope.double = function(n){
                return n*2;
            }
            $scope.triple = function(n){
                return n*3;
            }
            $scope.answer = function(fn, val){
                return (fn || angular.identity)(val);
            }
            $scope.show = function(){
                $scope.result = $scope.answer($scope.double, 3);
				//这里可以传,double方法 , 也可传 triple 方法  , 这个算是设计模式(装饰者 ? )的一种
            }
        }]);
    </script>
</head>
<body>
<div>
    <div>
        angular.identity
    </div>
    <div id="myCtrl" ng-controller="ShowController">
        <input type="button" id="btn" ng-click="show()" value="answer" />
        :<input type="text" id="answer" ng-model="result" />
    </div>
</div>
<hr>
</body>
</html>
```
