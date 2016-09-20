##快速排序

###提出人
目前，最常见的排序算法大概有七八种，其中"快速排序"（Quicksort）使用得最广泛，速度也较快。它是图灵奖得主C. A. R. Hoare（1934--）于1960时提出来的。

###快速排序思路
* 基准,移动,重复
	1. 在数据集之中，选择一个元素作为"基准"（pivot）。
	2. 所有小于"基准"的元素，都移到"基准"的左边；所有大于"基准"的元素，都移到"基准"的右边。
	3. 对"基准"左边和右边的两个子集，不断重复第一步和第二步，直到所有子集只剩下一个元素为止。


###简单例子
定义一个数组
```
var arr = [85, 24, 63, 45, 17, 31, 96, 50]
```

1 .设定基准值为45 , 将所有比45小的移动到左边,大的移动到右边

第一次排序结果
```
arr = [24,17,31,45,85,63,96,50]
```

2 .对两个子集不断重复第一步,选择17为基准排 ,选择63为基准排右边

第二次排序结果
```
arr = [17,24,31,45,50,63,85,96]
```

###Javascript实现方式

####splice()

 用于插入、删除或替换数组的元素。
 
```
arrayObject.splice(index,howmany,element1,.....,elementX)
```

参数  | 定义
------------- | -------------
index  | 规定从何处添加/删除元素
howmany  | 规定应该删除多少元素
element1  | 规定要添加到数组的新元素
elementX  | 可向数组添加若干元素

####concat()

用于连接两个或多个数组

```
arrayObject.concat(arrayX,arrayX,......,arrayX)
```


#### QuickSort Function

* 实现思路
	1. 检查数组的元素个数，如果小于等于1，就返回。
	2. 选择"基准"（pivot），并将其与原数组分离
	3. 定义两个空数组，用来存放一左一右的两个子集
	4. 小于"基准"的元素放入左边的子集，大于基准的元素放入右边的子集
	5. 重复上述操作,递归调用,直到小于1

```javascript
var quickSort = function(arr) {

　　if (arr.length <= 1) { return arr; }
　　
　　var pivotIndex = Math.floor(arr.length / 2) ;
　　var pivot = arr.splice(pivotIndex, 1)[0];
　　
　　var left = [];
　　var right = [];
　　
	for (var i = 0; i < arr.length; i++){
　　　　if (arr[i] < pivot) {
　　　　　　left.push(arr[i]);
　　　　} else {
　　　　　　right.push(arr[i]);
　　　　}
　　}
　　
　　return quickSort(left).concat([pivot], quickSort(right));
};
```

