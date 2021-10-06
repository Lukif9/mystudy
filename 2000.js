var ws = require("express");
var app = ws();
app.get('/', function(req, res) {
    res.send('Hello LINE!');
});
app.get('/join', function(req, res) {
    res.send('Member Only!');
});
app.listen(2000, function(){
    console.log("open 2000 port!");
});