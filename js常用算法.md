##常用Js算法

###数学
ax=N 可以记做 x=logaN

###时间复杂度
时间复杂度是指执行算法所需要的计算工作量

1.一般情况下，算法中基本操作重复执行的次数是问题规模n的某个函数，用T(n)表示，若有某个辅助函数f(n),使得当n趋近于无穷大时，T(n)/f(n)的极限值为不等于零的常数，则称f(n)是T(n)的同数量级函数。记作T(n)=O(f(n)),称O(f(n)) 为算法的渐进时间复杂度，简称时间复杂度。分析：随着模块n的增大，算法执行的时间的增长率和 f(n) 的增长率成正比，所以 f(n) 越小，算法的时间复杂度越低，算法的效率越高。

2.在计算时间复杂度的时候，先找出算法的基本操作，然后根据相应的各语句确定它的执行次数，再找出 T(n) 的同数量级（它的同数量级有以下：1，log2n，n，n log2n ，n的平方，n的三次方，2的n次方，n!），找出后，f(n) = 该数量级，若 T(n)/f(n) 求极限可得到一常数c，则时间复杂度T(n) = O(f(n))

```
for(i=1; i<=n; ++i)
{
    for(j=1; j<=n; ++j)
    {
        c[i][j] = 0;//该步骤属于基本操作执行次数：n的平方次
        for(k=1; k<=n; ++k)
            c[i][j] += a[i][k] * b[k][j];//该步骤属于基本操作执行次数：n的三次方次
    }
}
```

则有 T(n) = n 的平方+n的三次方，根据上面括号里的同数量级，我们可以确定 n的三次方 为T（n）的同数量级
则有 f(n) = n的三次方，然后根据 T(n)/f(n) 求极限可得到常数c
则该算法的时间复杂度：T(n) = O(n^3) 注：n^3即是n的3次方。

3.在pascal中比较容易理解，容易计算的方法是：看看有几重for循环，只有一重则时间复杂度为O(n)，二重则为O(n^2)，依此类推，如果有二分则为O(logn)，二分例如快速幂、二分查找，如果一个for循环套一个二分，那么时间复杂度则为O(nlogn)。



###空间复杂度
而空间复杂度是指执行这个算法所需要的内存空间



###线性搜索算法
入门级算法-线性查找-时间复杂度O(n)--相当于算法界中的HelloWorld

```javascript
function linearSearch(A, x) {
    for (var i = 0; i < A.length; i++) {
        if (A[i] == x) {
            return i;
        }
    }
    return -1;
}
```

###二分查找算法
适用于已排好序的线性结构 - 时间复杂度O(logN)

```javascript
function binarySearch(A, x) {
    var low = 0, high = A.length - 1;
    while (low <= high) {
        var mid = Math.floor((low + high) / 2); //下取整
        if (x == A[mid]) {
            return mid;
        }else if (x < A[mid]) {
            high = mid - 1;
        }else { 
            low = mid + 1;
        }
    }
    return -1;
}
```

###冒泡排序
时间复杂度O(n^2)

```javascript
function bubbleSort(A) {
    for (var i = 0; i < A.length; i++) {
        var sorted = true;
        //注意：内循环是倒着来的
        for (var j = A.length - 1; j > i; j--) {
            if (A[j] < A[j - 1]) {
            		var temp = '';
            		temp = A[j];
            		A[j] = A[j-1];
            		A[j-1] = temp;
                sorted = false;
            }
        }
        if (sorted) {
            return;
        }
    }
}
```

###选择排序
找到最小值的下标记下来，再交换O(n^2)

```javascript
function selectionSort(A) {
    for (var i = 0; i < A.length - 1; i++) {
        var k = i;
        for (var j = i + 1; j < A.length; j++) {
            if (A[j] < A[k]) {
                k = j;
            }
        }
        if (k != i) {
            var t = A[k];
            A[k] = A[i];
            A[i] = t;
        }
    }
    return A;
}
```

###插入排序
时间复杂度O(n^2) 

假定当前元素之前的元素已经排好序，先把自己的位置空出来，
然后前面比自己大的元素依次向后移，直到空出一个"坑"，
然后把目标元素插入"坑"中

```javascript
function insertSort(A) {
    for (var i = 1; i < A.length; i++) {
        var x = A[i];
        for (var j = i - 1; j >= 0 && A[j] > x; j--) {
            A[j + 1] = A[j];
        }
        if (A[j + 1] != x) {
            A[j + 1] = x;
        }
    }
    return A;
}
```


