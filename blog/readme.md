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
首先把laravel的项目下载到本地，







