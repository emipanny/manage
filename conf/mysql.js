
var mysql      = require('mysql');
var Q = require("q");
var host='localhost',user="root",password="Panny706!",database="envisioneer";
var sqlact ={
	check:function(sql,callback){
		var connection = mysql.createConnection({
		  host     : host,
		  user     : user,
		  password : password,
		  database : database
		});
		connection.connect();
		connection.query({
		  sql: sql,
		  timeout: 40000, // 40s
		  values: ['David']
		    }, function (err, rows, filed) {
		     if (err){
		      throw err;
		     }
		     if (rows){
				console.log(rows);
				connection.end();
				callback(rows);
		     }
		});
	},
	checkWithData:function(sql,callback,data){
		var connection = mysql.createConnection({
		  host     : host,
		  user     : user,
		  password : password,
		  database : database
		});
		connection.connect();
		connection.query({
		  sql: sql,
		  timeout: 40000, // 40s
		  values: ['David']
		    }, function (err, rows, filed) {
		     if (err){
		      throw err;
		     }
		     if (rows){
				//console.log(rows);
				connection.end();
				callback(rows,data);
		     }
		});
	},
	add:function(table,data,callback){
		var connection = mysql.createConnection({
		  host     : host,
		  user     : user,
		  password : password,
		  database : database
		});

		var keys="";
		var values="";
		var i=0;
		for(var key in data){
			if (i==0) {
				keys+=key;
				values+="'"+data[key]+"'";
			}
			else {
				keys+=","+key;
				values+=",'"+data[key]+"'";
			}
			i++;
		}
			//console.log(values);
		var sql="INSERT INTO "+table+" ("+keys+") VALUES ("+values+");"

		connection.connect();
		connection.query({
		  sql: sql,
		  timeout: 40000, // 40s
		  values: ['David']
		    }, function (err, rows, filed) {
		     if (err){
		      throw err;
		     }
		     if (rows){
				//console.log(rows);
				connection.end();
				callback(rows);
		     }
		});
	},
	update:function(table,data,id,callback){
		var connection = mysql.createConnection({
		  host     : host,
		  user     : user,
		  password : password,
		  database : database
		});

		var str="";
		var i=0;
		for(var key in data){
			if (i==0) {
				str+=key+"='"+data[key]+"'";
			}
			else {
				str+=","+key+"='"+data[key]+"'";
			}
			i++;
		}
			//console.log(values);
		var sql="UPDATE "+table+" SET "+str+" WHERE id="+id;

		connection.connect();
		connection.query({
		  sql: sql,
		  timeout: 40000, // 40s
		  values: ['David']
		    }, function (err, rows, filed) {
		     if (err){
		      throw err;
		     }
		     if (rows){
				//console.log(rows);
				connection.end();
				callback(rows);
		     }
		});
	},
	checkByPage:function(sql,pageNow,pageCount,callback){
		var connection = mysql.createConnection({
		  host     : host,
		  user     : user,
		  password : password,
		  database : database
		});

		var start=(pageNow-1)*pageCount;
		connection.connect();
		connection.query({
		  sql: sql+" limit "+start+","+pageCount,
		  timeout: 40000, // 40s
		  values: ['David']
		    }, function (err, rows, filed) {
		     if (err){
		      throw err;
		     }
		     if (rows){
		     	next(rows);
		     }
		});
		function next(data){

			connection.query({
			  sql: sql,
			  timeout: 40000, // 40s
			  values: ['David']
			    }, function (err, rows, filed) {
			     if (err){
			      throw err;
			     }
			     if (rows){
					//console.log(rows);
					connection.end();
					var pages=Math.ceil(rows.length/pageCount)
					callback(pages,data);
			     }
			});
		}
	},
	del:function(table,id,callback){
		var connection = mysql.createConnection({
		  host     : host,
		  user     : user,
		  password : password,
		  database : database
		});

		connection.connect();
		connection.query({
		  sql: "DELETE FROM "+table+" WHERE id ="+id ,
		  timeout: 40000, // 40s
		  values: ['David']
		    }, function (err, rows, filed) {
		     if (err){
		      throw err;
		     }
		     if (rows){
		     	callback(rows);
		     }
		});
	},
	updateByUnion:function(table,data,primary,callback){
		var connection = mysql.createConnection({
		  host     : host,
		  user     : user,
		  password : password,
		  database : database
		});

		var str="";
		var i=0;
		for(var key in data){
			if (i==0) {
				str+=key+"='"+data[key]+"'";
			}
			else {
				str+=","+key+"='"+data[key]+"'";
			}
			i++;
		}
		var str2="";
		var j=0;
		for(var key in primary){
			if (j==0) {
				str2+=key+"='"+primary[key]+"'";
			}
			else {
				str2+=" and "+key+"='"+primary[key]+"'";
			}
			j++;
		}
			//console.log(values);
		var sql="UPDATE "+table+" SET "+str+" WHERE "+str2;

		connection.connect();
		connection.query({
		  sql: sql,
		  timeout: 40000, // 40s
		  values: ['David']
		    }, function (err, rows, filed) {
		     if (err){
		      throw err;
		     }
		     if (rows){
				//console.log(rows);
				connection.end();
				callback(rows);
		     }
		});
	},
	promise:function(sql){
		var connection = mysql.createConnection({
		  host     : host,
		  user     : user,
		  password : password,
		  database : database
		});
 		var deferred = Q.defer();

		connection.connect();
		connection.query({
		  sql: sql,
		  timeout: 40000, // 40s
		  values: ['David']
		    }, function (err, rows, filed) {
		     if (err){
		      throw err;
		     }
		     if (rows){
				//console.log(rows);
				connection.end();
	    		deferred.resolve(rows);
		     }
		});

	    return deferred.promise;
	},
}

module.exports=sqlact;