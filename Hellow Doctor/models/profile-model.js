var db = require('./db');
module.exports = {

		getAlldata: function(id, callbackFromController){

		var sql = "SELECT users.Fullname , users.Address ,users.Username, users.Userid, users.Email , users.Phone, users.Password, docdesc.specialist, docdesc.description, docdesc.degrees FROM users JOIN docdesc ON users.Userid= docdesc.Userid WHERE  users.Userid= ?";
		db.execute(sql, [id], function(result){

			callbackFromController(result);
		});
	},


		detailsUpdate: function(app, callbackFromController) {

		var sql = "UPDATE users INNER JOIN docdesc ON users.Userid = docdesc.Userid SET users.Fullname = ? ,users.Username=?, users.Address=?, users.Email=?, users.Phone=?, users.Password=?, docdesc.specialist = ?, docdesc.degrees=?, docdesc.description=? WHERE users.Userid=?; SELECT * FROM users WHERE Userid=?";
		db.execute(sql, [app.fullname, app.username, app.address, app.email, app.phone, app.password, app.specialist, app.degrees, app.description, app.docid,app.Userid], function(result){
			console.log(result[1],"22");
			callbackFromController(result);
		});
	},
	getPat: function(id, callbackFromController){

			var sql = "SELECT users.* FROM users WHERE  users.Userid= ?";
			db.execute(sql, [id], function(result){

				callbackFromController(result);
			});
		},
	    patDetUpdate: function(patDetails,callbackFromController){
	       var sql= "UPDATE users SET Fullname=?, Address=?, Email=?, Phone=?, Password=? WHERE Userid=?";
	       db.execute(sql,[patDetails.fname,patDetails.address,patDetails.phone,patDetails.email,patDetails.password,patDetails.patid],function(result){
	               callbackFromController(true);
	       })

	    }





	}
