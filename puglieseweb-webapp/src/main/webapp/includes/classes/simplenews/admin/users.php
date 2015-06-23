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

	include("header.php");
	
// ************************************************************
//		Section Header
// ************************************************************	
			
	echo "
	<table class='main_table'>
	<tr>
		<td>";
			
// ************************************************************
//		Add User
// ************************************************************
	
	if ($action == "add") {
	
		// Only Admins can create accounts
		if ($sn_userlevel == 1) {
	
			// Process Add User form Submition
			if (isset($submit)) {
			
				$username	= $_POST['username'];
				$email		= $_POST['email'];
				$userlevel	= $_POST['userlevel'];
				$password	= $_POST['password'];
				$passconf	= $_POST['passconf'];
			
				// Query to check for duplicate username
				$query = "SELECT username FROM simplenews_users WHERE username = '$username'";
				$result = mysql_query($query) or die (mysql_error());
				
				$rows = mysql_num_rows($result);
		
				// Check for empty/invalid fields
				if (empty($username)) {
				
					echo "
					<p class='error'>Username is a required field.</p>
					<p class='error'><a href='users.php?action=add'>Go Back</a></p>";

					
				} else if ($rows > 0) {
		
					echo "
					<p class='error'>The username you choose is already in use by another user.</p>
					<p class='error'><a href='users.php?action=add'>Go Back</a></p>";
	
		
				} else if (empty($email)) {
			
					echo "
					<p class='error'>E-Mail is a required field.</p>
					<p class='error'><a href='users.php?action=add'>Go Back</a></p>";
	
			
				} else if (empty($password)) {
			
					echo "
					<p class='error'>The password field is required.</p>
					<p class='error'><a href='users.php?action=add'>Go Back</a></p>";
	
			
				} else if (empty($passconf)) {
			
					echo "
					<p class='error'>The confirm password field is required.</p>
					<p class='error'><a href='users.php?action=add'>Go Back</a></p>";
	
			
				} else if ($password != $passconf) {
			
					echo "
					<p class='error'>The passwords you entered didn't match.</p>
					<p class='error'><a href='users.php?action=add'>Go Back</a></p>";
	
			
				} else {
			
					// Fields have been verified. Hash password and enter data in SQL DB
					$password = md5($password);
					
					$timestamp	= date("F j, Y, g:i a", time());
				
					$query = "INSERT INTO simplenews_users (username, email, reg_date, password, userlevel) VALUES ('$username', '$email', '$timestamp', '$password', '$userlevel')";
					$result = mysql_query($query) or die (mysql_error());
						
					echo "
					<p class='error'>The user's account has been created. Would you like to add another?</p>
					<p class='error'><a href='users.php?action=add'>Yes</a> or <a href='users.php'>No</a></p>";
			
				}				
			
			} else {
		
// ************************************************************
//		Add User Form
// ************************************************************

				echo "
				<form action='users.php?action=add' method='post'>
				<table class='topic'>
				<tr>
					<td width='10%'>&nbsp; Add User Account</td>
				</tr>
				<table>

				<table class='form_table'>
				<tr>
					<td width='40%'>&nbsp; Username</td>
					<td><input type='text' name='username' size='25'></td>
				</tr>
				<tr>
					<td>&nbsp; E-Mail Address</td>
					<td><input type='text' name='email' size='25'></td>
				</tr>
				<tr>
					<td>&nbsp; User Level</td>
					<td>
						<select name='userlevel'>
							<option value='3'>Poster</option>
							<option value='2'>Editor</option>
							<option value='1'>Admin</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>&nbsp; Password</td>
					<td><input type='password' name='password' size='25'></td>
				</tr>
				<tr>
					<td>&nbsp; Confirm Password</td>
					<td><input type='password' name='passconf' size='25'></td>
				</tr>
				</table>
				
				<table class='form_table'>	
				<tr>
					<td align='right'>
						<input type='submit' name='submit' value='Create Account'>
						<input type='reset' name='reset' value='Start Over'>
					</td>
				</tr>
				</table>
				</form>";
					
			}	
		
		} else {
					
			echo "
			<p class='error'>Only Administrators can create user accounts.</p>
			<p class='error'><a href='users.php'>Go Back</a></p>";
					
		}
		
	
// ************************************************************
//		Edit User Account
// ************************************************************
	
		} else if ($action == "edit") {
		
			// Process Edit User form Submition
			if (isset($submit)) {
			
				// Post and Get variables from form
				$user_id		= $_POST['user_id'];
				$email		= $_POST['email'];
				$userlevel	= $_POST['userlevel'];
				$password	= $_POST['password'];
				$passconf	= $_POST['passconf'];
				$remove		= $_POST['remove'];
				
				// If 'Delete' was checked, remove account
				if (!empty($remove)) {

					// Check to see if user is in the admin userlevel
					if ($sn_userlevel == 1) {
		
						 // User ID 1 is always the admin account; it can't be removed
						if ($user_id == 1) {
			
							echo "
							<p class='error'>Sorry, you cannot delete the primary administrator account.</p>
							<p class='error'><a href='users.php?edit=$user_id'></a></p>";
			
			
						} else {
		
							mysql_query("DELETE FROM simplenews_users WHERE user_id = '$user_id'") or die (mysql_error());
							
							echo "
							<p class='error'>The user's account has been deleted.</p>
							<p class='error'><a href='users.php'>Go Back</a></p>";
				
						}						

					// Only admins can delete ;)
					} else {
					
						echo "
						<p class='error'>Only Administrators can delete accounts.</p>
						<p class='error'><a href='users.php'>Go Back</a></p>";
		
	
					}		
					
				// Continue with account editing					
				} else {
				
					// Check for required fields
					if (empty($email)) {
					
						echo "
						<p class='error'>You must enter a valid email address.</p>
						<p class='error'><a href='users.php?action=edit&user=$user_id'>Go Back</a></p>";
		
				
					}
				
					// If password fields were modified, verifiy the passwords match and update SQL
					if (!empty($password) ) {
					
						if ($password != $passconf) {
				
							echo "
							<p class='error'>The passwords you entered didn't match.</p>
							<p class='error'><a href='users.php?action=edit&user=$user_id'>Go Back</a></p>";
			
				
						} else {
					
							$password = md5($password);
							
							$query = "UPDATE simplenews_users SET email = '$email', userlevel = '$userlevel', password = '$password' WHERE user_id = '$user_id'";
							$result = mysql_query($query) or die (mysql_error());
					
							echo "
							<p class='error'>The account properties have been updated.</p>
							<p class='error'><a href='users.php'>Go Back</a></p>";

						}
				
					// Password fields were not modified, update data in SQL
					} else {
					
						$query = "UPDATE simplenews_users SET email = '$email', userlevel = '$userlevel' WHERE user_id = '$user_id'";
						$result = mysql_query($query) or die (mysql_error());
					
						echo "
						<p class='error'>The account properties have been updated.</p>
						<p class='error'><a href='users.php'>Go Back</a></p>";
					
					}
				
				}
				
			} else {
				
				// Display the Edit User form
				$user_id = $_GET['user'];
			
				$query = "SELECT * FROM simplenews_users WHERE user_id = '$user_id'";
				$result = mysql_query($query) or die (mysql_error());
					
				$data = mysql_fetch_assoc($result);
				
				$username = $data['username'];
				$email = $data['email'];
				$userlevel = $data['userlevel'];
					
				if (($sn_userlevel == 1) || ($username == $sn_user)) {

					echo "
					<form action='users.php?action=edit' method='post' name='edituser'>
					<table class='topic'>
					<tr>
						<td>&nbsp; Edit User Account</td>
					</tr>
					<table>

					<table align='center' border='0' cellpadding='2' cellpadding='2' width='100%'>
					<tr>
						<td>&nbsp; Username</td>
						<td>$username</td>
					</tr>
					<tr>
						<td>&nbsp; E-Mail</td>
						<td><input type='text' name='email' value='$email' size='25' maxlenght='25'></td>
					</tr>
					<tr>
						<td>&nbsp; Access Level</td>
						<td>";
								
					if ($sn_userlevel == 1) {
									
					if ($userlevel == 1) { $level = "Admin"; }
					if ($userlevel == 2) { $level = "Editor"; }
					if ($userlevel == 3) { $level = "Poster"; }
									
					echo "
					<select name='userlevel'>
						<option value='$userlevel'>Current Level: $level</option>
						<option value='3'>Poster</option>
						<option value='2'>Editor</option>
						<option value='1'>Admin</option>
					</select>";
								
				} else {
								
					echo "$level";
								
				}

				echo "
						</td>
					</tr>
					<tr>
						<td>&nbsp; <b>Reset Password</b></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp; Password</td>
						<td><input type='password' name='password' size='25' maxlenght='255'></td>
					</tr>
					<tr>
						<td>&nbsp; Confirm Password</td>
						<td><input type='password' name='passconf' size='25' maxlenght='255'></td>
					</tr>
					</table>

					<table class='form_table'>
					<tr>
						<td width='20%' align='center'><input type='checkbox' name='remove'><input type='hidden' name='user' value='$user'></td>
						<td>Check this box if you would like to <b>delete</b> the account for <i>$username</i>.<br>This cannot be undone! </td>
					</tr>
					</table>
							
					<table class='form_table'>
					<tr>
						<td align='right'>
							<input type='hidden' name='user_id' value='$user_id'>
							<input type='submit' name='submit' value='Update Account'>
						</td>
					</tr>
					</table>
					</form>";
	
			} else {
			
				echo "
				<p class='error'>Only Administrators or the account's owner can edit this account.</p>
				<p class='error'><a href='users.php'></a></p>";

			}
	
		}
		
// ************************************************************
//		Display Main User Page
// ************************************************************
		
	} else {
	
		echo "
		<form action='users.php' method='post' name='listusers'>
		<table class='topic'>
		<tr>
			<td width='5%'>&nbsp;</td>
			<td width='25%'><b>Username</b></td>
			<td width='25%'><b>Access Level</b></td>
			<td width='30%'><b>Email</b></td>
			<td width='15%'><b>Posts</b></td>
		</tr>
		<table>

		<table class='form_table'>";
					
		$query = "SELECT * FROM simplenews_users";
		$result = mysql_query($query);
					
		while ($data = mysql_fetch_assoc($result)) {
					
			$user_id = $data['user_id'];
			$username = $data['username'];
			$laston = $data['login_time'];
			$regdate = $data['reg_date'];
			$email = $data['email'];
			$userlevel = $data['userlevel'];
						
			$query = "SELECT news_id FROM simplenews_articles WHERE poster = '$username'";
			$posts = mysql_query($query) or die (mysql_error());
		
			$num_posts = mysql_num_rows($posts);
	
			if ($userlevel == 1) { $level = "Admin"; }
			if ($userlevel == 2) { $level = "Editor"; }
			if ($userlevel == 3) { $level = "Poster"; }
	
			echo "
			<tr>
				<td width='5%'>&nbsp;</td>
				<td width='25%'><a href='users.php?action=edit&user=$user_id'>$username</a></td>
				<td width='25%'>$level</td>
				<td width='30%'><a href='mailto:$email'>$email</a></td>
				<td width='15%'>$num_posts</td>
			</tr>";
					
			}
					
			echo "</table>";

		}
			
// ************************************************************
//		Section Footer
// ************************************************************

	include("footer.php");
	
?>