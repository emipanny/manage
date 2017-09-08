
const express = require('express');
const router = express.Router();
const {awaitmysql,comment} = require("../conf");
const {checkUser} = require("../middleware");

//登录验证首页
const login = require("./login");
router.get('/', login.home);
router.post('/ajaxlogin', login.ajaxlogin);
router.get('/logout', login.logout);

//权限管理
const rights = require("./rights");

router.get('/rights/sysuserlist', checkUser.checklogin , checkUser.checkrights , rights.sysuserlist );
router.get('/rights/sysuserAdd', checkUser.checklogin , checkUser.checkrights , rights.sysuserAddRender);

router.post('/rights/sysuserAdd', checkUser.checklogin , checkUser.checkrights , rights.sysuserAdd);
router.get('/rights/sysuserMgr/:id', checkUser.checklogin , checkUser.checkrights , rights.sysuserMgrByIDRender);
router.post('/rights/sysuserMgr/:id', checkUser.checklogin , checkUser.checkrights ,  rights.sysuserMgrByID);
router.get('/rights/sysuserDel/:id', checkUser.checklogin , checkUser.checkrights ,  rights.sysuserDelByID);

router.get('/rights/grouplist', checkUser.checklogin , checkUser.checkrights ,  rights.grouplist);
router.get('/rights/groupAdd', checkUser.checklogin , checkUser.checkrights ,  rights.groupAddRender);

router.post('/rights/groupAdd', checkUser.checklogin , checkUser.checkrights ,  rights.groupAdd);
router.get('/rights/groupMgr/:id', checkUser.checklogin , checkUser.checkrights ,  rights.groupMgrByIDRender);
router.post('/rights/groupMgr/:id', checkUser.checklogin , checkUser.checkrights ,  rights.groupMgrByID);
router.get('/rights/groupDel/:id', checkUser.checklogin , checkUser.checkrights ,  rights.groupDelByID);

router.get('/rights/right', checkUser.checklogin , checkUser.checkrights ,  rights.rightRender);

router.post('/rights/right', checkUser.checklogin , checkUser.checkrights ,  rights.right);

router.post('/rights/changeRights', checkUser.checklogin , checkUser.checkrights , rights.changeRights);




module.exports = router;
