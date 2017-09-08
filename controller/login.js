
const {awaitmysql,comment}=require("../conf");

exports.home = (req, res, next) => {
	//console.log(req.session.user);
	if (req.session.user){
		let menu = require("../conf/menu.js");
		let list = Array();
		let right = req.session.right;
		let menu1 = {},menu2 = {};
		for (let key in menu)
	    {
	    	menu1[key] = menu[key]['title'];
	    	menu2[key] = menu[key]['menu_group'];
	    }

		res.render('index', { title: 'Home',user: req.session.user,menu1:menu1,menu2:menu2,right:right});
	}
	else{
		//let two=require("/home/wwwroot/node/conf/menu.js");
		res.render('login');
	}

};
exports.ajaxlogin = async (req, res, next) => {
	let user = await awaitmysql.query("SELECT * FROM t_education_sysuser where ?  ORDER BY id asc LIMIT 0,1 ",{username:req.body.username});
	let pwd = req.body.password;
	let restule = 0;
	if (user.length == 0) {
			return res.json(3);
	}
	if (user[0].password == comment.getmd5(pwd)) {
		req.session.user = user[0].username;
		req.session.group = user[0].group_id;
		let getrights = await awaitmysql.query("SELECT * FROM t_education_sysrights where ?",{group_id:req.session.group});

 		let right = {};
 		for (let i = 0; i < getrights.length; i++) {
 			right[getrights[i]['controller']] = getrights[i]['action'];
 		};
 		req.session.right = right;
		return res.json(1);

	}
	else{
		return res.json(2);
	}


};
exports.logout = (req, res, next) => {
	req.session.user = null;
 	res.redirect('/');
};