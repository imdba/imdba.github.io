## angular.bootstrap

Use this function to manually start up angular application

start up angular application

```html
<!doctype html>
<html>
<body>
<div ng-controller="WelcomeController">
  {{greeting}}
</div>

<script src="angular.js"></script>
<script>
  var app = angular.module('demo', [])
  .controller('WelcomeController', function($scope) {
      $scope.greeting = 'Welcome!';
  });
  angular.bootstrap(document, ['demo']);
</script>
</body>
</html>
```

## Usage
```js
angular.bootstrap(element,[modules],[config]);
```

## Arguments
|Prame|Type|Details|
| ----- | ---- | ------- |
|element|DOMElement|DOM element which is the root of angular application.|
|modules | array(string,fuction,array) | an array of modules to load into the application. Each item in the array should be the name of a predefined module or a (DI annotated) function that will be invoked by the injector as a config block. See: modules |
|config|object|an object for defining configuration options for the application. The following keys are supported:strictDi - disable automatic function annotation for the application. This is meant to assist in finding bugs which break minified code. Defaults to false.|

