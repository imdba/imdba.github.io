## angular.forEach (循环)

Invoke the iterator function once for each item in obj colletion, which can be either an object or an array.
(调动一个迭代函数在object集合中每次获取一个,可以为一个对象或者是数组)

The iterator function is invoked with iterator(value,key,obj) , where value is the value of an object property or an array element , key is the object property key or array element index and obj is the obj itself . 
这个迭代方法被申明 ```js iterator(value,key,obj) ``` ,其中的value是指对象或者数组中的一个元素 , key是对象的属性键或者是数组的索引,而 obj 则为对象本身)

Specifying a context for the function is optional.
(指定内容对于方法是可选的)

It is worth noting that .forEach does not iterate over inherited properties because it filters using the hasOwnProperty method.
(值得一提的是,forEach不便利继承属性 , 因为它过滤 hasOwnProperty 方法)

Unlike ES262's Array.prototype.forEach, Providing 'undefined' or 'null' values for obj will not throw a TypeError, but rather just return the value provided.
(与ES262的数组原型不同. forEach , 提供了 'undefined' 或 'null' 不会抛出 TypeError ,但是只返回方法值)

```js
var values = {name: 'misko', gender: 'male'};
var log = [];
angular.forEach(values, function(value, key) {
  this.push(key + ': ' + value);
}, log);
expect(log).toEqual(['name: misko', 'gender: male']);
```

## Usage
```js
angular.forEach(obj,iterator,[context])
```

## Arguments
|Param|Type|Details|
|-----|----|-------|
|obj|object/Array|Object to iterate over.|
|iterator|function|Iterator function..|
|context(optional)|object|Object to become context (this) for the iterator function.|

## Returns
object/Array - Reference to obj

## Example
```js
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="../../../vendor/jquery/jquery.min.js"></script>
    <script src="../../../vendor/angular-1.4.8/angular.min.js"></script>
</head>
<body>
<script>
    var values = {name: 'misko', gender: 'male'};
    var log = [];
    angular.forEach(values, function(value, key) {
        this.push(key + ': ' + value);
        display(key + ': ' + value);
    }, log);
    display(log);

    function display(msg) {
        $("<p>").html(String(msg)).appendTo(document.body);
    }

</script>
</body>
</html>
```
