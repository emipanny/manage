
const url = require('url');
const {awaitmysql,comment}=require("../conf");

exports.sysuserlist = async (req, res, next) => {
	let pageNow = url.parse(req.url, true).query.page || 1;
	let pageCount = 10;
	let pageUrl = "/rights/sysuserlist";
	let start = (pageNow-1)*pageCount;
	let count = await awaitmysql.query("SELECT a.*,b.name as groupname FROM t_education_sysuser as a left join t_education_sysgroup as b on a.group_id=b.id ORDER BY a.id desc");
	let data = await awaitmysql.query("SELECT a.*,b.name as groupname FROM t_education_sysuser as a left join t_education_sysgroup as b on a.group_id=b.id  ORDER BY a.id desc limit ?,?",[start,pageCount]);
	let pages = Math.ceil(count.length/pageCount);
	res.render('rights/sysuserlist', { users: data, page:pageNow, pages:pages,pageUrl:pageUrl});
};
exports.sysuserAddRender = async (req, res, next) => {

	let groups = await awaitmysql.query("SELECT * FROM  t_education_sysgroup  ORDER BY id desc ");
	res.render('rights/sysuserAdd', { groups: groups});
};

exports.sysuserAdd = async (req, res) => {

	let data = {};
	data['username'] = req.body.username;
	data['password'] = comment.getmd5(req.body.password);
	data['group_id'] = req.body.group_id;
	data['realname'] = req.body.realname;
	data['sex'] = req.body.sex;
	data['telphone'] = req.body.telphone;
	data['cdate'] = Math.round(new Date().getTime()/1000);
	data['mdate'] = data['cdate'];

	let user = await awaitmysql.query("SELECT * FROM  t_education_sysuser where ?  ORDER BY id desc ",{username:req.body.username});
	if (user.length > 0){
		res.render('error', { title: "用户名存在",time:3});
		return;
	}
	else{
		let insert = await awaitmysql.query("INSERT INTO t_education_sysuser set ?",data);
		if (insert.insertId > 0) {
			res.render('sucess', { title: "添加成功",m:0,t:0,b:1,time:3});
			return;
		}
		else
			return res.render('error', { title: "发生错误，请重试！",time:3});
	}
};
exports.sysuserMgrByIDRender = async (req, res, next) => {
	let id = req.params.id;

	let groups = await awaitmysql.query("SELECT * FROM  t_education_sysgroup  ORDER BY id desc ");
	let user =await awaitmysql.query("SELECT * FROM  t_education_sysuser where ? ORDER BY id desc ", {id:id});
	res.render('rights/sysuserMgr', { groups: groups,user:user});
};
exports.sysuserMgrByID = async (req, res) => {

	let id = req.params.id;
	let data = {};
	if (req.body.password != "" && req.body.password != undefined && req.body.password != null)
		data['password'] = comment.getmd5(req.body.password);
	data['group_id'] = req.body.group_id;
	data['realname'] = req.body.realname;
	data['sex'] = req.body.sex;
	data['telphone'] = req.body.telphone;
	data['mdate'] = Math.round(new Date().getTime()/1000);

	await awaitmysql.query( "UPDATE t_education_sysuser SET ? WHERE id=?",[data,id]);
	res.render('sucess', { title: "修改成功",m:0,t:0,b:1,time:3});


};
exports.sysuserDelByID = async (req, res, next) => {

	let id = req.params.id;
	await awaitmysql.query("DELETE FROM t_education_sysuser WHERE ?",{id:id});
	res.render('sucess', { title: "删除成功",m:0,t:0,b:1,time:1});

};

exports.grouplist = async (req, res, next) => {

	let pageNow = url.parse(req.url, true).query.page || 1;
	let pageCount = 10;
	let pageUrl = "/rights/grouplist";

	let start = (pageNow-1)*pageCount;
	let count = await awaitmysql.query("SELECT * FROM t_education_sysgroup ORDER BY id desc");
	let data = await awaitmysql.query("SELECT * FROM t_education_sysgroup ORDER BY id desc limit ?,?",[start,pageCount]);
	let pages = Math.ceil(count.length/pageCount);
	res.render('rights/grouplist', { groups: data, page:pageNow, pages:pages,pageUrl:pageUrl});
};
exports.groupAddRender = (req, res, next) => {

	res.render('rights/groupAdd');
};

exports.groupAdd = async (req, res) => {

	let data = {};
	data['name'] = req.body.name;

	let name = await awaitmysql.query("SELECT * FROM  t_education_sysgroup where ?  ORDER BY id desc ",{name:data['name']});
	if (name.length>0)
		res.render('error', { title: "用户名存在",time:3});
	else{
		await awaitmysql.query("INSERT INTO t_education_sysgroup set ?",data);
		res.render('sucess', { title: "添加成功",m:0,t:1,b:1,time:3});
	}
};
exports.groupMgrByIDRender = async (req, res, next) => {
	let id = req.params.id;

	let group = await awaitmysql.query("SELECT * FROM  t_education_sysgroup where ?  ORDER BY id desc ",{id:id});
	res.render('rights/groupMgr', { groups: group});
};
exports.groupMgrByID =  async (req, res) => {

	let id = req.params.id;
	let data = {};
	data['name'] = req.body.name;

	await awaitmysql.query( "UPDATE t_education_sysgroup SET ? WHERE id=?",[data,id]);
	res.render('sucess', { title: "修改成功",m:0,t:1,b:1,time:1});


};
exports.groupDelByID = async (req, res, next) => {
	let id = req.params.id;
	await awaitmysql.query("DELETE FROM t_education_sysgroup WHERE ?",{id:id});
	res.render('sucess', { title: "删除成功",m:0,t:1,b:1,time:1});

};

exports.rightRender = async (req, res, next) => {

	let sql = Array();
	sql[0]={};
	sql[0].sql = "INSERT INTO t_education_sysuser set ?";
	sql[0].ins = {group_id:6,controller:"rights",action:"xxx",list:"x"};

	sql[1]={};
	sql[1].sql = "INSERT INTO t_education_sysuser set ?";
	sql[1].ins = {group_id:7,controller:"rights",action:"xxx",list:"x"};

 	await awaitmysql.transactionquery();
	try	{
		await awaitmysql.query("INSERT INTO t_education_sysrights set ?",{group_id:13,controller:"rights",action:"xxx",list:"x"});
		await awaitmysql.query("INSERT INTO t_education_sysrights set ?",{group_id:13,controller:"rights",action:"xxx",list:"x"});
		await awaitmysql.commit();
	} catch(err){
		await awaitmysql.rollback();
	}

	/*
	let groups = await awaitmysql.query("SELECT * FROM  t_education_sysgroup ORDER BY id desc ");
	let menu = require("../conf/menu.js");
	res.render('rights/right',{groups:groups,menu:menu});*/
};

exports.right = async (req, res) => {

	let gid = req.body.gid;
	let json = req.body;
	let i = 0;
	let j = 0;
	delete json['gid'];
	delete json['submit'];
	for(let key in json){
		let check = {};
		check['group_id'] = gid;
		check['controller'] = key;
		let checkright = await awaitmysql.query("SELECT * FROM  t_education_sysrights where ? and ?",[{group_id:gid},{controller:key}]);
		//let checkright = await awaitmysql.query("SELECT * FROM  t_education_sysrights where ?",[check]);

		if (checkright.length>0) {
			let update = {};
			update['action'] = JSON.stringify(json[key]);
			await awaitmysql.query("UPDATE t_education_sysrights SET ? WHERE ? and ?",[update,{group_id:gid},{controller:key}]);
		}
		else {
			let add = {};
			add['group_id']=gid;
			add['list']="x";
			add['controller'] = key;
			add['action'] = JSON.stringify(json[key]);
			await awaitmysql.query("INSERT INTO t_education_sysrights set ?",add);
		}
	}
	res.render('sucess', {title: "更新成功",m:0,t:2,b:1,time:1});
};

exports.changeRights = async (req, res, next) => {
	let rights = req.body.rights;
 	let result = await awaitmysql.query("SELECT * FROM t_education_sysrights where ?",{group_id:rights});
	let data={};
	for (let i = 0; i < result.length; i++) {
		data[result[i]['controller']]=JSON.parse(result[i]['action']);
	};
	res.json(data);
};
exports.text = async (req, res, next) => {
	console.log("text");
 	await awaitmysql.transaction("",{group_id:rights});
};

