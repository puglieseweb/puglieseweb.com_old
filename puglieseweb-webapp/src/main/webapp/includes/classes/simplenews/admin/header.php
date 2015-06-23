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
//		Disable error notifications and start sessions
// ************************************************************

	error_reporting(E_ALL^E_NOTICE);
	session_start();
	
// ************************************************************
//	HTML headers
// ************************************************************

	echo "
	<html>
	<head>
	<title>SimpleNews Administration</title>
	<link href='style.css' rel='stylesheet' type='text/css'>
	<script language='JavaScript' type='text/javascript' src='../includes/javascript.js'></script>
	</head>";
	
// ************************************************************
//		Check if user is logged in
// ************************************************************
	
	if (!isset($_SESSION['sn_user'])) {
	
		if (isset($_GET['login'])) {
		
			echo "<div align='center'>Your username or password is invalid. Please try again.</div><p>";
		
		}
		
// ************************************************************
//		Display login form
// ************************************************************

		echo"
		<form action='../includes/submit-login.php' method='post'>
		<table class='main_table'>
		<tr>
			<td>
			
			<table class='form_table'>
			<tr>
				<td rowspan='3' align='center'><img src='images/info.png' border='0' hspace='15'></td>
				<td width='100'><b>Username</b></td>
				<td><input type='text' size='25' name='username'></td>
			</tr>
			<tr>
				<td><b>Password</b></td>
				<td><input type='password' size='25' name='password'></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td align='right'><input type='submit' name='submit' value='Login' size='25'>&nbsp;&nbsp;&nbsp;<input type='reset' name='clear' value='Clear' size='25'></td>
			</tr>
			</table>
			
			</td>
		</tr>
		</table>
		</form>";
		
		include("footer.php");
		exit();
		
	} else {
	
// ************************************************************
//		User is logged in. Display header.
// ************************************************************
	
		include("../includes/dbconnect.php");	// MySQL Connection Settings
		include("../includes/settings.php");	// Site Wide Settings & Variables
		include("../includes/functions.php");	// php Functions
		
		echo "
		<table class='spacer_table'>
		<tr>
			<td width='50%'>&nbsp;<a href='index.php'><font size='4' font color='#000000'><b>SimpleNews Control Panel</b></font></a></td>
			<td valign='bottom'width='40%' align='right'>[ <a href='help.php'>Help</a> ]&nbsp;&nbsp;[ <a href='../includes/submit-logout.php'>Logout $sn_user</a> ]&nbsp;</td>
		</tr>
		<tr>
			<td colspan='2' width='100%'>
		
			<table class='header_table'>
			<tr>
				<td align='center'><a href='article.php?action=addnews'><img src='images/news.png' border='0'><br>Add News</a></td>
				<td align='center'><a href='article.php?action=listnews'><img src='images/news.png' border='0'><br>List/Edit News</a></td>
				<td align='center'><a href='prefs.php'><img src='images/settings.png' border='0'><br>Settings</a></td>
				<td align='center'><a href='ban.php'><img src='images/error.png' border='0'><br>Ban Control</a></td>
				<td align='center'><a href='users.php?action=add'><img src='images/add_users.png' border='0'><br>Create User</a></td>
				<td align='center'><a href='users.php'><img src='images/users.png' border='0'><br>Manage Users</a></td>
			</tr>
			</table>
				
			</td>
		</tr>
		<tr>
			<td colspan='2'>";
			
	}
			
?>	