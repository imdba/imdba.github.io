## 命令
启动容器 :
	docker run --name -h hostname
停止容器 :
 	docker stop CONTINER ID
查看容器 :

	docker ps -a -l
	
进入容器 :

	docker exec | docker attach | nsenter
	
删除容器 :

	docker rm 
	
搜索镜像 :
	
	docker search
	
获取镜像 :

	docker pull
	
查看镜像 :

	docker images
	
删除镜像 :

	docker rmi
	
## 运行docker

我们使用 docker , 肯定是要在上面跑服务的
	
	docker ps -a //查看现在的容器
	
发现有一个容器，但是什么都没有跑，我们并不能进去，
我们启动一个 nginx 的容器并访问它，
查看一下网络

	iptables -t nat -vnL
	brctl show
	
看到他帮我们做端口映射, 我们默认情况可以让 docker 使用端口映射来让容器的端口对外，这个端口映射有两种大的方式，一种是随机映射，一种是指定端口映射

	docker pull nginx
	docker run -d -P nginx 
创建之后会返回一个容器的 id , 像我们 git 提交之后的 commit_id , 非常长，我们只需要用前面几位就行了

	docker ps //查看端口映射
	
他帮我把本机的 32769 端口映射到了 80 端口，我先访问一下本机的 *192.168.99.100:32769*

随机端口 有一个好处就是它不会冲突，他自己帮你去分配，
你想看日志怎么办，`docker logs CONTAINER ID`

	docker ps //查看nginx是怎么运行的
	
看到是 `nginx -g 'daemon off'`  是放在前台运行，
 nginx 只能放前台运行，因为它启动之后有一个 fork 的过程，它要 fork 其他进程来，那你启动的那个进程没了，没了就停止了
 	
随机映射  
 	
 	docker run -P 
 	
指定映射  
		
	-p hostPort:containerPort
	-p ip:hostPort:containerPort
	-p ip::containerPort
	-p hostPort:containerPort:udp
	
比如说我们再启动一个 nginx ,这次我们使用

	docker run -d -p 81:80 nginx
	docker ps
	
希望大家非常熟练的把它敲出来，这叫你会了
再访问本机的 81端口查看
如果你不指定默认
`netstat -ntlp`
不指定就是所有的81端口都指向了容器的 80 
剩下的还有几种方式，大家可以自己去试一试
这是 docker 的网络访问

## 存储
docker 的数据存储的话默认有两种方式来管理数据
数据卷

	-v /data
	-v src:dst
	
数据卷容器
     
	--volumes-from

数据卷是一个可供一个或多个容器使用的特殊目录，它绕过 UFS ，可以提供很多有用的特性：

数据卷可以在容器之间共享和重用

对数据卷的修改会立马生效

对数据卷的更新，不会影响镜像

卷会一直存在，直到没有容器使用

数据卷的使用，类似于 Linux 下对目录或文件进行 mount。

我们可以创建一个数据卷
	
	docker run -it --name volume-test1 -v /data ubuntu
	ls -l /data
	
这个容器挂载了一个数据卷 ｀-v /data｀ 那这个容器会将数据放在哪儿呢，他会把数据放在某个位置，肯定在物理机的某个地址，那么我现在的数据卷 /data

怎么样来看这个地址呢

	docker inspect volume-test1
	
查看这个容器的所有信息
看到有一个 volume ,看到有一个 mounts ，他把物理机的这个目录挂在了我们容器里面的 /data/

你可以把这个地址复制下来，然后cd进去，在里面创建一个文件，然后在容器里面去查看，它是 mount 上去的

这是我们数据卷的第一种方式

`-v src:dst` 更常用，将代码的目录映射到容器里面，这个开发最常用的

例如 `docker run -it --name volume-test2 -v /opt:/opt ubuntu`

这个时候本地的 /opt 目录和容器里面的 /opt 目录映射，可以操作查看内容是否一至

而且挂载的时候你还可以指定他的权限，比如说 /opt:/opt:ro 只读，:rw可写

还可以挂载单个文件到容器中

	docker run -it -v .bash_history:.bash_history ubuntu

还可以挂载数据卷容器

让一个容器去访问另外一个容器的数据卷，我们叫做数据卷容器，比如我新启动一个容器，挂载之前启动的 /data 的那个卷，之前的 /data 的那个容器就专门存储数据，我所有的容器的数据都放到这个容器里面，先看一下我们有几个

	docker ps

我们启动一个容器，挂载一个目录，然后我们启动一些别的容器，去让他挂载在这个里面

	docker run -d —name nfs -v /data ubuntu
	
这样我们已经有了一个容器，这个容器里面挂载了一个 data 的卷，以后我使用的时候就不给容器挂载任何的东西了，相当于我这个容器里面有个 fs ，其他的容器都挂载这个

我们再启动一个容器

	docker run -it —name test1 —volumes-from nfs ubuntu

然后我们分别查看两个目录里面是否能正常同步内容
	
	docker inspect CONTAINER ID //查看一下目录，然后进这个目录进行操作，写点文件

## 手动构建镜像

我们现在所有的镜像都是 `docker pull` 下来的，但是我们工作中肯定需要做自己的镜像，你比如说我要做一个跑 nginx 的镜像，或者要跑一个更复杂的

### 现在讲一讲自己如何做一个镜像

docker 里面可以跑 docker rpm 包
首先由基础镜像，centos 就是 Linux 系统，

	docker pull centos 
	//--name给容器起一个名称 --it 我要进去 centos 镜像名字
	docker run --name mynginx -it cents  
	

去阿里云官方复制镜像  [htttp://mirrors.aliyun.com/](htttp://mirrors.aliyun.com/)  选 epel 

	rpm -ivh  htttp://mirrors.aliyun.com/epel/epel-release-latest-7.noarch.rpm 
	yum install -y nginx 

装上去第一件事做什么，改配置文件，在前端运行，`docker ps -a`

把 my nginx 的 id 复制下来

	docker commot -m “my nginx” 镜像的id maxwelldu/mynginx:v1
	docker images //查看刚才的镜像

类似于 github 私有镜像 

	docker run -it --name nginxv1 mynginx:v1 

如果你不写 v1 ，他会找最新的版本

如果不指定 则会尝试去 docker.io 里面去找

	vi /etc/nginx/nginx.conf

	docker run --name mynginx -it centos 
	yum install -y nginx 
	docker commit -m "my nginx" gf2a8b5e4977 maxwelldu/mynginx:v1 //镜像
	docker run -it --name nginxvl maxwelldu/mynginx:v1  //容器
	
	vim  /etc/nginx/nginx.conf
	daemon off
	
	docker commit -m "my nginx" cf5cfafa5a7c maxwelldu/mynginx:v2  //镜像
	docker run -d -p 82:80 maxwelldu/mynginx:v2 nginx  //容器

### Docker file 自动构建镜像

刚才手动构建
先基于一个基础的镜像，然后在里面 yum install 各种软件，装好提交一下，打一个版本，然后就可以基于这个镜像去使用了

你还可以把你的镜像提交到私有仓库里面

你会不会 Docker 就看你会不会写 Dockerfile 

Dockerfile 是为了什么，为了使你快速构建镜像，为你设计了一个Dockerfile

你可以使用 `docker build /opt/nginx/Dockerfile` 进行构建，构建的时候可以指定目录，这个目录里面要有一个 Dockerfile 的文件，这个D必须是大宝的

我们现在学习如何编写 Dockerfile

我们把 Dockerfile 分为四个部分

 * 基础镜像
 * 维护者信息
 * 镜像操作指令
 * 容器启动时执行的命令

### commands


 * `FROM` 它的妈妈是谁
 * `MAINTAINER` 它的爸爸是谁，告诉别人，你创造了它（ 维护者信息 ）
 * `RUN` 你想让它干啥（ 把命令前面加上 RUN ）
 * `ADD` 往它肚子里放点文件（ COPY 文件，会自动解压 ）
 * `WORKDIR` 我是 cd ，今天刚化了妆（ 当前工作目录 ）
 * `VOLUME` 给我一个存放行李的地方（ 目录挂载 ）
 * `EXPOSE` 我要打开的门是啥（ 端口 ）
 * `RUN` 奔跑吧，兄弟！（ 进程要一直运行下去 ）
 * `CMD` 你最后要招待的一个命令

```
#开头的是注释

vim Dockerfile
# This docker file
# VERSION 1
# Author: Maxwelldu
# Base image
FROM centos

#Maintainer
MAINTAINER maxwelldu maxwelldu@someet.so

#Commands
RUN rpm -ivh http://mirrors.aliyun.com/epel/pepl-release-latest-7.noarch.rpm
RUN yum install -y nginx
ADD index.html /user/share/nginx/html/index.html
RUN echo “daemon off;” >> /etc/nginx/nginx.conf
EXPOSE 80
CMD [“nginx”]

```
其实写 Dockerfile 就和自己手动构建镜像一样，只不过用了一些命令来完成这些事情，你可以改成自己的

	mkdir /opt/dockerfile/nginx -p
	cd /opt/dockerfile/nginx
	vim Dockerfile
	
把上面的内容放进来

```
docker build -t maxwelldu/mynginx:v3 . 
//或者 
/opt/dockerfile/nginx
```
现在它就在安装，如果里面有东西修改，修改之后再构建速度就特别快
	
	docker run -d -p 83:80 maxwelldu/mynginx:v3 

访问一下 83

