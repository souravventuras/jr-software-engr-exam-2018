var express = require('express');
var router = express.Router();
var userModel = require.main.require('./models/user-model');
var profileModel = require.main.require('./models/profile-model');



router.get('/doctor/editProfile/:id',function(req,res){
	console.log(req.params.id);
	profileModel.getAlldata(req.params.id,function(result){
		//console.log(result);
	res.render('Profile/editProfile',{docDetails:result,id:req.params.id});
});
	//res.render('Profile/editProfile');
});



router.get('/findDoctor/docprofile/:id',function(req,res){
	console.log(req.params.id);
	profileModel.getAlldata(req.params.id,function(result){
		console.log(result);
	res.render('Profile/docprofile',{docDetails:result,id:req.params.id});
});
	//res.render('Profile/editProfile');
});


router.get('/profile/edit/:id',function(req,res){
	console.log(req.params.id);
	profileModel.getAlldata(req.params.id,function(result){
		//console.log(result);
	res.render('Profile/editDetails',{docDetails:result,id:req.params.id});
});
	//res.render('Profile/editProfile');
});


router.post('/profile/edit/:id',function(req,res){
    //console.log(req.params.id);
    docDetails={
         docid: req.body.Userid,
		 fullname: req.body.fullname,
		 username: req.body.username,
         specialist: req.body.specialist,
         phone: req.body.phone,
         email: req.body.email,
         address: req.body.address,
         password: req.body.password,
		degrees: req.body.degrees,
		description: req.body.description,
		Userid : req.session.fullinfo[0].Userid

	};

	profileModel.detailsUpdate(docDetails, function(valid){
				if(valid){
			//usermodel.getapp
	//	req.session.fullinfo[0] = valid[1];
		//console.log(valid[1],"44");

		//	console.log(req.session.fullinfo,"33");
			//req.session.reload();
			res.redirect('/logout');


       //res.render('home/schedule');
		}
		else{
           console.log("unsucessfull");
		}


	});


});


router.get('/profile/:id',function(req,res){
	console.log(req.params.id);
	profileModel.getPat(req.params.id,function(result){
		//console.log(result);
	res.render('Profile/patprofile',{patDetails:result});
});
	//res.render('Profile/editProfile');
});

router.get('/profile/patedit/:id',function(req,res){

profileModel.getPat(req.params.id,function(result){
	 console.log("ata patientid :",result);
	 res.render('Profile/editpatpro',{editDetails:result});
});

});
router.post('/profile/patedit/:id',function(req,res){
	patDetails={
		patid:req.params.id,
		fname : req.body.fullname,
		phone : req.body.phone,
		email : req.body.email,
		password : req.body.password,
		address : req.body.address
	}
//console.log("ata patientid :",patDetails);
profileModel.patDetUpdate(patDetails,function(valid){
	 if(valid){
	  res.redirect('/logout');
	 }
	 else{
	 	console.log("unsuccessfull");
	 }

});

});
















module.exports = router;
