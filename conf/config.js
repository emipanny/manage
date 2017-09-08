
exports.session =  {
	 "secret"				: '12345',
     "name"					: 'testapp',   //这里的name值得是cookie的name，默认cookie的name是：connect.sid
     "cookie"				: {maxAge: 1800000 },  //设置maxAge是80000ms，即80s后session和相应的cookie失效过期
     "resave"				: true,
     "rolling"				: true,
     "saveUninitialized"	: false,//sess
};
exports.db =  {
	  "host"     : 'localhost',
	  "user"     : "root",
	  "password" : "f6j7j8j9",
	  "database" : "envisioneer"
};