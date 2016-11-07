##前端面试题

`1.`CSS都有哪些选择器？
	
	1.派生选择器（用HTML标签申明）
	2.id选择器（用DOM的ID申明）
	3.类选择器（用一个样式类名申明）
	4.属性选择器（用DOM的属性申明，属于CSS2，IE6不支持，不常用）
	5.后代选择器（利用空格间隔，比如div .a{  }）
	6.群组选择器（利用逗号间隔，比如p,div,#a{  }）

- 那么问题来了，CSS选择器的优先级是怎么样定义的？

　　基本原则：

　　一般而言，选择器越特殊，它的优先级越高。也就是选择器指向的越准确，它的优先级就越高。

复杂的计算方法：
```
用1表示派生选择器的优先级
用10表示类选择器的优先级
用100标示ID选择器的优先级
div.test1 .span var 优先级 1+10 +10 +1  
span#xxx .songs li 优先级1+100 + 10 + 1  
xxx li 优先级 100 +1 
那么问题来了，看下列代码，<p>标签内的文字是什么颜色的？。
```

`2.`什么是Css Hack？ie6,7,8的hack分别是什么？
针对不同的浏览器写不同的CSS code的过程，就是CSS hack。

```css
#test{   
    width:300px;   
    height:300px;   
    background-color:blue;      /*firefox*/
    background-color:red\9;      /*all ie*/
    background-color:yellow\0;    /*ie8*/
    +background-color:pink;        /*ie7*/
    _background-color:orange;       /*ie6*/    }  
    :root #test { background-color:purple\9; }  /*ie9*/
    @media all and (min-width:0px){ #test {background-color:black\0;} }  /*opera*/
    @media screen and (-webkit-min-device-pixel-ratio:0){ #test {background-color:gray;} }       /*chrome and safari*/
```

`3.`rgba()和opacity的透明效果有什么不同？

	1.rgba()和opacity都能实现透明效果，但最大的不同是opacity作用于元素，以及元素内的所有内容的透明度，
	2.而rgba()只作用于元素的颜色或其背景色。（设置rgba透明的元素的子元素不会继承透明效果！）

`4.`css中可以让文字在垂直和水平方向上重叠的两个属性是什么？

	垂直方向：line-height
	水平方向：letter-spacing

- 关于letter-spacing的妙用知道有哪些么？

		以用于消除inline-block元素间的换行符空格间隙问题。

`5.`如何垂直居中一个图片

```
#container     //<img>的容器设置如下
{
    display:table-cell;
    text-align:center;
    vertical-align:middle;
}
```

`6.`display:none与visibility:hidden的区别是什么？

	display : 隐藏对应的元素但不挤占该元素原来的空间。
	visibility: 隐藏对应的元素并且挤占该元素原来的空间。

即是，使用CSS display:none属性后，HTML元素（对象）的宽度、高度等各种属性值都将“丢失”;而使用visibility:hidden属性后，HTML元素（对象）仅仅是在视觉上看不见（完全透明），而它所占据的空间位置仍然存在。



`7.`知道css有个content属性吗？有什么作用？有什么应用？

css的content属性专门应用在 before/after 伪元素上，用于来插入生成内容。

```css
//一种常见利用伪类清除浮动的代码
 .clearfix:after {
    content:".";       //这里利用到了content属性
    display:block; 
    height:0;
    visibility:hidden; 
    clear:both; }

.clearfix { 
    *zoom:1; 
}
```

after伪元素通过 content 在元素的后面生成了内容为一个点的块级元素，再利用clear:both清除浮动。

- 那么问题继续还有，知道css计数器（序列数字字符自动递增）吗？

- 如何通过css content属性实现css计数器？

		答案：
		css计数器是通过设置counter-reset 、counter-increment
		counter()/counters()一个方法配合after / before 伪类实现。 

`8.` 为什么利用多个域名来存储网站资源会更有效？
	1. Ordered lists are supported.
	2. 突破浏览器并发限制
	3. 节约cookie带宽
	4. 节约主域名的连接数，优化页面响应速度 
	5. 防止不必要的安全问题

`9.` 请描述一下cookies，sessionStorage和localStorage的区别？

```javascript
sessionStorage用于本地存储一个会话（session）中的数据，这些数据只有在同一个会话中的页面才能访问并且当会话结束后数据也随之销毁。因此sessionStorage不是一种持久化的本地存储，仅仅是会话级别的存储。而localStorage用于持久化的本地存储，除非主动删除数据，否则数据是永远不会过期的。
```
	
	
`10.`一个页面上有大量的图片（大型电商网站），加载很慢，你有哪些方法优化这些图片的加载，给用户更好的体验。

	1.图片懒加载，在页面上的未可视区域可以添加一个滚动条事件，判断图片位置与浏览器顶端的距离与页面的距离，如果前者小于后者，优先加载。

	2.如果为幻灯片、相册等，可以使用图片预加载技术，将当前展示图片的前一张和后一张优先下载。

	3.如果图片为css图片，可以使用CSSsprite，SVGsprite，Iconfont、Base64等技术。

	4.如果图片过大，可以使用特殊编码的图片，加载时会先加载一张压缩的特别厉害的缩略图，以提高用户体验。

	5.如果图片展示区域小于图片的真实大小，则因在服务器端根据业务需要先行进行图片压缩，图片压缩后大小与展示一致。 



　　


