var express=require('express');
var bodyparser=require('body-parser');
var ejs=require('ejs');
var mysql=require('mysql');
var connection  = require('express-myconnection'); 


var app=express();

var port=5000 || process.env.PORT;

app.use(bodyparser.json());
app.use(bodyparser.urlencoded({extended:false}));
app.use('/public',express.static('public'));
app.set('view engine','ejs');

app.use(
    
    connection(mysql,{
        host: 'localhost',
        user: 'root',
        password : '',
        database:'developerinfo'
    },'request')
);

app.get('/',function(req,res){
	res.render('index.ejs');
});

app.get('/adddeveloper',function(req,res){
	res.render('add.ejs',{page_title:"Add Developer"});
});


app.get('/showdeveloper',function(req,res){
	req.getConnection(function(err,connection){
		connection.query('SELECT * FROM developer',function(err,rows){
			if(err) throw err;
			res.render('show',{page_title:"Developer information",data:rows});
		})
	})
})

app.post('/adddeveloper',function(req,res){
	var input=JSON.parse(JSON.stringify(req.body));

	req.getConnection(function(err,connection){
		var data={
			email    :input.email,
			planguage:input.planguage,
			language :input.language
		};

		connection.query("INSERT INTO developer set ? ",data,function(err,rows){
			if(err) throw err;
			res.redirect('/showdeveloper');
		});
	});
});

app.get('/phpdeveloper',function(req,res){
	req.getConnection(function(err,connection){
		connection.query('SELECT * FROM developer WHERE planguage LIKE "%php%"',function(err,rows){
			if(err) throw err;
			res.render('phpdeveloper',{page_title:"PHP Developer",data:rows});
		});
	});
});

app.get('/phpandendeveloper',function(req,res){
	req.getConnection(function(err,connection){
		connection.query('SELECT * FROM developer WHERE planguage LIKE "%php%" AND language LIKE "%en%"',function(err,rows){
			if(err) throw err;
			res.render('phpandendeveloper',{page_title:"PHP and English Developer",data:rows});
		});
	});
});

app.listen(port);
console.log("server is running on port: " +port);

module.exports = app;

