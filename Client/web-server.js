var express = require('express');
var path = require('path');
var bodyParser = require('body-parser');
var app = express();
var rootPath = path.normalize(__dirname);

app.use(bodyParser.urlencoded({extended: true}));
app.use(bodyParser.json());
app.use(express.static(rootPath));

app.get('*', function(req, res) {
    res.sendFile(rootPath + '/index.html')
});

app.listen(3000, function() {
    console.log('Servidor iniciado na porta 3000.');
});
