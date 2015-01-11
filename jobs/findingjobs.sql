-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost
-- 生成日期: 2015 年 01 月 02 日 11:53
-- 服务器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 数据库: `findingjobs`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `admin`
-- 

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY  (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `admin`
-- 

INSERT INTO `admin` VALUES ('admin', 'admin');

-- --------------------------------------------------------

-- 
-- 表的结构 `applyjob`
-- 

CREATE TABLE `applyjob` (
  `ajid` bigint(20) NOT NULL auto_increment,
  `cid` bigint(20) NOT NULL,
  `jobid` bigint(20) NOT NULL,
  PRIMARY KEY  (`ajid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- 导出表中的数据 `applyjob`
-- 

INSERT INTO `applyjob` VALUES (1, 2, 4);
INSERT INTO `applyjob` VALUES (2, 2, 2);
INSERT INTO `applyjob` VALUES (3, 2, 6);

-- --------------------------------------------------------

-- 
-- 表的结构 `candidates`
-- 

CREATE TABLE `candidates` (
  `cid` bigint(20) unsigned NOT NULL auto_increment,
  `cname` varchar(50) NOT NULL,
  `cpassword` varchar(20) NOT NULL,
  PRIMARY KEY  (`cid`),
  UNIQUE KEY `cname` (`cname`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- 导出表中的数据 `candidates`
-- 

INSERT INTO `candidates` VALUES (2, '1', '1');

-- --------------------------------------------------------

-- 
-- 表的结构 `jobs`
-- 

CREATE TABLE `jobs` (
  `jobid` bigint(20) NOT NULL auto_increment,
  `jobname` varchar(50) character set gb2312 NOT NULL,
  `jobabout` varchar(255) character set gb2312 NOT NULL,
  `jobskill` varchar(255) character set gb2312 NOT NULL,
  `starttime` varchar(50) character set gb2312 default NULL,
  `endtime` varchar(50) character set gb2312 NOT NULL,
  `type` varchar(20) character set gbk default NULL,
  `rname` varchar(30) character set gb2312 NOT NULL,
  `rid` bigint(20) NOT NULL,
  PRIMARY KEY  (`jobid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- 导出表中的数据 `jobs`
-- 

INSERT INTO `jobs` VALUES (2, 'java开发工程师', '开发开发各种开发', 'javajava各种java', '2015/1/1', '2015/2/2', 'IT类', 'NB的公司啊', 3);
INSERT INTO `jobs` VALUES (4, '销售', 'NB的工作', '能说很喝', '2015/1/1', '2015/2/2', '销售类', '另一个NB的公司', 4);
INSERT INTO `jobs` VALUES (6, '银行业务员', '数钱', '手快', '2015/1/1', '2015/2/2', '金融类', '银行', 3);

-- --------------------------------------------------------

-- 
-- 表的结构 `recruiters`
-- 

CREATE TABLE `recruiters` (
  `rid` bigint(20) NOT NULL auto_increment,
  `rname` varchar(30) NOT NULL,
  `rpassword` varchar(20) NOT NULL,
  PRIMARY KEY  (`rid`),
  UNIQUE KEY `rname` (`rname`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- 导出表中的数据 `recruiters`
-- 

INSERT INTO `recruiters` VALUES (3, '1', '1');
INSERT INTO `recruiters` VALUES (4, '22', '22');

-- --------------------------------------------------------

-- 
-- 表的结构 `resumes`
-- 

CREATE TABLE `resumes` (
  `resumeid` bigint(20) NOT NULL auto_increment,
  `cid` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` varchar(5) default NULL,
  `sex` varchar(5) default NULL,
  `tel` varchar(20) default NULL,
  `email` varchar(50) NOT NULL,
  `education` varchar(255) default NULL,
  `skill` varchar(255) NOT NULL,
  `about` varchar(255) default NULL,
  PRIMARY KEY  (`resumeid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- 导出表中的数据 `resumes`
-- 

INSERT INTO `resumes` VALUES (2, 2, '闫峻函', '11', '男', '123456789', 'asfdgd@asdf.com', '北交大', 'c、c++、java', '自我介绍');
