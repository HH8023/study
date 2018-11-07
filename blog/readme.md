*2018.11.07*
laravel + redis + socket
在浏览器中2个网页之间相互通信的demo
其中vue的版本最好是1.0.4的版本，
`<script src="https://cdn.bootcss.com/vue/1.0.4/vue.min.js"></script>`
现在vue之类的还没有多熟练，所以先用这个版本就可以出来，用最新的版本，是没有解析出来。以此记录





*2018.11.06* 
怎么在laravel中使用redis（暂时是在window的环境下测试，下次把在linux下的测试补上，但是大同小异）
环境是：

1. 
- window7
- phpstudy
- php7.1.13-nts(非线程安全版本)
- redis(2.4.5)
window的电脑可以在这个 https://github.com/dmajkic/redis/downloads
下载，有32和64位的，自行选择
下载好后，在cmd中进入解压后的文件夹下的64或者32版本的文件里去运行
`redis-server`  即可跑起来,跑起来后不要关闭那个cmd，关闭之后redis的服务也就关了。

2.想写入redis的话也可以在cmd中进入到上面你安装好的路径，写入`redis-cli`，即可进入和命令行模式。
eg:`redis 27.0.0.1:6379>` 这样的命令行

3.
接下来把PHPstudy中安装redis的.dll文件，
`http://pecl.php.net/package/redis`链接地址，去选择自己想要的版本去下载，解压后，找到`php_redis.dll`，`php_redis.pdb`这俩文件复制到PHPStudy的ext文件夹下，然后到php.ini中，加一条`extension=php_redis.dll`,重启phpStudy即可使用


4.
首先把laravel的项目下载到本地，其中redis的用到的文件是routes的web.php中




----------
写的很糙，之后多看多练会慢慢好的。望见谅



