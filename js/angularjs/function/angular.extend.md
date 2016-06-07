## angular.extend (深拷贝)

Extends the destination object dst by copying own enumerable properties from the src object(s) to dst .
(从src对象复制自己的枚举属性 ,扩展目标对象 dst)

You can specify multiple src objects.
(你可以指定多个src对象)

if you want to preserve original objects,
you can do so by passing an empty object as the target : 
(如果你想保留原来的对象,你可以通过传递一个空对象为目标,这样做:)

```js
var object = angular.extend({},object1,object2)
```

## Usage
```js
angular.extend(dst,src);
```

## Arguments
|Param|Type|Details|
|-----|----|-------|
|dst|object|Destination object.|
|src|object|Source object(s).|

## Returns
Object - Reference to dst.

## examples

[The diff for jqueyr.extend and angular.extend](http://stackoverflow.com/questions/16797659/jquery-extend-vs-angular-extend)
```js
//This is angular.extend
var src = {foo: "bar", baz: {}};
var dst = angular.copy(src);
console.log(dst.baz === src.baz); 
// "false", it's a deep copy, they point to different objects.

//This is jQuery.extend
var src = {foo: "bar", baz: {}};
var dst = {};
whatever.extend(dst, src);
console.log(dst.foo);             // "bar"
console.log(dst.baz === src.baz); // "true", it's a shallow copy, both
                                  // point to same object
```

```js
<!DOCTYPE html>
<html>
<head>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="https://github.com/angular/angular.js"></script>
<meta charset=utf-8 />
<title>Extend!</title>
</head>
<body>
  <script>
    (function() {
      "use strict";
      var src1, src2, dst, rv;

      src1 = {
        a: "I'm a in src1",
        b: {name: "I'm the name property in b"},
        c: "I'm c in src1"
      };
      src2 = {
        c: "I'm c in src2"
      };

      // Shallow copy test
      dst = {};
      angular.extend(dst, src1);
      display("angular shallow copy? " + (dst.b === src1.b));
      dst = {};
      jQuery.extend(dst, src1);
      display("jQuery shallow copy? " + (dst.b === src1.b));
      $("<hr>").appendTo(document.body);

      // Return value test
      dst = {};
      rv = angular.extend(dst, src1);
      display("angular returns dst? " + (rv === dst));
      dst = {};
      rv = jQuery.extend(dst, src1);
      display("jQuery returns dst? " + (rv === dst));
      $("<hr>").appendTo(document.body);

      // Multiple source test
      dst = {};
      rv = angular.extend(dst, src1, src2);
      display("angular does multiple in order? " +
                  (dst.c === src2.c));
      dst = {};
      rv = jQuery.extend(dst, src1, src2);
      display("jQuery does multiple in order? " +
                  (dst.c === src2.c));

      function display(msg) {
        $("<p>").html(String(msg)).appendTo(document.body);
      }
    })();
  </script>
</body>
</html>
```

[The diff for angular.copy and extend](http://www.tuicool.com/articles/En6Jve)
```js
//It creates a deep copy of source object or array and assign it to destination where ‘destination’ is optional. By writing deep copy, we mean that a new copy of the referred object is made. For example:
var mySource = {'name' : 'sakshi', 'age' : '24', 'obj' :{'key':'value'}}
var myDest = {}
angular.copy(mySource, myDest);
console.log(myDest);
//{'name' : 'sakshi', 'age' : '24', 'obj' :{'key':'value'}}

//angular.extend(destination, src1, src2 …) : It creates a shallow copy of one or more sources provided and assign them to destination. For example:
var mySource1 = {'name' : 'neha', 'age' : '26', obj2 : {}}
var mySource2 = {'course' : 'MCA'}
var myDest = {}
angular.extend(myDest, mySource1,mySource2)
console.log(myDest);
//{name: "neha", age: "26", course: "MCA", obj2: Object}

//angular.copy() is slower than angular.extend()
```