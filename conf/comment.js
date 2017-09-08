const comment={
	checkLogin:function(session){
		if (session) return true;
		else return false;
	},
	checkRights:function(right,controller,action){
		if(right.hasOwnProperty(controller)){
			if(right[controller].indexOf(action)!=-1){
				return true;
			}
			else return false;
		}
		else return false;
	},
	checkLoginRights:function(session,url,res){
		url=url.split("/");
		let temp=Array();
		let j=0;
		for (let i = 0; i < url.length; i++) {
			if (url[i]!=""){
				temp[j]=url[i];
				j++;
			}
		};
		let controller=temp[0];
		let action=temp[1].split("?");
		action=action[0];

		console.log(controller);
		console.log(action);
		if (session.right){
			if(session.right.hasOwnProperty(controller)){
				if(session.right[controller].indexOf(action)!=-1){
					return true;
				}
				else {
					res.render('noright');
					return false;
				}
			}
			else {
				res.render('noright');
				return false;
			}
		}
		else {
			res.render('logout');
			return false;
		}
	},
	getmd5:function(pwd){
		let crypto = require('crypto');
		let hasher=crypto.createHash("md5");
		hasher.update(pwd);
		let hashmsg=hasher.digest('hex');
		return hashmsg;
	}
}
module.exports=comment;