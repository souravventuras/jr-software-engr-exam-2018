
var express = require('express');
var router = express.Router();
var userModel = require.main.require('./models/user-model');
var chart = require('Chart.js');
var _ = require('lodash');


router.use('*', function(req, res, next){
	if(! req.session.loggedUser)
	{
		res.redirect('/login');
		return;
	}
	next();
});








router.get('/doctor',function(req,res){
	var fullinfo=req.session.fullinfo;
        res.render('home/doctor',{fullinfo});
});

router.post('/doctor',function(req,res){
var presInfo = {
	patid:req.body.patId,
	docid:req.body.docId,
	img: req.body.imgUrl,
	date: req.body.date
};
//console.log(presInfo);
userModel.presInsert(presInfo,function(valid){
	if(valid){
		res.redirect('/doctor');
	}
	else{
		console.log("unsuccessfull");
	}
});

});
router.post('/home/doctor',function(req,res){

});

router.get('/patHome',function(req,res){
     //req.session.fullinfo;
    userModel.getpatinfo(req.session.fullinfo[0].Userid,function(result){
        req.session.presInfo=result;
				if (req.session.presInfo== "") {
					res.render('home/patNew',{presInfo:result, id : req.session.fullinfo[0].Userid, name : req.session.fullinfo[0].Fullname});

				}
				else
          res.render('home/patient',{presInfo:result,name:req.session.fullinfo[0].Fullname});
    });

});
router.post('/home/doctor',function(req,res){

});

//find Doctor

router.get('/nearByDoctor',function(req,res){
	userModel.showDoctor(function(result){
		res.render('home/nearByDoctor',{docList:result,patAddress:req.session.fullinfo[0].Address,lat:req.session.fullinfo[0].lat,lng:req.session.fullinfo[0].lng});
		//res.send({result});

			});
})

  router.get('/findDoctor/:cat',function(req,res){

	var cat =req.params.cat;

	userModel.showDoctorCat(cat,function(result){
		if (cat=='alldoc') {
			res.render('home/findDoctor',{docList1:result});
		}
		else if (cat=='all') {
			res.send({result});

		}
		 else  {
				res.send({result});
		}
			});
})


//search doctor
router.get('/search/doctor/:name',function(req,res){
	var name="doctor name :"+req.params.name;
userModel.searchDoctor(req.params.name,function(result){
   var rslt=JSON.stringify(result);
	 res.send(rslt);

});


})


//doctor profile
router.get('/doctor/profile/:id',function(req,res){
userModel.profile(req.params.id,function(result){
	res.render('home/profile',{docDetails:result,id:req.params.id});
});
});


router.post('/doctor/profile/:id',function(req,res){
	profile = {
	docId : req.body.dId,
	selDay: req.body.finalDay

};
  userModel.profile(profile,function(result){
	res.render('home/profile',{docDetails:result,id:req.params.id});
});

	date = {
	date : req.body.date,
	scheId : req.body.scheId
}


});

//send message
router.get('/doctor/sendMsg/:id',function(req,res){
var msgSend = {
		sender:req.session.fullinfo[0].Fullname,
		receiver : req.params.id
}

res.render('home/sendMsg',{info:msgSend});
});

router.post('/doctor/sendMsg/:id',function(req,res){
var msgSend = {
		sender : req.session.fullinfo[0].Userid,
		receiver : req.params.id,
		msg : req.body.msg,
		date : req.body.date
}
	userModel.sendMsg(msgSend,function(valid){
		res.redirect('/allMsgPat/'+msgSend.receiver);

	})

 });

 // inbox for patient

 router.get('/inboxPat', function(req,res){
 	var info = {
 			name:req.session.fullinfo[0].Fullname,
			id:req.session.fullinfo[0].Userid
 	}
 		userModel.inboxPat(info, function(result){

 			res.render('home/inboxPat',{id:info, msgList:result})

 		});

 });

//inbox for doctor
 router.get('/inboxDoc', function(req,res){
  var info = {
 		 name:req.session.fullinfo[0].Fullname,
 		 id:req.session.fullinfo[0].Userid
  }
 	 userModel.inboxDoc(info, function(result){
		 var msg = "";

 		 res.render('home/inboxDoc',{id:info, msgList:result, msg})

 	 });

 });
// all messages to one user

router.get('/allMsgDoc/:id', function(req,res){
	var msgSend = {
			sender:req.session.fullinfo[0].Fullname,
			senderId:req.session.fullinfo[0].Userid,
			receiver : req.params.id
	}

		userModel.msgStatus(msgSend, function (result1) {

			userModel.allMsg1(msgSend, function(result){

				res.render('home/allMsg1Doc',{info:msgSend, allMsg:result})

			});

		});


});

router.get('/allMsgPat/:id', function(req,res){
	var msgSend = {
			sender:req.session.fullinfo[0].Fullname,
			senderId:req.session.fullinfo[0].Userid,
			receiver : req.params.id
	}
		userModel.msgStatus(msgSend, function (result1) {

			userModel.allMsg1(msgSend, function(result){

				res.render('home/allMsg1Pat',{info:msgSend, allMsg:result,id: req.session.fullinfo[0].id})

			});

		});


});
router.post('/allMsgDoc/:id',function(req,res){
var msgSend = {
	sender:req.session.fullinfo[0].Userid,
	receiver : req.params.id,
	msg : req.body.msg,
	date : req.body.date
}
	userModel.sendMsg(msgSend,function(valid){
		res.redirect('/allMsgDoc/'+msgSend.receiver);

	})

 });

 router.post('/allMsgPat/:id',function(req,res){
 var msgSend = {
 	sender:req.session.fullinfo[0].Userid,
 	receiver : req.params.id,
 	msg : req.body.msg,
 	date : req.body.date
 }
 	userModel.sendMsg(msgSend,function(valid){
 		res.redirect('/allMsgPat/'+msgSend.receiver);

 	})

  });

//patient confirm appointment
router.get('/appointment/confirm/:id/:id2/:sh/:sm/:eh/:em',function(req,res){
var appId={
     schId:req.params.id,
     date:req.params.id2,
     serial:0,
     pId:req.session.fullinfo[0].Userid,
		 sh:req.params.sh,
		 sm:req.params.sm,
		 eh:req.params.eh,
		 em:req.params.em
	 }
    userModel.confAppointment(appId,function(result){

			if (result) {
				var tmp = result[3][0].serial;
				res.render("home/confMsg",{time:appId, serial:tmp});
			}
				else {

					res.render("home/error");

				}
    });
});

router.post('/appointment/confirm/:id/:id2/:sh/:sm/:eh/:em', function(req, res){
		patTime = {
			ph : req.body.ph,
			pm : req.body.pm,
			date : req.params.id2,
			scheId : req.params.id,
			patId : req.session.fullinfo[0].Userid
		}

userModel.insertPatTime(patTime, function(result){

	res.redirect('/patHome');
});
});

router.get('/appointment/confirm/:id/:id2/cancel',function(req,res){
	delApp={
		date : req.params.id2,
		scheId : req.params.id,
		patId : req.session.fullinfo[0].Userid
	}
userModel.appDel(delApp, function (result){
	res.redirect('/patHome');

});

});

router.get('/doctor/app',function(req,res){
	    userModel.schgetAll(req.session.fullinfo[0].Userid, function(result){
                //console.log(result);
                res.render('schedule/schedule',{userList:result, id: req.session.fullinfo[0].Userid, name:req.session.fullinfo[0].Fullname});
        	});

});

router.post('/doctor/app',function(req,res){
	appList={
         userid: req.body.id,
				 day: req.body.day,
         sthour: req.body.sh,
         stmin: req.body.s_m,
         edhour: req.body.eh,
         edmin: req.body.e_m,
				 address: req.body.address,
				 lat:req.body.lat,
				 lng:req.body.lng
	};
	console.log(appList);
	userModel.appinsert(appList, function(valid){
				if(valid){
			//usermodel.getapp


			res.redirect('/doctor/app');

       //res.render('home/schedule');
		}


	});

});
router.get('/appointment/edit/:id',function(req,res){
    userModel.appget(req.params.id,function(result){
        res.render('schedule/schedit',{appdtls:result,name:req.session.fullinfo[0].Fullname,id:req.session.fullinfo[0].Userid});
    });

});
router.post('/appointment/edit/:id',function(req,res){
    appList={
         appid: req.body.appid,
				 day: req.body.day,
         sthour: req.body.sh,
         stmin: req.body.s_m,
         edhour: req.body.eh,
         edmin: req.body.e_m,
				 address: req.body.address

	};
	console.log(appList);
	userModel.appupdate(appList, function(valid){
				if(valid){
			res.redirect('/doctor/app');
		}
		else{
           console.log("unsucessfull");
		}


	});
});

router.get('/appointment/delete/:id',function(req,res){
    userModel.appdelete(req.params.id,function(valid){
        if(valid){
            res.redirect('/doctor/app');
        }
        else{
            console.log('unsuccessfull');
        }
    });
});
router.get('/report',function(req,res){

	userModel.report(req.session.fullinfo[0].Userid, function(result){
		res.render('home/report',{info:result,name :req.session.fullinfo[0].Fullname,id:req.session.fullinfo[0].Userid});
	});

});

router.get('/forum', function (req, res){
	var userInfo = {
		userId : req.session.fullinfo[0].Userid,
		Fullname : req.session.fullinfo[0].Fullname
	};
	userModel.forumGet(function (result) {
		res.render('forum/post', {info:userInfo, posts:result});
	});
});

router.post('/forum', function (req, res){

	var info = {
		post : req.body.post,
		postedBy : req.session.fullinfo[0].Userid,
		time : req.body.time,
		likes : 0,
		tags : req.body.tags,
		category : req.body.category
	};
	userModel.forumPost(info,function (result) {
	res.redirect('/forum');
});
});


router.get('/forum/:id/:com',function (req, res) {
	var d1 = new Date();
	d1 = d1.toString();
	var d  = d1.substr(0,24);
	var com = {
		comm : req.params.com,
		id : req.params.id,
		comBy :req.session.fullinfo[0].Userid,
		time : d
	};
	userModel.forumCom(com,function (result) {
		//res.redirect('/forum');
	});
});

router.get('/forums/loadComment/:id',function (req, res){
	//console.log("HIT");

	  userModel.loadComment(req.params.id, function(result){
		res.send(result);
	});

});


module.exports = router;
