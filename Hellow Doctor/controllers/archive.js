var express = require('express');
var router = express.Router();
var userModel = require.main.require('./models/user-model');
router.get("/pres/archive",function(req,res){

       var presInfo=req.session.presInfo;

        res.render('archive/presArchive',{pInfo:presInfo});
       // {presInf:presInfo,docInfo:result}

});

router.get('/pres/show/:id',function(req,res){
    console.log(req.params.id);
        var pinfo=req.session.presInfo;

    res.render('archive/presImgShow',{pIdx:req.params.id,presInfo:pinfo});
});

module.exports=router;
