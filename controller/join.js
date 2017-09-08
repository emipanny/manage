var express = require('express');
var router = express.Router();

/* GET home page. */
router.get('/', function(req, res, next) {
	res.render('index', { title: 'Index' });
});
router.get('/join', function(req, res, next) {
	res.render('join/join', { title: 'Index' });
});

module.exports = router;
