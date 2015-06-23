<?php

/*  SimpleNews
    Copyright (C) 2004-2005 chaoscontrol.org

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
*/

	include("../includes/dbconnect.php");

// *************************************************
// 	Create Table Queries
// *************************************************

$query = "CREATE TABLE `simplenews_articles` (
  `news_id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `snippet` text NOT NULL,
  `article` text NOT NULL,
  `topic` int(11) NOT NULL default '0',
  `poster` varchar(255) NOT NULL default '',
  `date` varchar(255) NOT NULL default '',
  `sticky` char(3) NOT NULL default 'off',
  PRIMARY KEY  (`news_id`)
) TYPE=MyISAM;";
$result = mysql_query($query) or die (mysql_error());


$query = "CREATE TABLE `simplenews_banned` (
  `banned_ip` varchar(15) NOT NULL default '',
  `date` varchar(100) NOT NULL default ''
) TYPE=MyISAM;";
$result = mysql_query($query) or die (mysql_error());


$query = "CREATE TABLE `simplenews_comments` (
  `comment_id` int(11) NOT NULL auto_increment,
  `news_id` int(11) NOT NULL default '0',
  `guest` varchar(255) NOT NULL default '',
  `guest_ip` varchar(15) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `web` varchar(255) NOT NULL default '',
  `comment` text NOT NULL,
  `date` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`comment_id`)
) TYPE=MyISAM;";
$result = mysql_query($query) or die (mysql_error());


$query = "CREATE TABLE `simplenews_settings` (
  `postlimit` int(3) NOT NULL default '0',
  `wordfilter` char(2) default NULL,
  `com_size` int(11) NOT NULL default '0',
  `version` varchar(25) NOT NULL default '',
  `allow_comments` char(2) default NULL,
  `allow_email` char(2) default NULL,
  `theme` varchar(255) NOT NULL default ''
) TYPE=MyISAM;";
$result = mysql_query($query) or die (mysql_error());


$query = "INSERT INTO `simplenews_settings` VALUES (6, 'on', 200, '1.0.0', 'on', 'on', 'SimpleNews')";
$result = mysql_query($query) or die (mysql_error());


$query = "CREATE TABLE `simplenews_topics` (
  `topic_id` int(11) NOT NULL auto_increment,
  `topic` varchar(25) NOT NULL default '',
  `icon` varchar(25) NOT NULL default '',
  PRIMARY KEY  (`topic_id`)
) TYPE=MyISAM;";
$result = mysql_query($query) or die (mysql_error());


$query = "INSERT INTO `simplenews_topics` VALUES (1, 'Default', 'news.png');";
$result = mysql_query($query) or die (mysql_error());


$query = "CREATE TABLE `simplenews_users` (
  `user_id` int(11) NOT NULL auto_increment,
  `username` varchar(255) NOT NULL default '',
  `password` varchar(32) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `userlevel` int(1) NOT NULL default '0',
  `reg_date` varchar(255) NOT NULL default '',
  `login_time` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`user_id`)
) TYPE=MyISAM;";
$result = mysql_query($query) or die (mysql_error());


?>