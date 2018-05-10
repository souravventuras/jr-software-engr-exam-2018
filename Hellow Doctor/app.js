// require
var express = require('express');
var path = require('path');
var app = express();
var bodyParser = require('body-parser');
var expressValidator = require('express-validator');
var expressSession = require('express-session');
var Chart = require('chart.js');
var login = require('./controllers/login');
var home = require('./controllers/home');
var archive=require('./controllers/archive');
var profile=require('./controllers/profile');
var appointment=require('./controllers/appdetails');


var port = 3000;
// configure
app.set('view engine', 'ejs');
// middleware
app.use(bodyParser.urlencoded({extended:false}));
app.use(expressSession({secret: 'secret', resave: false, saveUninitialized:true}));
app.use(express.static(path.join(__dirname, "node_modules/bootstrap/dist")));
app.use('js',express.static(path.join(__dirname, "public/js")));
app.use('css',express.static(path.join(__dirname, "public/css")));
app.use(express.static(path.join(__dirname, "node_modules/chart.js/dist")));
app.use(express.static(path.join(__dirname, "public")));
app.use(expressValidator());
app.use(express.static(path.join(__dirname, "image")));

// routes
app.get('/', function(req, res){
res.redirect('/login');
});


// oi view ta koi?

app.use(login);
app.use(home);
app.use(archive);
app.use(profile);
app.use(appointment);

// server
app.listen(port, function(){
	console.log('Server started at ' + port + ' port....');
});
