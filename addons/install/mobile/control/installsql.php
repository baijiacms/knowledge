<?php
// +----------------------------------------------------------------------
// | 
// +----------------------------------------------------------------------
// | Copyright (c) 2015 http://www.baijiacms.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 百家cms <QQ:1987884799> <http://www.baijiacms.com>
// +----------------------------------------------------------------------
defined('SYSTEM_IN') or exit('Access Denied');
if(file_exists(WEB_ROOT.'/config/install.link'))
{
	exit('Access Denied');
}
defined('SYSTEM_INSTALL_IN') or exit('Access Denied');
$sql = "

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for baijiacms_category
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_category`;
CREATE TABLE `baijiacms_category` (
  `id` varchar(50) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_category
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_knowledge
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_knowledge`;
CREATE TABLE `baijiacms_knowledge` (
  `updatetime` int(11) DEFAULT NULL,
  `createtime` int(11) NOT NULL,
  `readcount` int(6) NOT NULL,
  `author` varchar(50) DEFAULT NULL,
  `category_name` varchar(50) NOT NULL,
  `knowledge_content` longtext NOT NULL,
  `knowledge_title` varchar(100) NOT NULL,
  `id` varchar(50) NOT NULL,
  `is_private` int(11) DEFAULT '0',
  `userid` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `knowledge_content` (`knowledge_content`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_knowledge
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_settings
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_settings`;
CREATE TABLE `baijiacms_settings` (
  `name` varchar(100) NOT NULL COMMENT '配置名称',
  `value` text NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_settings
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_user
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_user`;
CREATE TABLE `baijiacms_user` (
  `createtime` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `is_admin` int(1) NOT NULL DEFAULT '0' COMMENT '1管理员0普用户',
  `email` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `id` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of baijiacms_user
-- ----------------------------

";

mysqld_batch($sql);
