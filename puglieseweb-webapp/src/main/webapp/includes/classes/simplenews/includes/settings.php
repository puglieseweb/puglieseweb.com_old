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
	
error_reporting(E_ALL^E_NOTICE); 

// ************************************************************
//		Simplify Some Variables.
// ************************************************************

	$action			= $_GET['action'];
	$subaction		= $_GET['subaction'];
	$offset			= $_GET['offset'];
	$news_id		= $_GET['news_id'];
	$submit			= $_POST['submit'];
	$sn_user		= $_SESSION['sn_user'];
	$sn_userlevel	= $_SESSION['sn_userlevel'];

	// Make sure $offset and $news_id are integers
	if (is_numeric($offset) === FALSE) { $offset = null; }
	if (is_numeric($news_id) === FALSE) { $news_id = null; }

// ************************************************************
//		Get settings from MySQL DB
// ************************************************************
	
	// post settings
	$query = "SELECT * FROM simplenews_settings";
	$result = mysql_query($query) or die (mysql_error());
	$settings = mysql_fetch_assoc($result);
	
	$postlimit			= $settings['postlimit'];
	$version			= $settings['version'];
	$com_size			= $settings['com_size'];
	$theme				= $settings['theme'];
	$allow_email		= $settings['allow_email'];
	$allow_comments		= $settings['allow_comments'];
	$filter_replace		= $settings['filter_replace'];
	$wordfilter			= $settings['wordfilter'];


// ************************************************************
//		Set BBCode (print.tpl) path
// ************************************************************
	
	$script = $_SERVER['PHP_SELF'];
	
	if (strstr($script, 'print.php') === FALSE) {

		$pre_path = "./simplenews";

	} else {

		$pre_path = ".";		

	}
		
// ************************************************************
//		BBCode Array
// ************************************************************

	$bbcode = array(

		'[:)]' 			=> "<img src = '" . $pre_path . "/themes/{THEME}/images/emoticons/smile.gif' align='middle'>",
		'[:(]' 			=> "<img src = '" . $pre_path . "/themes/{THEME}/images/emoticons/frown.gif' align='middle'>",
		'[;)]' 			=> "<img src = '" . $pre_path . "/themes/{THEME}/images/emoticons/wink.gif' align='middle'>",	
		'[:D]' 			=> "<img src = '" . $pre_path . "/themes/{THEME}/images/emoticons/grin.gif' align='middle'>",	
		'[:p]' 			=> "<img src = '" . $pre_path . "/themes/{THEME}/images/emoticons/tongue.gif' align='middle'>",
		'[8)]' 			=> "<img src = '" . $pre_path . "/themes/{THEME}/images/emoticons/cool.gif' align='middle'>",
		'[:mad:]' 		=> "<img src = '" . $pre_path . "/themes/{THEME}/images/emoticons/mad.gif' align='middle'>",
		'[:o]' 			=> "<img src = '" . $pre_path . "/themes/{THEME}/images/emoticons/eek.gif' align='middle'>",			
		'[:light:]' 	=> "<img src = '" . $pre_path . "/themes/{THEME}/images/emoticons/light.gif' align='middle'>",
		'[:page:]' 		=> "<img src = '" . $pre_path . "/themes/{THEME}/images/emoticons/page.gif' align='middle'>",	
		'[:question:]'	=> "<img src = '" . $pre_path . "/themes/{THEME}/images/emoticons/question.gif' align='middle'>",		
		'[:thumbup:]' 	=> "<img src = '" . $pre_path . "/themes/{THEME}/images/emoticons/thumbup.gif' align='middle'>",		
		'[:thumbdown:]' => "<img src = '" . $pre_path . "/themes/{THEME}/images/emoticons/thumbdown.gif' align='middle'>",
		'[:warning:]' 	=> "<img src = '" . $pre_path . "/themes/{THEME}/images/emoticons/warning.gif' align='middle'>",
		
		'[b]'	=> "<b>",
		'[/b]'	=> "</b>",
		'[i]' 	=> "<i>",
		'[/i]'	=> "</i>",
		'[u]' 	=> "<u>",
		'[/u]'	=> "</u>",

		'[left]' 	=> "<div align=left>",
		'[/left]' 	=> "</div>",
		'[center]' 	=> "<div align=center>",
		'[/center]' => "</div>",
		'[right]' 	=> "<div align=right>",
		'[/right]' 	=> "</div>"

	);
	
?>