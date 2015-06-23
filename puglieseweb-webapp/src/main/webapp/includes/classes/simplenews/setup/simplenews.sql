#
# Table structure for table `simplenews_articles`
#

CREATE TABLE `simplenews_articles` (
  `news_id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `snippet` text NOT NULL,
  `article` text NOT NULL,
  `topic` int(11) NOT NULL default '0',
  `poster` varchar(255) NOT NULL default '',
  `date` varchar(255) NOT NULL default '',
  `sticky` char(3) NOT NULL default 'off',
  PRIMARY KEY  (`news_id`)
) TYPE=MyISAM;

#
# Dumping data for table `simplenews_articles`
#


# --------------------------------------------------------

#
# Table structure for table `simplenews_banned`
#

CREATE TABLE `simplenews_banned` (
  `banned_ip` varchar(15) NOT NULL default '',
  `date` varchar(100) NOT NULL default ''
) TYPE=MyISAM;

#
# Dumping data for table `simplenews_banned`
#


# --------------------------------------------------------

#
# Table structure for table `simplenews_comments`
#

CREATE TABLE `simplenews_comments` (
  `comment_id` int(11) NOT NULL auto_increment,
  `news_id` int(11) NOT NULL default '0',
  `guest` varchar(255) NOT NULL default '',
  `guest_ip` varchar(15) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `web` varchar(255) NOT NULL default '',
  `comment` text NOT NULL,
  `date` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`comment_id`)
) TYPE=MyISAM;

#
# Dumping data for table `simplenews_comments`
#


# --------------------------------------------------------

#
# Table structure for table `simplenews_settings`
#

CREATE TABLE `simplenews_settings` (
  `postlimit` int(3) NOT NULL default '0',
  `wordfilter` char(2) default NULL,
  `com_size` int(11) NOT NULL default '0',
  `version` varchar(25) NOT NULL default '',
  `allow_comments` char(2) default NULL,
  `allow_email` char(2) default NULL,
  `theme` varchar(255) NOT NULL default ''
) TYPE=MyISAM;

#
# Dumping data for table `simplenews_settings`
#

INSERT INTO `simplenews_settings` VALUES (6, 'on', 200, '1.0.0', 'on', 'on', 'SimpleNews');

# --------------------------------------------------------

#
# Table structure for table `simplenews_topics`
#

CREATE TABLE `simplenews_topics` (
  `topic_id` int(11) NOT NULL auto_increment,
  `topic` varchar(25) NOT NULL default '',
  `icon` varchar(25) NOT NULL default '',
  PRIMARY KEY  (`topic_id`)
) TYPE=MyISAM;

#
# Dumping data for table `simplenews_topics`
#

INSERT INTO `simplenews_topics` VALUES (1, 'Default', 'news.png');

# --------------------------------------------------------

#
# Table structure for table `simplenews_users`
#

CREATE TABLE `simplenews_users` (
  `user_id` int(11) NOT NULL auto_increment,
  `username` varchar(255) NOT NULL default '',
  `password` varchar(32) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `userlevel` int(1) NOT NULL default '0',
  `reg_date` varchar(255) NOT NULL default '',
  `login_time` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`user_id`)
) TYPE=MyISAM;
