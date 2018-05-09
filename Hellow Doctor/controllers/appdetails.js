var express = require('express');
var router = express.Router();
var appModel = require.main.require('./models/app-model');


router.get('/myappointment/:id', function (req, res){

	appModel.docappdetails(req.params.id, function(result){
		res.render('appointment/appdetails',{appDetails:result,name: req.session.fullinfo[0].Fullname,id:req.session.fullinfo[0].Userid});
	});
});

router.get('/myappointmentPat/:id', function (req, res){

	appModel.patappdetails(req.params.id, function(result){
		res.render('appointment/appdetailsPat',{appDetails:result,name: req.session.fullinfo[0].Fullname,id:req.session.fullinfo[0].Userid});
	});
});

























module.exports = router;
