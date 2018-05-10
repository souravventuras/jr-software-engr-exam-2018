var db = require('./db');
module.exports = {

	patappdetails: function(id, callbackFromController) {

		var sql = "SELECT appointment.* , schedule.* FROM schedule INNER JOIN appointment ON appointment.scheId = schedule.scheId INNER JOIN users ON schedule.doctorId=users.Userid where appointment.patId =? AND appointment.date >= NOW()";
		db.execute(sql,[id], function(result){
 console.log(result);
			callbackFromController(result);
		});
	},

	docappdetails: function(id, callbackFromController) {

		var sql = "SELECT users.*,appointment.*,schedule.* from appointment INNER JOIN schedule ON appointment.scheId=schedule.scheId INNER JOIN users ON appointment.patId=users.Userid WHERE schedule.scheId =? AND appointment.date >= NOW()";
		db.execute(sql,[id], function(result){

			callbackFromController(result);
		});
	}





}
