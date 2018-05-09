var express = require('express');
var router = express.Router();

var loginModel = require.main.require('./models/login-model');
var userModel = require.main.require('./models/user-model');


router.get('/login', function (req, res){
	res.render('login/login', {message: ''});
});


router.post('/login', function (req, res){
	var user = {
		username: req.body.username,
		password: req.body.password
	};
	loginModel.verifyUser(user, function(valid){


	if(valid[0].Usertype == 'doctor')
	{
		req.session.fullinfo=valid;
		req.session.loggedUser = user;
		res.redirect('/doctor');
	}
	else if(valid[0].Usertype=="patient"){

		req.session.fullinfo=valid;
		req.session.loggedUser = user;
		res.redirect('/patHome');

	}
  else
		{
			res.render('login/login', {message: 'Invalid username or password'});
		}
	});

});


router.get('/login/create', function(req, res){
	res.render('login/create', {errors: []});
});

router.post('/login/create', function(req, res){
	req.checkBody('name', 'Fullname is required').notEmpty();
	req.checkBody('uname', 'Username is required').notEmpty();
	req.checkBody('uname', 'Username should be alphabets only').isAlpha();
	req.checkBody('address', 'Address is required').notEmpty();
	req.checkBody('email', 'Email is required').notEmpty();
	req.checkBody('email', 'Email is not valid').isEmail();
	req.checkBody('password', 'Password is too short').isLength({min:4});
	req.checkBody('password', 'Password is not match').equals(req.body.c_pass);
	req.checkBody('phone', 'Phone Number is required').notEmpty();
	req.checkBody('type', 'UserType is required').notEmpty();

	req.getValidationResult().then(function(result){
		if(!result.isEmpty())
		{
			var data = {errors: result.array()};
			res.render('login/create', data);
		}
		else
		{


			var user = {
				fullname: req.body.name,
				username: req.body.uname,
				address: req.body.address,
				email: req.body.email,
				phone: req.body.phone,
				password: req.body.password,
				usertype: req.body.type,
				lat: req.body.lat,
				lng: req.body.lng

			};

			userModel.insert(user, function(result){
				res.redirect('/login');
			})
		}
	});

});

router.get('/logout', function(req, res){
	req.session.destroy();
	res.redirect('/login');
		return;
});





module.exports = router;
