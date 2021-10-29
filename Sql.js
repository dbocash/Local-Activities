var mysql = require('mysql')

var con = mysql.createConnection({
host:"localhost",
database:FinalActivities
})

con.connect(function(err)){
	if(err)throw err;
	con.query("SELECT * FROM activities ORDER BY Title", function(err,result,fields)){
		if(err)throw err;
		console.log(result);
	}
}