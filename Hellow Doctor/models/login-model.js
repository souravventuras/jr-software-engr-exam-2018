var db = require('./db');
module.exports = {
	verifyUser: function(user, callbackFromController){
		var sql = "SELECT * FROM users WHERE username=? AND password=?";
		console.log(sql);
		db.execute(sql, [user.username, user.password], function (result){

			if(result.length == 1)
			{
				callbackFromController(result);
			}
			else
			{
				var a=[];
				a[0]={Usertype:"not found"};
				callbackFromController(a);
			}
		});

		//connection.end();
	}
};
