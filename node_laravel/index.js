// 服务端
var app = require('express')();

var http = require('http').Server(app);

var io = require('socket.io')(http);

app.get('/', function(request,response){
	response.sendFile(__dirname+'/index.html');
});

io.on('connection', function(socket) {
	// event.preventDefault();
	// console.log('a user connect');
	/* Act on the event */
	socket.on('chat.message',function(message){
		// console.log('a new message'+message);//打印出来客户端传到服务端的数据
		io.emit('chat.message',message);

	})
});

http.listen(3000, function(){
	console.log('Server start');
});