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
//		Include File Dependencies
// ************************************************************

	include("../includes/dbconnect.php");
	
// ************************************************************
//		Process User Login
// ************************************************************	

	// Get Post Vars from Form
	$username = $_POST['username'];
	$password = $_POST['password'];
		
	// Hash Password
	$password = md5($password);
	
	// Find User in SQL
	$query = "SELECT * FROM simplenews_users WHERE username='$username' AND password='$password' LIMIT 1";
	$result = mysql_query($query) or die (mysql_error());
	
	// Number of Users Found
	$rows = mysql_num_rows($result);
	
	// No Matching Users Found
	if ($rows == 0) {
	
		header("Location: ../admin/index.php?login=error");
	
	} else {
		
		$data = mysql_fetch_assoc($result);
		
		$userlevel = $data['userlevel'];
	
		// Create Sessions
		session_register('sn_user'); $_SESSION['sn_user'] = $username;
		session_register('sn_userlevel'); $_SESSION['sn_userlevel'] = $userlevel;
		
		$sn_user = $_SESSION['sn_user'];
		$sn_userlevel = $_SESSION['sn_userlevel'];
		
		$timestamp	= date("F j, Y, g:i a", time());
		
		// Update User's Login Time		
		$query = "UPDATE simplenews_users SET login_time = '$timestamp' WHERE username='$username' AND password='$password'";
		$result = mysql_query($query) or die (mysql_error());
		
		// Forward to Index
		header("Location: ../admin/index.php");
	
	}

?>