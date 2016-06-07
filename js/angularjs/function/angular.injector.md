## angular.injector

Creates an injector object that can be used for retrieving services as well as for dependency injection (see dependency injection).

i think it looks like $injector

## Usage
```js
angular.injector(modules,[strictDi])
```

## Arguments
|Param|Type|Details|
|-----|----|-------|
|modules|Array.<string/Function>|A list of module functions or their aliases. See angular.module. The ng module must be explicitly added.|
|strictDi|boolean|Whether the injector should be in strict mode, which disallows argument name annotation inference.(default: false)|


## return 
injector - Injector object. See $injector.

## Example
```js
var $injector = angular.injector(['ng']);
// use the injector to kick off your application
// use the type inference to auto inject arguments, or use implicit injection
$injector.invoke(function($rootScope, $compile, $document) {
  $compile($document)($rootScope);
  $rootScope.$digest();
});
```

Sometimes you want to get access to the injector of a currently running Angular app from outside Angular. Perhaps, you want to inject and compile some markup after the application has been bootstrapped. You can do this using the extra injector() added to JQuery/jqLite elements. See angular.element.

This is fairly rare but could be the case if a third party library is injecting the markup.

In the following example a new block of HTML containing a ng-controller directive is added to the end of the document body by JQuery. We then compile and link it into the current AngularJS scope.

```js
var $div = $('<div ng-controller="MyCtrl">{{content.label}}</div>');
$(document.body).append($div);
angular.element(document).injector().invoke(function($compile) {
  var scope = angular.element($div).scope();
  $compile($div)(scope);
});
```