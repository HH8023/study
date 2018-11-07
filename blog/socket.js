/**
 * Created by Administrator on 2018/11/7.
 */
var http = require('http').Server();

var io = require('socket.io')(http);

var Redis = require('ioredis');

var redis = new Redis();

//2、redis.subscribe是订阅这个频道,有消息则传到io.emit里面
redis.subscribe('test-channel');

redis.on('message',function (channel,message) {
    message = JSON.parse(message);
    io.emit(channel+':'+message.event,message.data);
    // console.log(message.data.name);
});

http.listen(3001);

