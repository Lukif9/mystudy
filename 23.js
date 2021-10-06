var express = require('express');
var myApp = express();
myApp.use(express.static('myFiles'));
myApp.get('/', function(req, res){
    res.send('Hello home page');;
});
myApp.get('/images', function(req, res){
    res.send('My Image, <img src="/1.jpg">')
})
myApp.get('/login', function(req, res){
    res.send('1.html'); // 여긴 어떻게??????
});
myApp.listen(2000, function(){
    console.log('Conneted 2000 port!');
});


여기에서 

use는 