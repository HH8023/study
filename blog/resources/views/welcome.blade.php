<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->


        <!-- Styles -->
    </head>
    <body id="demo">
         <ul>
             <li v-for="user in users">@{{user}}</li>
         </ul>

         <script src="https://cdn.bootcss.com/vue/2.5.17/vue.min.js"></script>
         <script src="https://cdn.bootcss.com/socket.io/2.1.1/socket.io.js"></script>
         <script>
             var socket = io('demo.com:3001');//127.0.0.1
             new Vue({
                 el:'#demo',
                 data:{
                     users:[],
                 },
                 ready:function () {
//                     3、客户端获取
                     socket.on('test-channel:aNewMessage',function (data) {
                         this.users.push(data.name);
//                         console.log(data.name);
                     }.bind(this))
                 }
             })


         </script>

    </body>
</html>
