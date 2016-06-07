## angular.fromJson

Deserializes a JSON string.
(反序列化Json字符串)

## Usage
```js
angular.fromJson(json);
```

## Arguments
|Param|Type|Details|
|-----|----|-------|
|json|string|JSON string to deserialize.|

## Returns
object/Array/string/number - Deserialized JSON string.

## Example
```js
<!DOCTYPE HTML>
<html ng-app="exampleApp">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<div>
    <div>
        angular.fromJson("{\"firstName\":\"fox\",\"lastName\":\"zhang\"}")
    </div>

    <div id="myCtrl" ng-controller="ShowController">

        <input type="button" id="btnToJson" ng-click="fromJson()" value="objUser.firstName"/>
    </div>

</div>
</body>
</html>
<script src="../../../vendor/angular-1.4.8/angular.min.js"></script>
<script>
    var exampleApp = angular.module('exampleApp', []);

    exampleApp.controller('ShowController', ['$scope', function ($scope) {


        $scope.fromJson = function () {
            var strUser = "{\"firstName\":\"fox\",\"lastName\":\"zhang\"}";
            alert(strUser.firstName); //undefined
            var objUser = angular.fromJson(strUser);
            alert(objUser.firstName);//fox
        }

    }]);
</script>
```
