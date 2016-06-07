## angular.equals
Determines if two objects or two values are equivalent. Supports value types, regular expressions, arrays and objects.
(判断两个对象或者值是否相等 , 支持值类型、正则表达式、数组和对象)

Two objects or values are considered equivalent if at least one of the following is true:
(两个对象或者值被认为相等 , 如果至少一个是相等的)

- Both objects or values pass === comparison.
(两个对象或者值 通过 === 比较)

- Both objects or values are of the same type and all of their properties are equal by comparing them with angular.equals.
(两个对象或值拥有同样的类型和原型 , 由 angular.equals 来比较)

- Both values are NaN. (In JavaScript, NaN == NaN => false. But we consider two NaN as equal)
(两个对象都是NaN , 在JavaScript中 NaN == NaN => false , 但是我们认为两个NaN是相等的)

- Both values represent the same regular expression (In JavaScript, /abc/ == /abc/ => false. But we consider two regular expressions as equal when their textual representation matches).
(两个相同的正则表达式(在Javascript, /abc/ == /abc/ => false.但是我们认为两个这则表达式相等是通过他们匹配的文本))

During a property comparison, properties of function type and properties with names that begin with $ are ignored.
(属性比较 , 方法类型原型 和 以$开头的名称的原型 都被忽略)

Scope and DOMWindow objects are being compared only by identify (===).
(Scope 和 DOMWindow 对象 通过 === 来比较)

## Usage
```js
angular.equals(o1, o2);
```

## Arguments
|Param|Type|Details|
|-----|----|-------|
|o1|*|Object or value to compare.|
|o2|*|Object or value to compare.|

## Returns
Boolen - True if arguments are equal.

