

// mysql.js
const mysql = require('mysql');
const config=require("../conf/config.js");
const db = mysql.createConnection(config.db);

exports.query = (sql, ins) => new Promise((resolve, reject) => {
	db.query(sql, ins, (err, result, fields) => {
		err ? reject(err) : resolve(result);
	})
})
exports.transaction = () => new Promise((resolve, reject) => {
	db.beginTransaction(err => {
		err ? reject(err) : resolve();
	})
})
exports.commit = () => new Promise((resolve, reject) => {
	db.commit(err => {
		err ? reject(err) : resolve();
	})
})
exports.rollback = () => new Promise((resolve, reject) => {
	db.rollback();
})
exports.transactionquery = () =>  {
	db.beginTransaction(function(err) {
	  if (err) { throw err; }
	  db.query('INSERT INTO t_education_sysrights set ?', {group_id:18,controller:"rights",action:"xxx",list:"x"}, function (error, results, fields) {
	    if (error) {
	      return db.rollback(function() {
	        throw error;
	      });
	    }

	    var log = 'Post ' + results.insertId + ' added';
	        console.log(log);

	    db.query('INSERT INTO t_education_sysrights set ?',{group_id:18,controller:"rights",action:"xxx",list:"x"}, function (error, results, fields) {
	      if (error) {
	        return db.rollback(function() {
	          throw error;
	        });
	      }
	      db.commit(function(err) {
	        if (err) {
	          return db.rollback(function() {
	            throw err;
	          });
	        }
	        console.log('success!');
	      });
	    });
	  });
	});
}