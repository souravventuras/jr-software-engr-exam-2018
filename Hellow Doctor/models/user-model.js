var db = require('./db');
module.exports = {
	getAll: function(callbackFromController) {
		var sql = "SELECT * FROM users";
		db.execute(sql, null ,function(result){
			callbackFromController(result);
		});
	},
	get: function(id, callbackFromController){
		var sql = "SELECT * FROM users WHERE userId=?";
		db.execute(sql, [id], function(result){
			callbackFromController(result[0]);
		});
	},
	insert: function(user, callbackFromController){
		var sql = "INSERT INTO users VALUES (null,?, ?, ?, ?, ?, ?, ?, ?, ?)";
		var sql1 = "SELECT * from users WHERE username=?";
		var sql2 = "INSERT INTO docdesc VALUES (null,?, ?, ?, ?)";
		db.execute(sql, [ user.fullname, user.username, user.address, user.email, user.phone, user.password, user.usertype, user.lat, user.lng], function(result){
				db.execute(sql1,[user.username],function (result1) {
						db.execute(sql2,[result1[0].Userid,"Empty","Empty","Empty"],function (result2) {
							callbackFromController(result);
						})



				});

		});
	},
	update: function(user, callbackFromController) {
		var sql = "UPDATE users SET username=?, password=? WHERE userId=?";
		db.execute(sql, [user.username, user.password, user.userId], function(result){
			callbackFromController(result);
		});
	},

	appinsert: function(user, callbackFromController){
		var sql = "INSERT INTO schedule VALUES (null,?, ?, ?, ?, ?, ?, ?, ?, ?)";
		db.execute(sql, [user.day, user.sthour, user.stmin, user.edhour, user.edmin, user.address, user.userid, user.lat, user.lng], function(result){
			callbackFromController(true);
		});
	},

    appget: function(appid, callbackFromController){
		var sql="SELECT * FROM schedule WHERE scheId=?";
		db.execute(sql,[appid], function(result){
            //console.log(result);
            //console.log("pasie bai e");
			callbackFromController(result);
		});
	},
	appCon : function(id, callbackFromController){
	var sql="SELECT * FROM schedule WHERE scheId=?";
	db.execute(sql,id, function(result){
		callbackFromController(result);
	});
	},


	profile: function(profile, callbackFromController){
	var sql="SELECT * FROM schedule WHERE doctorid=? AND day=?";
	db.execute(sql,[profile.docId,profile.selDay], function(result){
					console.log(result);
		callbackFromController(result);
	});
	},

	insertPatTime: function (patTime, callbackFromController) {
		var sql = " UPDATE appointment SET ph=? WHERE scheId=? AND date=? AND patId=?;UPDATE appointment SET pm=? WHERE scheId=? AND date=? AND patId=? ";
		db.execute(sql,[patTime.ph,patTime.scheId,patTime.date,patTime.patId,patTime.pm,patTime.scheId,patTime.date,patTime.patId],function(result){

			callbackFromController(result);
		});
	},
	appDel: function(delApp,callbackFromController){
		var sql = " DELETE FROM appointment WHERE scheId=? AND patId = ? AND date = ? "
		db.execute(sql,[delApp.scheId,delApp.patId,delApp.date],function (result) {
			console.log("at appDel");
			callbackFromController(result);
		});
	},


    	appupdate: function(app, callbackFromController) {
		var sql = "UPDATE schedule SET day=?, s_h=?, s_m=?, e_h=?, e_m=?, address=? WHERE scheId=?";
            console.log(app);
		db.execute(sql, [app.day, app.sthour, app.stmin, app.edhour, app.edmin, app.address, app.appid], function(result){
			callbackFromController(result);
		});
	},
   //  $sql="DELETE FROM ".$mainitem." WHERE styleid='".$styleid."'";

    appdelete:function(id,callbackFromController){
        var sql="DELETE FROM schedule WHERE scheId=?";
        db.execute(sql,[id],function(){
            callbackFromController(true);
        });
    },
		//show doctor list

		showDoctor: function(callbackFromController) {
			//var sql = "SELECT users.*, docdesc.specialist FROM users INNER JOIN docdesc ON users.Userid=docdesc.Userid WHERE users.Usertype='doctor'";
			var sql="SELECT schedule.*,docdesc.specialist,users.Fullname, users.Userid FROM schedule INNER JOIN docdesc INNER JOIN users on schedule.doctorid = docdesc.Userid AND docdesc.Userid = users.Userid";

			db.execute(sql,null,function(result){
				callbackFromController(result);
			});



		},
    //appoinment
      //appoinment insert
    confAppointment: function(appconf,callbackFromController){
				var sql1 = "SELECT * FROM appointment WHERE scheId=? AND date=? AND patId =? ";
        var sql2 = " DELETE FROM appointment WHERE ph IS NULL AND scheId=? AND date=? ;INSERT INTO appointment VALUES(null,?,?,?,?,null,null,1); UPDATE appointment as tab1,(SELECT MAX(serial) as 'serial' FROM appointment where scheId=? AND date=?) as tab2 SET tab1.serial=tab2.serial+1 where scheId=? AND date = ? AND patId = ? ; SELECT serial FROM appointment WHERE scheId=? AND date = ? AND patId = ? ";
				var sql3 = " UPDATE appointment SET patId=? AND status = ? WHERE status=? AND scheId=? AND date= ? "
				db.execute(sql1,[appconf.schId,appconf.date,appconf.pId],function(result){
					if (result.length == 0) {

						// under a condition
						// db.execute(sql3,[appconf.pId,1,0,appconf.schId,appconf.date],function(result){
						// 	console.log(result,"update");
						// 	callbackFromController(result);
						// });

						db.execute(sql2,[appconf.schId,appconf.date,appconf.date,appconf.serial,appconf.pId,appconf.schId,appconf.schId,appconf.date,appconf.schId,appconf.date,appconf.pId,appconf.schId,appconf.date,appconf.pId,appconf.schId,appconf.date,appconf.pId],function(result){
								callbackFromController(result);
								console.log(result,"niloy1");
		        });

					}

					else {
						callbackFromController(0);
					}
				});


    },





	//scheduleGetAll

	schgetAll: function(did, callbackFromController) {
		var sql = "SELECT * FROM schedule WHERE doctorid=?";
		db.execute(sql, [did] ,function(result){
			callbackFromController(result);
		});

	},
	presInsert: function(presinsert,callbackFromController){
		var sql="INSERT INTO prescription VALUES(null,?,?,?,?)";
		db.execute(sql,[presinsert.docid,presinsert.patid,presinsert.img,presinsert.date],function(result){
			callbackFromController(true);
		});
	},
	/*getPres: function(id,callbackFromController){
		var sql="SELECT * FROM prescription WHERE patId=?";
console.log(id);
		db.execute(sql,[id],function(result){
			console.log(id);
			callbackFromController(result);
		});
	}*/
     getpatinfo : function(pid,callbackFromController){

         var sql="SELECT * FROM prescription WHERE patId=?";
         db.execute(sql,[pid],function(result){
             callbackFromController(result);
         });
     },
    getPresDoc: function(id, callbackFromController){
		var sql = "SELECT * FROM users WHERE Userid=?";
        //console.log(id);
        //console.log("this function working");
		db.execute(sql, [id], function(result){
			//console.log(result);
		});
	},

	sendMsg: function(msgSend, callbackFromController){
	var sql = "INSERT INTO message VALUES (null,?, ?, ?, ?,?)";
			//console.log(id);
			//console.log("this function working");
	db.execute(sql, [msgSend.sender,msgSend.receiver,msgSend.msg,msgSend.date,0], function(result){
		//console.log(result);
		callbackFromController(result);
	});
	},

	allMsg1: function(msgSend,callbackFromController){

		var sql = "SELECT message.date, message.msg, message.status, users.Fullname FROM message INNER JOIN users ON message.senderId=users.Userid WHERE (senderId=? AND receiverId=?) OR (senderId=? AND receiverId=?)  ORDER BY msgId DESC";
		db.execute(sql,[msgSend.senderId,msgSend.receiver,msgSend.receiver,msgSend.senderId],function(result){
			callbackFromController(result);
		});
	},
	msgStatus : function (msgSend,callbackFromController){
		var sql = "UPDATE message SET status=? WHERE senderId=? AND receiverId=?";
		db.execute(sql,[1,msgSend.receiver,msgSend.senderId], function(result1){
			callbackFromController(result1);
		})
	},
	searchDoctor: function(name,callbackFromController){
		var sql="SELECT * FROM users WHERE Usertype='doctor' AND Fullname LIKE '%"+name+"%'";
		//var sql = "SELECT Fullname FROM users WHERE Usertype='doctor'";
		console.log(sql);
		db.execute(sql,null,function(result){
			console.log(result,"fullname");
       callbackFromController(result);
		});
	},
	showDoctorCat: function(cat,callbackFromController){
		//var sql="SELECT * FROM users WHERE Usertype='doctor' AND Fullname LIKE '%"+name+"%'";
	  if (cat=="alldoc" || cat=="all") {
			var sql="SELECT users.Fullname, users.Userid, docdesc.specialist FROM users INNER JOIN docdesc ON users.Userid=docdesc.Userid WHERE users.Usertype='doctor' ";
			console.log(sql,'77');
			db.execute(sql,cat,function(result){
				//console.log(result);
	       callbackFromController(result);
			});
	  }
		else {
			var sql="SELECT docdesc.Userid,docdesc.specialist, users.Fullname FROM users NATURAL JOIN docdesc WHERE users.Usertype='doctor' AND docdesc.specialist =? ";
			db.execute(sql,cat,function(result){
				//console.log(result);
	       callbackFromController(result);
			});
		}
			},

	inboxPat: function(info,callbackFromController){

		 var sql = "SELECT DISTINCT message.receiverId, users.Fullname FROM message INNER JOIN users ON (message.receiverId=users.Userid ) WHERE senderId=?  ORDER BY msgId DESC";
		//	var sql = " SELECT receiverId , senderId from message WHERE senderId=? OR receiverId=? ";
		db.execute(sql,[info.id],function(result){
			callbackFromController(result);
		//	console.log(result,"inbox");
		});
	},
	inboxDoc: function(info,callbackFromController){

		 var sql = "SELECT DISTINCT users.Fullname,message.senderId, message.status FROM message INNER JOIN users ON message.senderId=users.Userid WHERE receiverId=?  ORDER BY msgId DESC";
		//var sql = " SELECT DISTINCT Fullname, senderId,status FROM (SELECT users.Fullname,message.senderId, message.status FROM message INNER JOIN users ON message.senderId=users.Userid WHERE message.receiverId=? ORDER BY message.msgId DESC) as t1 ";
		db.execute(sql,[info.id],function(result){
			callbackFromController(result);
			console.log(result,"inbox");
		});
	},
report: function(id,callbackFromController){
	var sql = "SELECT COUNT(appointment.status) as patCount,schedule.day FROM schedule NATURAL JOIN appointment WHERE appointment.status=1 AND schedule.doctorid=? GROUP BY schedule.day";
	db.execute(sql,[id],function(result){
		callbackFromController(result);

	});
},
forumGet: function(callbackFromController) {
	var sql = "SELECT post.* , users.Fullname FROM post INNER JOIN users ON post.postedBy = users.Userid ORDER BY post.postId DESC";
	db.execute(sql,null,function (result) {
		console.log(result);
		callbackFromController(result);
	});
},
forumCom: function (com,callbackFromController) {
	var sql = "INSERT INTO comment VALUES (null, ?, ?, ?, ?)";
	db.execute(sql,[com.comm, com.comBy, com.id, com.time ],function (result) {
		console.log(result);
		callbackFromController(result);
	});

},

loadComment:function (id,callbackFromController) {
	//console.log("HIT2");
	var sql = "Select comment.*, users.Fullname FROM comment INNER JOIN users ON comment.commentedBy = users.Userid WHERE postId = ?";
	db.execute(sql,id,function (result) {
		//console.log(result);
		callbackFromController(result);
	});

},

forumPost: function(info,callbackFromController) {

	var sql = "INSERT INTO post VALUES (null, ?, ?, ?, ?, ?, ?)";

	db.execute(sql,[info.post,info.postedBy,info.time,info.likes,info.tags,info.category],function (result) {
		callbackFromController(result);
	});

}

};
