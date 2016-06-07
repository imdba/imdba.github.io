## angular.element

Wraps a raw DOM element or HTML string as a jQuery element.

If jQuery is available, angular.element is an alias for the jQuery function. If jQuery is not available, angular.element delegates to Angular's built-in subset of jQuery, called "jQuery lite" or "jqLite."

## methods
- controller(name) - retrieves the controller of the current element or its parent. By default retrieves controller associated with the ngController directive. If name is provided as camelCase directive name, then the controller for this directive will be retrieved (e.g. 'ngModel').
- injector() - retrieves the injector of the current element or its parent.
- scope() - retrieves the scope of the current element or its parent. Requires Debug Data to be enabled.
- isolateScope() - retrieves an isolate scope if one is attached directly to the current element. This getter should be used only on elements that contain a directive which starts a new isolate scope. Calling scope() on this element always returns the original non-isolate scope. Requires Debug Data to be enabled.
- inheritedData() - same as data(), but walks up the DOM until a value is found or the top parent element is reached.


## Usage
```js
angular.element(element);
```

## Arguments
|Param|Type|Details|
|-----|----|-------|
|element|string/DOMElement|HTML string or DOMElement to be wrapped into jQuery.|

## Returns
Object - jquery object