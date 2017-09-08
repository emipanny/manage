
const url = require('url');
exports.checklogin =  (req, res, next) => {
	if (req.session.user) return next();
	res.render('timeout',{title:"您未登陆，或长时间未操作，请退出登陆后，重新登陆！"});
};
exports.checkrights =  (req, res, next) => {

	let nowUrl=url.parse(req.url, true).pathname;
	nowUrl=nowUrl.split("/");
	let temp=Array();
	let j=0;
	for (let i = 0; i < nowUrl.length; i++) {
		if (nowUrl[i]!=""){
			temp[j]=nowUrl[i];
			j++;
		}
	};
	let controller=temp[0];
	let action=temp[1];

	if (req.session.right){
		if(req.session.right.hasOwnProperty(controller)){
			if(req.session.right[controller].indexOf(action)!=-1){
				next();
				return;
			}
			else {
				res.render('noright');
				return;
			}
		}
		else {
			res.render('noright');
			return;
		}
	}
	else {
		res.render('timeout',{title:"您未登陆，或长时间未操作，请退出登陆后，重新登陆！"});
		return;
	}

};