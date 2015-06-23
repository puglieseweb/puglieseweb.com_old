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

// ************************************************************
//		File Dependencies
// ************************************************************

	include("header.php");
	
// ************************************************************
//		Section Header
// ************************************************************	
			
	echo "
	<table class='main_table'>
	<tr>
		<td>";	

// ************************************************************
//		Get Stats
// ************************************************************

	// Get IPs
	$server_ip = $_SERVER['REMOTE_ADDR'];
	$yourip = $_SERVER['REMOTE_ADDR'];
		
	// php Version
	$phpversion = phpversion();
		
	// Total News Aticles
	$query = "SELECT news_id FROM simplenews_articles";
	$result = mysql_query($query) or die (mysql_error());
	$articles = mysql_num_rows($result);
		
	// Total News Articles by User
	$query = "SELECT news_id FROM simplenews_articles WHERE poster = '$sn_user'";
	$result = mysql_query($query) or die (mysql_error());
	$yournews = mysql_num_rows($result);
		
	// Total Comments for all articles
	$query = "SELECT comment_id FROM simplenews_comments";
	$result = mysql_query($query) or die (mysql_error());
	$comments = mysql_num_rows($result);
		
	// Total Topics
	$query = "SELECT topic_id FROM simplenews_topics";
	$result = mysql_query($query) or die (mysql_error());
	$topics = mysql_num_rows($result);
			
	// Total Users
	$query = "SELECT user_id FROM simplenews_users";
	$result = mysql_query($query) or die (mysql_error());
	$users = mysql_num_rows($result);
	
// ************************************************************
//		Display Info
// ************************************************************	
		
	echo "
	<table border='0' width='100%'>
	<tr>
		<td width='25%' align='center'><img src='images/info.png' border='0' hspace='4' vspace='4'></td>
		<td><font size='+2'><b>Welcome <i>$sn_user</i>!</font></b></td>
	</tr>
	</table>
		
	<table border='0' width='100%'>
	<tr>
		<td width='50%' valign='top'>
		
		<table class='topic'>
		<tr>
			<td>&nbsp; Statistics</td>
		</tr>
		</table>
		
		<table align='center' border='0' cellpadding='2' cellpadding='2' width='100%'>
		<tr>
			<td width='25%'>&nbsp; Total Articles:</td>
			<td width='20%'>$articles</td>
		</tr>
		<tr>
			<td width='25%'>&nbsp; Articles By You:</td>
			<td width='20%'>$yournews</td>
		</tr>
		<tr>
			<td width='25%'>&nbsp; Total Comments:</td>
			<td width='20%'>$comments</td>
		</tr>
		<tr>
			<td width='25%'>&nbsp; Topics:</td>
			<td width='20%'>$topics</td>
		</tr>
		<tr>
			<td width='25%'>&nbsp; User Accounts:</td>
			<td width='20%'>$users</td>
		</tr>
		</table>
		
		</td>
		<td width='50%' valign='top'>
		
		<table class='topic'>
		<tr>
			<td>&nbsp; Information</td>
		</tr>
		</table>
					
		<table align='center' border='0' cellpadding='2' cellpadding='2' width='100%'>
		<tr>
			<td width='25%'>&nbsp; Server IP:</td>
			<td width='20%'>$server_ip</td>
		</tr>
		<tr>
			<td width='25%'>&nbsp; Your IP:</td>
			<td width='20%'>$yourip</td>
		</tr>
		<tr>
			<td width='25%'>&nbsp; SimpleNews Version:</td>
			<td width='20%'>$version</td>
		</tr>
		<tr>
			<td width='25%'>&nbsp; PHP Version:</td>
			<td width='20%'>$phpversion</td>
		</tr>
		</table>
		
		</td>
	</tr>
	</table>";

// ************************************************************
//		Section Footer
// ************************************************************

	include("footer.php");
	
?>