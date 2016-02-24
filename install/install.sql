SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `uid` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `mid` tinyint(3) unsigned NOT NULL,
  `username` char(15) NOT NULL,
  `userpass` char(32) NOT NULL,
  `useremail` varchar(100) DEFAULT NULL,
  `addtime` int(10) unsigned DEFAULT NULL,
  `logintime` int(10) unsigned DEFAULT NULL,
  `loginip` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='管理员表';

DROP TABLE IF EXISTS `ad_area`;
CREATE TABLE `ad_area` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `width` smallint(6) unsigned DEFAULT NULL,
  `height` smallint(6) unsigned DEFAULT NULL,
  `des` varchar(255) DEFAULT NULL,
  `checked` tinyint(1) DEFAULT '0' COMMENT '1表示通过',
  PRIMARY KEY (`id`),
  KEY `checked` (`checked`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='广告位';

INSERT INTO `ad_area` VALUES ('1', '首页750*60', '750', '60', '图片广告', '1');
INSERT INTO `ad_area` VALUES ('2', '&lt;div&gt;1&lt;/div&gt;', '750', '60', 'sd', '1');


DROP TABLE IF EXISTS `ad_data`;
CREATE TABLE `ad_data` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `type` char(10) DEFAULT NULL COMMENT 'code,text,img',
  `content` text,
  `checked` tinyint(1) DEFAULT '0' COMMENT '1表示通过',
  `addtime` int(10) unsigned NOT NULL,
  `endtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='广告';


INSERT INTO `ad_data` VALUES ('1', '1', 'rtgfg', 'text', '阿克苏的解放了卡结算电费垃圾啊塑料袋飞机拉萨决定离开房间阿莱克斯京东方老卡机塑料袋开房间阿联科技的法律框架阿拉斯加的法律', '0', '0', '0');
INSERT INTO `ad_data` VALUES ('2', '1', '图片0', 'img', 'admanage/20130830/31563841846521.jpg', '1', '1376841600', '1377273600');

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章id',
  `cateid` char(30) NOT NULL COMMENT '文章父ID',
  `author` char(20) DEFAULT NULL,
  `title` char(100) NOT NULL COMMENT '标题',
  `title_style` varchar(100) DEFAULT NULL,
  `thumb` varchar(3) DEFAULT NULL,
  `picarr` text,
  `keywords` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `content` mediumtext COMMENT '内容',
  `hit` int(10) unsigned DEFAULT '0',
  `order` tinyint(3) unsigned DEFAULT NULL,
  `posttime` int(10) unsigned DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`),
  KEY `cateid` (`cateid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

INSERT INTO `article` VALUES ('1', '2', '', '了解云购', '', '', 'a:2:{i:0;s:33:\"photo/20130902/41484375056924.jpg\";i:1;s:33:\"photo/20130902/26578125056924.jpg\";}', '', '', '<p>	</p><p>345</p>', '1', '1', '1375862513');
INSERT INTO `article` VALUES ('2', '2', '', '常见问题', '', '', 'a:0:{}', '', '', '<p>	</p><p>567567234234</p>', '0', '3', '1375862591');
INSERT INTO `article` VALUES ('3', '2', '', '服务协议', '', '', 'a:0:{}', '', '', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;	9 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 56 &nbsp; 56</p>', '0', '0', '1375862644');
INSERT INTO `article` VALUES ('4', '3', '', '购保障体系', '', '', 'a:0:{}', '', '', '<p>	</p><p>欢迎使用云购系统!56456</p>', '0', '0', '1375862690');
INSERT INTO `article` VALUES ('5', '3', null, '正品保障', null, null, 'a:0:{}', null, null, '', '0', '0', '1375862702');
INSERT INTO `article` VALUES ('6', '3', null, '安全支付', null, null, 'a:0:{}', null, null, '', '0', '0', '1375862712');
INSERT INTO `article` VALUES ('7', '4', null, '商品配送', null, null, 'a:0:{}', null, null, '', '0', '0', '1375862725');
INSERT INTO `article` VALUES ('8', '4', null, '配送费用', null, null, 'a:0:{}', null, null, '', '0', '0', '1375862737');
INSERT INTO `article` VALUES ('9', '4', null, '商品验货与签收', null, null, 'a:0:{}', null, null, '', '0', '0', '1375862747');
INSERT INTO `article` VALUES ('10', '4', null, '长时间未收到商品', null, '', 'a:0:{}', null, null, '', '0', '0', '1375862760');
INSERT INTO `article` VALUES ('12', '3', '', '隐私声明', '', '', 'a:0:{}', '', '', '<p>	</p><p>欢迎使用云购系统</p><p>隐私声明</p>', '71', '1', '1378451819');

DROP TABLE IF EXISTS `brand`;
CREATE TABLE `brand` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cateid` int(10) unsigned DEFAULT NULL COMMENT '所属栏目ID',
  `status` char(1) DEFAULT 'Y' COMMENT '显示隐藏',
  `name` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `order` (`order`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='品牌表';

INSERT INTO `brand` VALUES ('1', '5', 'Y', '联想', '16');
INSERT INTO `brand` VALUES ('2', '5', 'Y', '诺基亚', '1');
INSERT INTO `brand` VALUES ('3', '5', 'Y', '苹果', '1');
INSERT INTO `brand` VALUES ('4', '5', 'Y', '三星', '14');
INSERT INTO `brand` VALUES ('6', '5', 'Y', '小米', '1');
INSERT INTO `brand` VALUES ('7', '5', 'Y', 'oppo', '1');
INSERT INTO `brand` VALUES ('8', '5', 'Y', 'HTC', '15');
INSERT INTO `brand` VALUES ('10', '6', 'Y', '苹果', '1');
INSERT INTO `brand` VALUES ('11', '6', 'Y', '三星', '1');
INSERT INTO `brand` VALUES ('12', '6', 'Y', '台电', '13');
INSERT INTO `brand` VALUES ('13', '12', 'Y', '尼康', '3');

DROP TABLE IF EXISTS `caches`;
CREATE TABLE `caches` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(100) NOT NULL,
  `value` text,
  PRIMARY KEY (`id`),
  KEY `key` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;


INSERT INTO `caches` VALUES ('1', 'member_name_key', 'admin,administrator,云购官方');
INSERT INTO `caches` VALUES ('2', 'shopcodes_table', '1');
INSERT INTO `caches` VALUES ('3', 'goods_count_num', '0');
INSERT INTO `caches` VALUES ('4', 'template_mobile_reg', '你好,你的注册验证码是:000000 ');
INSERT INTO `caches` VALUES ('5', 'template_mobile_shop', '恭喜你云购用户！您在1元云购网够买的商品已中奖,获得的云购码为：00000000 请登陆网站查看详情！请尽快联系管理员发货！');
INSERT INTO `caches` VALUES ('6', 'template_email_reg', '你好,请在24小时内激活注册邮件，点击连接激活邮件：{地址}');
INSERT INTO `caches` VALUES ('7', 'template_email_shop', '恭喜您：{用户名}，你在云购网够买的商品：{商品名称} 已中奖，中奖码是:{中奖码}');
INSERT INTO `caches` VALUES ('8', 'pay_bank_type', 'yeepay');


DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `cateid` smallint(6) unsigned NOT NULL AUTO_INCREMENT COMMENT '栏目id',
  `parentid` smallint(6) DEFAULT NULL COMMENT '父ID',
  `channel` tinyint(4) NOT NULL DEFAULT '0',
  `model` tinyint(1) DEFAULT NULL COMMENT '栏目模型',
  `name` varchar(255) DEFAULT NULL COMMENT '栏目名称',
  `catdir` char(20) DEFAULT NULL COMMENT '英文名',
  `url` varchar(255) DEFAULT NULL,
  `info` text,
  `order` smallint(6) unsigned DEFAULT '1' COMMENT '排序',
  PRIMARY KEY (`cateid`),
  KEY `name` (`name`),
  KEY `order` (`order`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='栏目表';

INSERT INTO `category` VALUES ('1', '0', '0', '2', '帮助', 'help', '', 'a:7:{s:5:\"thumb\";s:0:\"\";s:3:\"des\";s:0:\"\";s:8:\"template\";N;s:7:\"content\";N;s:10:\"meta_title\";s:0:\"\";s:13:\"meta_keywords\";s:0:\"\";s:16:\"meta_description\";s:0:\"\";}', '1');
INSERT INTO `category` VALUES ('2', '1', '0', '2', '新手指南', 'xinshouzhinan', '', 'a:7:{s:5:\"thumb\";s:0:\"\";s:3:\"des\";s:0:\"\";s:8:\"template\";N;s:7:\"content\";N;s:10:\"meta_title\";s:0:\"\";s:13:\"meta_keywords\";s:0:\"\";s:16:\"meta_description\";s:0:\"\";}', '1');
INSERT INTO `category` VALUES ('3', '1', '0', '2', '云购保障', 'yunbaozhang', '', 'a:7:{s:5:\"thumb\";s:0:\"\";s:3:\"des\";s:30:\"司法所发射点发射得分\";s:8:\"template\";N;s:7:\"content\";s:0:\"\";s:10:\"meta_title\";s:0:\"\";s:13:\"meta_keywords\";s:0:\"\";s:16:\"meta_description\";s:0:\"\";}', '1');
INSERT INTO `category` VALUES ('4', '1', '0', '2', '商品配送', 'peisong', '', 'a:7:{s:5:\"thumb\";s:0:\"\";s:3:\"des\";s:0:\"\";s:8:\"template\";N;s:7:\"content\";N;s:10:\"meta_title\";s:0:\"\";s:13:\"meta_keywords\";s:0:\"\";s:16:\"meta_description\";s:0:\"\";}', '1');
INSERT INTO `category` VALUES ('5', '0', '0', '1', '手机', 'shouji', '', 'a:7:{s:5:\"thumb\";s:0:\"\";s:3:\"des\";s:0:\"\";s:8:\"template\";N;s:7:\"content\";N;s:10:\"meta_title\";s:0:\"\";s:13:\"meta_keywords\";s:0:\"\";s:16:\"meta_description\";s:0:\"\";}', '6');
INSERT INTO `category` VALUES ('6', '0', '0', '1', '平板电脑', 'pingban', '', 'a:7:{s:5:\"thumb\";s:0:\"\";s:3:\"des\";s:0:\"\";s:8:\"template\";N;s:7:\"content\";N;s:10:\"meta_title\";s:0:\"\";s:13:\"meta_keywords\";s:0:\"\";s:16:\"meta_description\";s:0:\"\";}', '4');
INSERT INTO `category` VALUES ('7', '0', '0', '-1', '新手指南', 'newbie', '', 'a:7:{s:5:\"thumb\";s:0:\"\";s:3:\"des\";s:0:\"\";s:8:\"template\";s:22:\"single_web.newbie.html\";s:7:\"content\";s:0:\"\";s:10:\"meta_title\";s:0:\"\";s:13:\"meta_keywords\";s:0:\"\";s:16:\"meta_description\";s:0:\"\";}', '1');
INSERT INTO `category` VALUES ('8', '0', '0', '-1', '合作专区', 'business', '', 'a:7:{s:5:\"thumb\";s:0:\"\";s:3:\"des\";s:0:\"\";s:8:\"template\";s:24:\"single_web.business.html\";s:7:\"content\";s:34:\"<p>输入栏目内容...567678</p>\";s:10:\"meta_title\";s:0:\"\";s:13:\"meta_keywords\";s:0:\"\";s:16:\"meta_description\";s:0:\"\";}', '1');
INSERT INTO `category` VALUES ('9', '0', '0', '-1', '公益基金', 'fund', '', 'a:7:{s:5:\"thumb\";s:0:\"\";s:3:\"des\";s:0:\"\";s:8:\"template\";s:20:\"single_web.fund.html\";s:7:\"content\";s:28:\"<p>输入栏目内容...</p>\";s:10:\"meta_title\";s:0:\"\";s:13:\"meta_keywords\";s:0:\"\";s:16:\"meta_description\";s:0:\"\";}', '1');
INSERT INTO `category` VALUES ('10', '0', '0', '-1', '云购QQ群', 'qqgroup', '', 'a:7:{s:5:\"thumb\";s:0:\"\";s:3:\"des\";s:0:\"\";s:8:\"template\";s:23:\"single_web.qqgroup.html\";s:7:\"content\";s:40:\"PHA+6L6T5YWl5qCP55uu5YaF5a65Li4uPC9wPg==\";s:10:\"meta_title\";s:0:\"\";s:13:\"meta_keywords\";s:0:\"\";s:16:\"meta_description\";s:0:\"\";}', '1');
INSERT INTO `category` VALUES ('11', '0', '0', '-1', '邀请注册', 'pleasereg', '', 'a:7:{s:5:\"thumb\";s:0:\"\";s:3:\"des\";s:0:\"\";s:8:\"template\";s:25:\"single_web.pleasereg.html\";s:7:\"content\";s:28:\"<p>输入栏目内容...</p>\";s:10:\"meta_title\";s:0:\"\";s:13:\"meta_keywords\";s:0:\"\";s:16:\"meta_description\";s:0:\"\";}', '1');
INSERT INTO `category` VALUES ('12', '0', '0', '1', '数码相机', 'shuma', '', 'a:7:{s:5:\"thumb\";s:0:\"\";s:3:\"des\";s:12:\"数码相机\";s:8:\"template\";s:0:\"\";s:7:\"content\";s:0:\"\";s:10:\"meta_title\";s:12:\"数码相机\";s:13:\"meta_keywords\";s:12:\"数码相机\";s:16:\"meta_description\";s:12:\"数码相机\";}', '3');
INSERT INTO `category` VALUES ('13', '0', '0', '1', '电脑', 'diannao', '', 'a:7:{s:5:\"thumb\";s:0:\"\";s:3:\"des\";s:6:\"电脑\";s:8:\"template\";s:0:\"\";s:7:\"content\";s:0:\"\";s:10:\"meta_title\";s:6:\"电脑\";s:13:\"meta_keywords\";s:6:\"电脑\";s:16:\"meta_description\";s:6:\"电脑\";}', '5');
INSERT INTO `category` VALUES ('14', '0', '0', '1', '钟表首饰', 'zhongbiao', '', 'a:7:{s:5:\"thumb\";s:0:\"\";s:3:\"des\";s:12:\"钟表首饰\";s:8:\"template\";s:0:\"\";s:7:\"content\";s:0:\"\";s:10:\"meta_title\";s:12:\"钟表首饰\";s:13:\"meta_keywords\";s:12:\"钟表首饰\";s:16:\"meta_description\";s:12:\"钟表首饰\";}', '2');
INSERT INTO `category` VALUES ('15', '0', '0', '1', '其他商品', 'qita', '', 'a:7:{s:5:\"thumb\";s:0:\"\";s:3:\"des\";s:12:\"其他商品\";s:8:\"template\";s:0:\"\";s:7:\"content\";s:0:\"\";s:10:\"meta_title\";s:12:\"其他商品\";s:13:\"meta_keywords\";s:12:\"其他商品\";s:16:\"meta_description\";s:12:\"其他商品\";}', '1');
INSERT INTO `category` VALUES ('16', '1', '0', '2', '云购基金', 'fund', '', 'a:7:{s:5:\"thumb\";s:0:\"\";s:3:\"des\";s:0:\"\";s:8:\"template\";s:0:\"\";s:7:\"content\";s:0:\"\";s:10:\"meta_title\";s:0:\"\";s:13:\"meta_keywords\";s:0:\"\";s:16:\"meta_description\";s:0:\"\";}', '1');

DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `value` mediumtext,
  `zhushi` text,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

INSERT INTO `config` VALUES ('1', 'web_name', '云购CMS — 惊喜无线', '网站名');
INSERT INTO `config` VALUES ('2', 'web_key', '是一个云购系统', '网站关键字');
INSERT INTO `config` VALUES ('3', 'web_des', '是一个云购系统', '网站介绍');
INSERT INTO `config` VALUES ('4', 'web_path', 'http://www.yungoucms.cn/', '网站地址');
INSERT INTO `config` VALUES ('5', 'templates_edit', '1', '是否允许在线编辑模板');
INSERT INTO `config` VALUES ('6', 'templates_name', 'yungou', '当前模板方案');
INSERT INTO `config` VALUES ('7', 'charset', 'utf-8', '网站字符集');
INSERT INTO `config` VALUES ('8', 'timezone', 'Asia/Shanghai', '网站时区');
INSERT INTO `config` VALUES ('9', 'error', '1', '1、保存错误日志到 cache/error_log.php | 0、在页面直接显示');
INSERT INTO `config` VALUES ('10', 'gzip', '0', '是否Gzip压缩后输出,服务器没有gzip请不要启用');
INSERT INTO `config` VALUES ('11', 'lang', 'zh-cn', '网站语言包');
INSERT INTO `config` VALUES ('12', 'cache', '3600', '默认缓存时间');
INSERT INTO `config` VALUES ('13', 'web_off', '1', '网站是否开启');
INSERT INTO `config` VALUES ('14', 'web_off_text', '网站关闭。升级中....', '关闭原因');
INSERT INTO `config` VALUES ('15', 'tablepre', 'QCNf', null);
INSERT INTO `config` VALUES ('16', 'index_name', '?', '隐藏首页文件名');
INSERT INTO `config` VALUES ('17', 'expstr', '/', 'url分隔符号');
INSERT INTO `config` VALUES ('18', 'admindir', 'admin', '后台管理文件夹');
INSERT INTO `config` VALUES ('19', 'qq', '123456', 'qq');
INSERT INTO `config` VALUES ('20', 'cell', '023-68555555', '联系电话');
INSERT INTO `config` VALUES ('21', 'web_logo', 'banner/logo.png', 'logo');
INSERT INTO `config` VALUES ('22', 'web_copyright', 'Copyright © 2011 - 2013, 版权所有 粤ICP备09213115号-1', '版权');
INSERT INTO `config` VALUES ('23', 'web_name_two', '1元云购', '短网站名');
INSERT INTO `config` VALUES ('24', 'qq_qun', '123456|456789', 'QQ群');
INSERT INTO `config` VALUES ('25', 'goods_end_time', '180', '开奖动画秒数(单位秒)');

DROP TABLE IF EXISTS `egglotter_award`;
CREATE TABLE `egglotter_award` (
  `award_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `user_id` int(11) DEFAULT NULL COMMENT '用户ID',
  `user_name` varchar(11) DEFAULT NULL COMMENT '用户名字',
  `rule_id` int(11) DEFAULT NULL COMMENT '活动ID',
  `subtime` int(11) DEFAULT NULL COMMENT '中奖时间',
  `spoil_id` int(11) DEFAULT NULL COMMENT '奖品等级',
  PRIMARY KEY (`award_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `egglotter_rule`;
CREATE TABLE `egglotter_rule` (
  `rule_id` int(11) NOT NULL AUTO_INCREMENT,
  `rule_name` varchar(200) DEFAULT NULL,
  `starttime` int(11) DEFAULT NULL COMMENT '活动开始时间',
  `endtime` int(11) DEFAULT NULL COMMENT '活动结束时间',
  `subtime` int(11) DEFAULT NULL COMMENT '活动编辑时间',
  `lotterytype` int(11) DEFAULT NULL COMMENT '抽奖按币分类',
  `lotterjb` int(11) DEFAULT NULL COMMENT '每一次抽奖使用的金币',
  `ruledesc` text COMMENT '规则介绍',
  `startusing` tinyint(4) DEFAULT NULL COMMENT '启用',
  PRIMARY KEY (`rule_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `egglotter_spoil`;
CREATE TABLE `egglotter_spoil` (
  `spoil_id` int(11) NOT NULL AUTO_INCREMENT,
  `rule_id` int(11) DEFAULT NULL,
  `spoil_name` text COMMENT '名称',
  `spoil_jl` int(11) DEFAULT NULL COMMENT '机率',
  `spoil_dj` int(11) DEFAULT NULL,
  `urlimg` varchar(200) DEFAULT NULL,
  `subtime` int(11) DEFAULT NULL COMMENT '提交时间',
  PRIMARY KEY (`spoil_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `fund`;
CREATE TABLE `fund` (
  `id` int(10) unsigned NOT NULL,
  `fund_off` tinyint(4) unsigned NOT NULL DEFAULT '1',
  `fund_money` decimal(10,2) unsigned NOT NULL,
  `fund_count_money` decimal(12,2) DEFAULT NULL COMMENT '云购基金',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `fund` VALUES ('1', '0', '0.00', '0.00');


DROP TABLE IF EXISTS `link`;
CREATE TABLE `link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '友情链接ID',
  `type` tinyint(1) unsigned NOT NULL COMMENT '链接类型',
  `name` char(20) NOT NULL COMMENT '名称',
  `logo` varchar(250) NOT NULL COMMENT '图片',
  `url` varchar(50) NOT NULL COMMENT '地址',
  PRIMARY KEY (`id`),
  KEY `type` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
INSERT INTO `link` VALUES ('1', '1', '韬龙网络', '', 'http://www.dandangou.com');


DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(20) NOT NULL COMMENT '用户名',
  `email` varchar(50) DEFAULT NULL COMMENT '用户邮箱',
  `mobile` char(11) DEFAULT NULL COMMENT '用户手机',
  `password` char(32) DEFAULT NULL COMMENT '密码',
  `user_ip` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL COMMENT '用户头像',
  `qianming` varchar(255) DEFAULT NULL COMMENT '用户签名',
  `groupid` tinyint(4) unsigned DEFAULT '0' COMMENT '用户权限组',
  `addgroup` varchar(255) DEFAULT NULL COMMENT '用户加入的圈子组1|2|3',
  `money` decimal(10,2) unsigned DEFAULT '0.00' COMMENT '账户金额',
  `emailcode` char(21) DEFAULT '-1' COMMENT '邮箱认证码',
  `mobilecode` char(21) DEFAULT '-1' COMMENT '手机认证码',
  `passcode` char(21) DEFAULT '-1' COMMENT '找会密码认证码-1,1,码',
  `reg_key` varchar(100) DEFAULT NULL COMMENT '注册参数',
  `score` int(10) unsigned NOT NULL DEFAULT '0',
  `jingyan` int(10) unsigned DEFAULT '0',
  `yaoqing` int(10) unsigned DEFAULT NULL,
  `band` varchar(255) DEFAULT NULL,
  `time` int(10) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=13551 DEFAULT CHARSET=utf8 COMMENT='会员表';


DROP TABLE IF EXISTS `member_account`;
CREATE TABLE `member_account` (
  `uid` int(10) unsigned NOT NULL COMMENT '用户id',
  `type` tinyint(1) DEFAULT NULL COMMENT '充值1/消费-1',
  `pay` char(20) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL COMMENT '详情',
  `money` mediumint(8) NOT NULL DEFAULT '0' COMMENT '金额',
  `time` char(20) NOT NULL,
  KEY `uid` (`uid`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会员账户明细';


DROP TABLE IF EXISTS `member_addmoney_record`;
CREATE TABLE `member_addmoney_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `code` char(20) NOT NULL,
  `money` decimal(10,2) unsigned NOT NULL,
  `pay_type` char(10) NOT NULL,
  `status` char(20) NOT NULL,
  `time` int(10) NOT NULL,
  `score` int(10) unsigned DEFAULT NULL,
  `scookies` text COMMENT '购物车cookie',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `member_band`;
CREATE TABLE `member_band` (
  `b_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `b_uid` int(10) DEFAULT NULL COMMENT '用户ID',
  `b_type` char(10) DEFAULT NULL COMMENT '绑定登陆类型',
  `b_code` varchar(100) DEFAULT NULL COMMENT '返回数据1',
  `b_data` varchar(100) DEFAULT NULL COMMENT '返回数据2',
  `b_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`b_id`),
  KEY `b_uid` (`b_uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `member_cashout`;
CREATE TABLE `member_cashout` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL COMMENT '用户id',
  `username` varchar(20) NOT NULL COMMENT '开户人',
  `bankname` varchar(255) NOT NULL COMMENT '银行名称',
  `branch` varchar(255) NOT NULL COMMENT '支行',
  `money` decimal(8,0) NOT NULL DEFAULT '0' COMMENT '申请提现金额',
  `time` char(20) NOT NULL COMMENT '申请时间',
  `banknumber` varchar(50) NOT NULL COMMENT '银行帐号',
  `linkphone` varchar(100) NOT NULL COMMENT '联系电话',
  `auditstatus` tinyint(4) NOT NULL COMMENT '1审核通过',
  `procefees` decimal(8,2) NOT NULL COMMENT '手续费',
  `reviewtime` char(20) NOT NULL COMMENT '审核通过时间',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `type` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会员账户明细';


DROP TABLE IF EXISTS `member_del`;
CREATE TABLE `member_del` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(20) NOT NULL COMMENT '用户名',
  `email` varchar(50) DEFAULT NULL COMMENT '用户邮箱',
  `mobile` char(11) DEFAULT NULL COMMENT '用户手机',
  `password` char(32) DEFAULT NULL COMMENT '密码',
  `user_ip` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL COMMENT '用户头像',
  `qianming` varchar(255) DEFAULT NULL COMMENT '用户签名',
  `groupid` tinyint(4) unsigned DEFAULT '0' COMMENT '用户权限组',
  `addgroup` varchar(255) DEFAULT NULL COMMENT '用户加入的圈子组1|2|3',
  `money` decimal(10,2) unsigned DEFAULT '0.00' COMMENT '账户金额',
  `emailcode` char(21) DEFAULT '-1' COMMENT '邮箱认证码',
  `mobilecode` char(21) DEFAULT '-1' COMMENT '手机认证码',
  `passcode` char(21) DEFAULT '-1' COMMENT '找会密码认证码-1,1,码',
  `reg_key` varchar(100) DEFAULT NULL COMMENT '注册参数',
  `score` int(10) unsigned NOT NULL DEFAULT '0',
  `jingyan` int(10) unsigned DEFAULT '0',
  `yaoqing` int(10) unsigned DEFAULT NULL,
  `band` varchar(255) DEFAULT NULL,
  `time` int(10) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会员表';


DROP TABLE IF EXISTS `member_dizhi`;
CREATE TABLE `member_dizhi` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `uid` int(10) NOT NULL COMMENT '用户id',
  `sheng` varchar(15) DEFAULT NULL COMMENT '省',
  `shi` varchar(15) DEFAULT NULL COMMENT '市',
  `xian` varchar(15) DEFAULT NULL COMMENT '县',
  `jiedao` varchar(255) DEFAULT NULL COMMENT '街道地址',
  `youbian` mediumint(8) DEFAULT NULL COMMENT '邮编',
  `shouhuoren` varchar(15) DEFAULT NULL COMMENT '收货人',
  `mobile` char(11) DEFAULT NULL COMMENT '手机',
  `tell` varchar(15) DEFAULT NULL COMMENT '座机号',
  `default` char(1) DEFAULT 'N' COMMENT '是否默认',
  `time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会员地址表';


DROP TABLE IF EXISTS `member_go_record`;
CREATE TABLE `member_go_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` char(20) DEFAULT NULL COMMENT '订单号',
  `code_tmp` tinyint(3) unsigned DEFAULT NULL COMMENT '相同订单',
  `username` varchar(30) NOT NULL,
  `uphoto` varchar(255) DEFAULT NULL,
  `uid` int(10) unsigned NOT NULL COMMENT '会员id',
  `shopid` int(6) unsigned NOT NULL COMMENT '商品id',
  `shopname` varchar(255) NOT NULL COMMENT '商品名',
  `shopqishu` smallint(6) NOT NULL DEFAULT '0' COMMENT '期数',
  `gonumber` smallint(5) unsigned DEFAULT NULL COMMENT '购买次数',
  `goucode` longtext NOT NULL COMMENT '云购码',
  `moneycount` decimal(10,2) NOT NULL,
  `huode` char(50) NOT NULL DEFAULT '0' COMMENT '中奖码',
  `pay_type` char(10) DEFAULT NULL COMMENT '付款方式',
  `ip` varchar(255) DEFAULT NULL,
  `status` char(30) DEFAULT NULL COMMENT '订单状态',
  `time` char(21) NOT NULL COMMENT '购买时间',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `shopid` (`shopid`),
  KEY `time` (`time`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='云购记录表';


DROP TABLE IF EXISTS `member_group`;
CREATE TABLE `member_group` (
  `groupid` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(15) NOT NULL COMMENT '会员组名',
  `jingyan_start` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '需要的经验值',
  `jingyan_end` int(10) NOT NULL,
  `icon` varchar(255) DEFAULT NULL COMMENT '图标',
  `type` char(1) NOT NULL DEFAULT 'N' COMMENT '是否是系统组',
  PRIMARY KEY (`groupid`),
  KEY `jingyan` (`jingyan_start`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='会员权限组';


INSERT INTO `member_group` VALUES ('1', '云购新手', '0', '500', null, 'N');
INSERT INTO `member_group` VALUES ('2', '云购小将', '501', '1000', null, 'N');
INSERT INTO `member_group` VALUES ('3', '云购中将', '1001', '3000', null, 'N');
INSERT INTO `member_group` VALUES ('4', '云购上将', '3001', '6000', null, 'N');
INSERT INTO `member_group` VALUES ('5', '云购大将', '6001', '20000', null, 'N');
INSERT INTO `member_group` VALUES ('6', '云购将军', '20001', '40000', null, 'N');


DROP TABLE IF EXISTS `member_message`;
CREATE TABLE `member_message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL COMMENT '用户id',
  `type` tinyint(1) DEFAULT '0' COMMENT '消息来源,0系统,1私信',
  `sendid` int(10) unsigned DEFAULT '0' COMMENT '发送人ID',
  `sendname` char(20) DEFAULT NULL COMMENT '发送人名',
  `content` varchar(255) DEFAULT NULL COMMENT '发送内容',
  `time` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会员消息表';


DROP TABLE IF EXISTS `member_recodes`;
CREATE TABLE `member_recodes` (
  `uid` int(10) unsigned NOT NULL COMMENT '用户id',
  `type` tinyint(1) NOT NULL COMMENT '收取1//充值-2/提现-3',
  `content` varchar(255) NOT NULL COMMENT '详情',
  `shopid` int(11) DEFAULT NULL COMMENT '商品id',
  `money` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT '佣金',
  `time` char(20) NOT NULL,
  `ygmoney` decimal(8,2) NOT NULL COMMENT '云购金额',
  `cashoutid` int(11) DEFAULT NULL COMMENT '申请提现记录表id',
  KEY `uid` (`uid`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会员账户明细';


DROP TABLE IF EXISTS `model`;
CREATE TABLE `model` (
  `modelid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(10) NOT NULL,
  `table` char(20) NOT NULL,
  PRIMARY KEY (`modelid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='模型表';


INSERT INTO `model` VALUES ('1', '云购模型', 'shoplist');
INSERT INTO `model` VALUES ('2', '文章模型', 'article');


DROP TABLE IF EXISTS `navigation`;
CREATE TABLE `navigation` (
  `cid` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` smallint(6) unsigned DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` char(10) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `status` char(1) DEFAULT 'Y' COMMENT '显示/隐藏',
  `order` smallint(6) unsigned DEFAULT '1',
  PRIMARY KEY (`cid`),
  KEY `status` (`status`),
  KEY `order` (`order`),
  KEY `type` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;



INSERT INTO `navigation` VALUES ('1', '0', '所有商品', 'index', '/goods_list', 'Y', '2');
INSERT INTO `navigation` VALUES ('2', '0', '新手指南', 'index', '/single/newbie', 'Y', '2');
INSERT INTO `navigation` VALUES ('3', '0', '云购圈', 'foot', '/group', 'Y', '2');
INSERT INTO `navigation` VALUES ('4', '0', '关于云购', 'foot', '/help/1', 'Y', '1');
INSERT INTO `navigation` VALUES ('5', '0', '隐私声明', 'foot', '/help/12', 'Y', '1');
INSERT INTO `navigation` VALUES ('6', '0', '合作专区', 'foot', '/single/business', 'Y', '1');
INSERT INTO `navigation` VALUES ('7', '0', '友情链接', 'foot', '/link', 'Y', '1');
INSERT INTO `navigation` VALUES ('8', '0', '联系我们', 'foot', '/help/13', 'Y', '1');
INSERT INTO `navigation` VALUES ('10', '0', '晒单分享', 'index', '/go/shaidan/', 'Y', '1');
INSERT INTO `navigation` VALUES ('12', '0', '最新揭晓', 'index', '/goods_lottery', 'N', '1');
INSERT INTO `navigation` VALUES ('13', '0', '邀请', 'index', '/single/pleasereg', 'Y', '1');
INSERT INTO `navigation` VALUES ('14', '0', '限时揭晓', 'index', '/go/autolottery', 'Y', '1');
INSERT INTO `navigation` VALUES ('15', '0', '抽奖游戏', 'foot', '/api/plugin/get/egglotter', 'Y', '1');
INSERT INTO `navigation` VALUES ('16', '0', '最新揭晓', 'index', '/goods_lottery', 'Y', '1');


DROP TABLE IF EXISTS `pay`;
CREATE TABLE `pay` (
  `pay_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pay_name` char(20) NOT NULL,
  `pay_class` char(20) NOT NULL,
  `pay_type` tinyint(3) NOT NULL,
  `pay_thumb` varchar(255) DEFAULT NULL,
  `pay_des` text,
  `pay_start` tinyint(4) NOT NULL,
  `pay_key` text,
  PRIMARY KEY (`pay_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;


INSERT INTO `pay` VALUES ('1', '财付通', 'tenpay', '1', 'photo/cft.gif', '腾讯财付通	', '0', 'a:2:{s:2:\"id\";a:2:{s:4:\"name\";s:19:\"财付通商户号:\";s:3:\"val\";s:0:\"\";}s:3:\"key\";a:2:{s:4:\"name\";s:16:\"财付通密钥:\";s:3:\"val\";s:0:\"\";}}');
INSERT INTO `pay` VALUES ('2', '支付宝', 'alipay', '1', 'photo/20130929/82028078450752.jpg', '支付宝支付', '0', 'a:3:{s:2:\"id\";a:2:{s:4:\"name\";s:19:\"支付宝商户号:\";s:3:\"val\";s:0:\"\";}s:3:\"key\";a:2:{s:4:\"name\";s:16:\"支付宝密钥:\";s:3:\"val\";s:0:\"\";}s:4:\"user\";a:2:{s:4:\"name\";s:16:\"支付宝账号:\";s:3:\"val\";s:0:\"\";}}');
INSERT INTO `pay` VALUES ('3', '易宝支付', 'yeepay', '1', 'photo/20130929/93656812450898.jpg', '易宝支付', '0', 'a:2:{s:2:\"id\";a:2:{s:4:\"name\";s:16:\"易宝商户号:\";s:3:\"val\";s:0:\"\";}s:3:\"key\";a:2:{s:4:\"name\";s:13:\"易宝密钥:\";s:3:\"val\";s:0:\"\";}}');

DROP TABLE IF EXISTS `position`;
CREATE TABLE `position` (
  `pos_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pos_model` tinyint(3) unsigned NOT NULL,
  `pos_name` varchar(30) NOT NULL,
  `pos_num` tinyint(3) unsigned NOT NULL,
  `pos_maxnum` tinyint(3) unsigned NOT NULL,
  `pos_this_num` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `pos_time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`pos_id`),
  KEY `pos_id` (`pos_id`),
  KEY `pos_model` (`pos_model`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `position_data`;
CREATE TABLE `position_data` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `con_id` int(10) unsigned NOT NULL,
  `mod_id` tinyint(3) unsigned NOT NULL,
  `mod_name` char(20) NOT NULL,
  `pos_id` int(10) unsigned NOT NULL,
  `pos_data` mediumtext NOT NULL,
  `pos_order` int(10) unsigned NOT NULL DEFAULT '1',
  `pos_time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `quanzi`;
CREATE TABLE `quanzi` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `title` char(15) NOT NULL COMMENT '标题',
  `img` varchar(255) DEFAULT NULL COMMENT '图片地址',
  `chengyuan` mediumint(8) unsigned DEFAULT '0' COMMENT '成员数',
  `tiezi` mediumint(8) unsigned DEFAULT '0' COMMENT '帖子数',
  `guanli` mediumint(8) unsigned NOT NULL COMMENT '管理员',
  `jinhua` smallint(5) unsigned DEFAULT NULL COMMENT '精华帖',
  `jianjie` varchar(255) DEFAULT '暂无介绍' COMMENT '简介',
  `gongao` varchar(255) DEFAULT '暂无' COMMENT '公告',
  `jiaru` char(1) DEFAULT 'Y' COMMENT '申请加入',
  `glfatie` char(1) DEFAULT 'N' COMMENT '发帖权限',
  `time` int(11) NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `quanzi_hueifu`;
CREATE TABLE `quanzi_hueifu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `tzid` int(11) DEFAULT NULL COMMENT '帖子ID匹配',
  `hueifu` text COMMENT '回复内容',
  `hueiyuan` varchar(255) DEFAULT NULL COMMENT '会员',
  `hftime` int(11) DEFAULT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `quanzi_tiezi`;
CREATE TABLE `quanzi_tiezi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `qzid` int(10) unsigned DEFAULT NULL COMMENT '圈子ID匹配',
  `hueiyuan` varchar(255) DEFAULT NULL COMMENT '会员信息',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `neirong` text COMMENT '内容',
  `hueifu` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '回复',
  `dianji` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点击量',
  `zhiding` char(1) DEFAULT 'N' COMMENT '置顶',
  `jinghua` char(1) DEFAULT 'N' COMMENT '精华',
  `zuihou` varchar(255) DEFAULT NULL COMMENT '最后回复',
  `time` int(10) unsigned DEFAULT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `recom`;
CREATE TABLE `recom` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '推荐位id',
  `img` varchar(50) DEFAULT NULL COMMENT '推荐位图片',
  `title` varchar(30) DEFAULT NULL COMMENT '推荐位标题',
  `link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `shaidan`;
CREATE TABLE `shaidan` (
  `sd_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '晒单id',
  `sd_userid` int(10) unsigned DEFAULT NULL COMMENT '用户ID',
  `sd_shopid` int(10) unsigned DEFAULT NULL COMMENT '商品ID',
  `sd_qishu` int(10) DEFAULT NULL COMMENT '商品期数',
  `sd_ip` varchar(255) DEFAULT NULL,
  `sd_title` varchar(255) DEFAULT NULL COMMENT '晒单标题',
  `sd_thumbs` varchar(255) DEFAULT NULL COMMENT '缩略图',
  `sd_content` text COMMENT '晒单内容',
  `sd_photolist` text COMMENT '晒单图片',
  `sd_zhan` int(10) unsigned DEFAULT '0' COMMENT '点赞',
  `sd_ping` int(10) unsigned DEFAULT '0' COMMENT '评论',
  `sd_time` int(10) unsigned DEFAULT NULL COMMENT '晒单时间',
  PRIMARY KEY (`sd_id`),
  KEY `sd_userid` (`sd_userid`),
  KEY `sd_shopid` (`sd_shopid`),
  KEY `sd_zhan` (`sd_zhan`),
  KEY `sd_ping` (`sd_ping`),
  KEY `sd_time` (`sd_time`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='晒单';



DROP TABLE IF EXISTS `shaidan_hueifu`;
CREATE TABLE `shaidan_hueifu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sdhf_id` int(11) NOT NULL COMMENT '晒单ID',
  `sdhf_userid` int(11) DEFAULT NULL COMMENT '晒单回复会员ID',
  `sdhf_content` text COMMENT '晒单回复内容',
  `sdhf_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `shopcodes_1`;
CREATE TABLE `shopcodes_1` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `s_id` int(10) unsigned NOT NULL,
  `s_cid` smallint(5) unsigned NOT NULL,
  `s_len` smallint(5) DEFAULT NULL,
  `s_codes` text,
  `s_codes_tmp` text,
  PRIMARY KEY (`id`),
  KEY `s_id` (`s_id`),
  KEY `s_cid` (`s_cid`),
  KEY `s_len` (`s_len`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `shoplist`;
CREATE TABLE `shoplist` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品id',
  `sid` int(10) unsigned NOT NULL COMMENT '同一个商品',
  `cateid` smallint(6) unsigned DEFAULT NULL COMMENT '所属栏目ID',
  `brandid` smallint(6) unsigned DEFAULT NULL COMMENT '所属品牌ID',
  `title` varchar(100) DEFAULT NULL COMMENT '商品标题',
  `title_style` varchar(100) DEFAULT NULL,
  `title2` varchar(100) DEFAULT NULL COMMENT '副标题',
  `keywords` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `money` decimal(10,2) DEFAULT '0.00' COMMENT '金额',
  `yunjiage` decimal(4,2) unsigned DEFAULT '1.00' COMMENT '云购人次价格',
  `zongrenshu` int(10) unsigned DEFAULT '0' COMMENT '总需人数',
  `canyurenshu` int(10) unsigned DEFAULT '0' COMMENT '已参与人数',
  `shenyurenshu` int(10) unsigned DEFAULT NULL,
  `def_renshu` int(10) unsigned DEFAULT '0',
  `qishu` smallint(6) unsigned DEFAULT '0' COMMENT '期数',
  `maxqishu` smallint(5) unsigned DEFAULT '1' COMMENT ' 最大期数',
  `thumb` varchar(255) DEFAULT NULL,
  `picarr` text COMMENT '商品图片',
  `content` mediumtext COMMENT '商品内容详情',
  `codes_table` char(20) DEFAULT NULL,
  `xsjx_time` int(10) unsigned DEFAULT NULL,
  `pos` tinyint(4) unsigned DEFAULT NULL COMMENT '是否推荐',
  `renqi` tinyint(4) unsigned DEFAULT '0' COMMENT '是否人气商品0否1是',
  `time` int(10) unsigned DEFAULT NULL COMMENT '时间',
  `order` int(10) unsigned DEFAULT '1',
  `q_uid` int(10) unsigned DEFAULT NULL COMMENT '中奖人ID',
  `q_user` text COMMENT '中奖人信息',
  `q_user_code` char(20) DEFAULT NULL COMMENT '中奖码',
  `q_content` mediumtext COMMENT '揭晓内容',
  `q_counttime` char(20) DEFAULT NULL COMMENT '总时间相加',
  `q_end_time` char(20) DEFAULT NULL COMMENT '揭晓时间',
  `q_showtime` char(1) DEFAULT 'N' COMMENT 'Y/N揭晓动画',
  PRIMARY KEY (`id`),
  KEY `renqi` (`renqi`),
  KEY `order` (`yunjiage`),
  KEY `q_uid` (`q_uid`),
  KEY `sid` (`sid`),
  KEY `shenyurenshu` (`shenyurenshu`),
  KEY `q_showtime` (`q_showtime`)
) ENGINE=InnoDB AUTO_INCREMENT=16896 DEFAULT CHARSET=utf8 COMMENT='商品表';



DROP TABLE IF EXISTS `shoplist_del`;
CREATE TABLE `shoplist_del` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sid` int(10) NOT NULL COMMENT '同一个商品',
  `cateid` smallint(6) unsigned DEFAULT NULL,
  `brandid` smallint(6) unsigned DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `title_style` varchar(100) DEFAULT NULL,
  `title2` varchar(100) DEFAULT NULL,
  `keywords` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `money` decimal(10,2) DEFAULT '0.00',
  `yunjiage` decimal(4,2) unsigned DEFAULT '1.00',
  `zongrenshu` int(10) unsigned DEFAULT '0',
  `canyurenshu` int(10) unsigned DEFAULT '0',
  `shenyurenshu` int(10) unsigned DEFAULT NULL,
  `def_renshu` int(10) unsigned DEFAULT '0',
  `qishu` smallint(6) unsigned DEFAULT '0',
  `maxqishu` smallint(5) unsigned DEFAULT '1',
  `thumb` varchar(255) DEFAULT NULL,
  `picarr` text,
  `content` mediumtext,
  `codes_table` char(20) DEFAULT NULL,
  `xsjx_time` int(10) unsigned DEFAULT NULL,
  `pos` tinyint(4) unsigned DEFAULT NULL,
  `renqi` tinyint(4) unsigned DEFAULT '0',
  `time` int(10) unsigned DEFAULT NULL,
  `order` int(10) unsigned DEFAULT '1',
  `q_uid` int(10) unsigned DEFAULT NULL,
  `q_user` text COMMENT '中奖人信息',
  `q_user_code` char(20) DEFAULT NULL,
  `q_content` mediumtext,
  `q_counttime` char(20) DEFAULT NULL,
  `q_end_time` char(20) DEFAULT NULL,
  `q_showtime` char(1) DEFAULT 'N' COMMENT 'Y/N揭晓动画',
  PRIMARY KEY (`id`),
  KEY `renqi` (`renqi`),
  KEY `order` (`yunjiage`),
  KEY `q_uid` (`q_uid`),
  KEY `sid` (`sid`),
  KEY `shenyurenshu` (`shenyurenshu`),
  KEY `q_showtime` (`q_showtime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `slide`;
CREATE TABLE `slide` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img` varchar(50) DEFAULT NULL COMMENT '幻灯片',
  `title` varchar(30) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `img` (`img`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='幻灯片表';



INSERT INTO `slide` VALUES ('8', 'banner/20130613112718336.jpg', 'sd56', '');
INSERT INTO `slide` VALUES ('9', 'banner/20130401112535761.jpg', 'sdf', '');
INSERT INTO `slide` VALUES ('10', 'banner/20130510152637850.jpg', 'ert', '');
INSERT INTO `slide` VALUES ('11', 'banner/20130510163624847.jpg', 'ert', '');


DROP TABLE IF EXISTS `template`;
CREATE TABLE `template` (
  `template_name` char(25) NOT NULL,
  `template` char(25) NOT NULL,
  `des` varchar(100) DEFAULT NULL,
  KEY `template` (`template`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `template` VALUES ('cart.cartlist.html', 'yungou', '购物车列表');
INSERT INTO `template` VALUES ('cart.pay.html', 'yungou', '购物车付款');
INSERT INTO `template` VALUES ('cart.paysuccess.html', 'yungou', '购物车支付成功页面');
INSERT INTO `template` VALUES ('group.index.html', 'yungou', '圈子首页');
INSERT INTO `template` VALUES ('group.list.html', 'yungou', '圈子列表页');
INSERT INTO `template` VALUES ('group.nei.html', 'yungou', '圈子内容');
INSERT INTO `template` VALUES ('group.right.html', 'yungou', '圈子右边');
INSERT INTO `template` VALUES ('help.help.html', 'yungou', '帮助页面');
INSERT INTO `template` VALUES ('index.autolottery.html', 'yungou', '限时揭晓');
INSERT INTO `template` VALUES ('index.buyrecord.html', 'yungou', '云购记录');
INSERT INTO `template` VALUES ('index.buyrecordbai.html', 'yungou', '最新云购记录');
INSERT INTO `template` VALUES ('index.dataserver.html', 'yungou', '已揭晓商品');
INSERT INTO `template` VALUES ('index.detail.html', 'yungou', '晒单详情');
INSERT INTO `template` VALUES ('index.footer.html', 'yungou', '底部');
INSERT INTO `template` VALUES ('index.glist.html', 'yungou', '所有商品');
INSERT INTO `template` VALUES ('index.header.html', 'yungou', '头部');
INSERT INTO `template` VALUES ('index.index.html', 'yungou', '首页');
INSERT INTO `template` VALUES ('index.item.html', 'yungou', '商品展示页');
INSERT INTO `template` VALUES ('index.lottery.html', 'yungou', '最新揭晓');
INSERT INTO `template` VALUES ('index.shaidan.html', 'yungou', '晒单页面');
INSERT INTO `template` VALUES ('link.link.html', 'yungou', '友情链接');
INSERT INTO `template` VALUES ('member.address.html', 'yungou', '会员地址添加');
INSERT INTO `template` VALUES ('member.cashout.html', 'yungou', '提现申请');
INSERT INTO `template` VALUES ('member.commissions.html', 'yungou', '佣金明细');
INSERT INTO `template` VALUES ('member.index.html', 'yungou', '会员首页');
INSERT INTO `template` VALUES ('member.invitefriends.html', 'yungou', '邀请好友');
INSERT INTO `template` VALUES ('member.joingroup.html', 'yungou', '加入的圈子');
INSERT INTO `template` VALUES ('member.left.html', 'yungou', '会员中心左边页面');
INSERT INTO `template` VALUES ('member.mailchecking.html', 'yungou', '邮箱认证');
INSERT INTO `template` VALUES ('member.mobilechecking.htm', 'yungou', '手机认证');
INSERT INTO `template` VALUES ('member.mobilesuccess.html', 'yungou', '手机认证成功');
INSERT INTO `template` VALUES ('member.modify.html', 'yungou', '会员');
INSERT INTO `template` VALUES ('member.orderlist.html', 'yungou', '会员资料');
INSERT INTO `template` VALUES ('member.password.html', 'yungou', '会员修改密码');
INSERT INTO `template` VALUES ('member.photo.html', 'yungou', '会员修改头像');
INSERT INTO `template` VALUES ('member.qqclock.html', 'yungou', '会员QQ绑定');
INSERT INTO `template` VALUES ('member.record.html', 'yungou', '提现记录');
INSERT INTO `template` VALUES ('member.sendsuccess.html', 'yungou', '邮箱验证发送');
INSERT INTO `template` VALUES ('member.sendsuccess2.html', 'yungou', '邮箱验证发送2');
INSERT INTO `template` VALUES ('member.shezhi.html', 'yungou', '资料选项卡');
INSERT INTO `template` VALUES ('member.singleinsert.html', 'yungou', '会员添加晒单');
INSERT INTO `template` VALUES ('member.singlelist.html', 'yungou', '会员晒单');
INSERT INTO `template` VALUES ('member.singleupdate.html', 'yungou', '晒单修改');
INSERT INTO `template` VALUES ('member.topic.html', 'yungou', '圈子话题');
INSERT INTO `template` VALUES ('member.userbalance.html', 'yungou', '账户明细');
INSERT INTO `template` VALUES ('member.userbuydetail.html', 'yungou', '云购记录');
INSERT INTO `template` VALUES ('member.userbuylist.html', 'yungou', '云购记录');
INSERT INTO `template` VALUES ('member.userfufen.html', 'yungou', '会员福分');
INSERT INTO `template` VALUES ('member.userrecharge.html', 'yungou', '账户充值');
INSERT INTO `template` VALUES ('search.search.html', 'yungou', '搜索');
INSERT INTO `template` VALUES ('single_web.business.html', 'yungou', '单页_合作专区');
INSERT INTO `template` VALUES ('single_web.fund.html', 'yungou', '单页_云购基金');
INSERT INTO `template` VALUES ('single_web.newbie.html', 'yungou', '单页_新手指南');
INSERT INTO `template` VALUES ('single_web.pleasereg.html', 'yungou', '单页_邀请');
INSERT INTO `template` VALUES ('single_web.qqgroup.html', 'yungou', '单页_QQ');
INSERT INTO `template` VALUES ('system.message.html', 'yungou', '系统消息提示');
INSERT INTO `template` VALUES ('us.index.html', 'yungou', '个人主页');
INSERT INTO `template` VALUES ('us.left.html', 'yungou', '个人主页左边');
INSERT INTO `template` VALUES ('us.tab.html', 'yungou', '个人主页选项');
INSERT INTO `template` VALUES ('us.userbuy.html', 'yungou', '个人主页云购记录');
INSERT INTO `template` VALUES ('us.userpost.html', 'yungou', '个人主页云购记录');
INSERT INTO `template` VALUES ('us.userraffle.html', 'yungou', '个人主页云购记录');
INSERT INTO `template` VALUES ('user.emailcheck.html', 'yungou', '邮箱验证');
INSERT INTO `template` VALUES ('user.emailok.html', 'yungou', '邮箱验证成功');
INSERT INTO `template` VALUES ('user.findemailcheck.html', 'yungou', '找回密码');
INSERT INTO `template` VALUES ('user.finderror.html', 'yungou', '邮箱验证已过期');
INSERT INTO `template` VALUES ('user.findmobilecheck.html', 'yungou', '手机验证');
INSERT INTO `template` VALUES ('user.findok.html', 'yungou', '手机验证成功');
INSERT INTO `template` VALUES ('user.findpassword.html', 'yungou', '重置密码');
INSERT INTO `template` VALUES ('user.login.html', 'yungou', '会员登录');
INSERT INTO `template` VALUES ('user.mobilecheck.html', 'yungou', '手机验证');
INSERT INTO `template` VALUES ('user.register.html', 'yungou', '会员注册');
INSERT INTO `template` VALUES ('vote.show.html', 'yungou', '投票内容页');
INSERT INTO `template` VALUES ('vote.show_total.html', 'yungou', '投票列表');
INSERT INTO `template` VALUES ('vote.vote.html', 'yungou', '投票主页');


DROP TABLE IF EXISTS `vote_activer`;
CREATE TABLE `vote_activer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option_id` int(11) NOT NULL,
  `vote_id` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `ip` char(20) DEFAULT NULL,
  `subtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `vote_option`;
CREATE TABLE `vote_option` (
  `option_id` int(11) NOT NULL AUTO_INCREMENT,
  `vote_id` int(11) DEFAULT NULL,
  `option_title` varchar(100) DEFAULT NULL,
  `option_number` int(11) unsigned DEFAULT '0',
  PRIMARY KEY (`option_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `vote_subject`;
CREATE TABLE `vote_subject` (
  `vote_id` int(11) NOT NULL AUTO_INCREMENT,
  `vote_title` varchar(100) DEFAULT NULL,
  `vote_starttime` int(11) DEFAULT NULL,
  `vote_endtime` int(11) DEFAULT NULL,
  `vote_sendtime` int(11) DEFAULT NULL,
  `vote_description` text,
  `vote_allowview` tinyint(1) DEFAULT NULL,
  `vote_allowguest` tinyint(1) DEFAULT NULL,
  `vote_interval` int(11) DEFAULT '0',
  `vote_enabled` tinyint(1) DEFAULT NULL,
  `vote_number` int(11) DEFAULT NULL,
  PRIMARY KEY (`vote_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
