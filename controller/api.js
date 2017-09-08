var express = require('express');
var router = express.Router();

/* GET home page. */
/*
router.get('/', function(req, res, next) {
	if(req.session.user) {
		res.render('index', { title: 'Index' });
	}
	else res.redirect('/login');
});*/
router.get('/', function(req, res, next) {

	var brand=Array();
	var mysql      = require('mysql');
	var connection = mysql.createConnection({
	  host     : 'localhost',
	  user     : 'root',
	  password : 'Panny706!',
	  database : 'new'
	});

	connection.connect();

	connection.query({
	  sql: 'SELECT * FROM t_brand',
	  timeout: 40000, // 40s
	  values: ['David']
	    }, function (err, rows, fields) {
	     if (err){
	      throw err;
	     }
	     if (rows){
	     	brand=rows;
			res.render('index', { brand: brand });
	     }
	});
	connection.end();
});
router.post('/api', function(req, res) {

	var brand=Array();
	var mysql      = require('mysql');
	var connection = mysql.createConnection({
	  host     : 'localhost',
	  user     : 'root',
	  password : 'Panny706!',
	  database : 'new'
	});

	connection.connect();

	connection.query({
	  sql: 'SELECT * FROM t_brand',
	  timeout: 40000, // 40s
	  values: ['David']
	    }, function (err, rows, fields) {
	     if (err){
	      throw err;
	     }
	     if (rows){
	     	brand=rows;
			res.json({brand:brand});
	     }
	});

	connection.end();
});

module.exports = router;
