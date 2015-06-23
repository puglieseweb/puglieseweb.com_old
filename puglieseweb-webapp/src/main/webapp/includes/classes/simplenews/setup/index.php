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
//		Disable error notifications
// ************************************************************

	error_reporting(E_ALL^E_NOTICE);

// ************************************************************
//		Variables
// ************************************************************

	$submit = $_POST['submit'];
	$step	= $_GET['step'];

	// Check to make sure $step is an integer
	if (!is_numeric($step)) {

		$step = null;

	}

// ************************************************************
//		Header
// ************************************************************

	echo "
	<html>
	<head>
		<title>SimpleNews Setup</title>
		<link href='style.css' rel='stylesheet' type='text/css'>
	</head>
	<body>

	<table class='main_table'>
	<tr>
		<td>
			<h2>SimpleNews 1.0.0 Installation</h2>";

// ************************************************************
//		Main Page
// ************************************************************

	if (empty($step)) {

		echo "
		<table class='topic'>
		<tr>
			<td>Introduction</td>
		</tr>
		</table>

		<p>Thanks for trying out SimpleNews!</p>
		<p>This is the final build for the 1.0.0 series of SimpleNews. All bug fixes and patches from previous release candidates are inlcuded in this release.
		1.0.x will be released as needed for bug fixes, 1.1.x, 1.2.x and so on will contain feature additions and upgrades.</p>
		<p>Please note, if you are using an older version of SimpleNews (i.e. 0.9x and not a 1.0.0 release candidate), there is no upgrade path to 1.0.0;
		you will need to back up your SimpleNews database, remove the existing installation and install this one form scratch. With this release, 0.9x is no longer supported.</p>

		<p>Make sure you've read the installation instructions (included in the package you downloaded). When you're ready to get started, click on the appropriate button below.</p>


		<table class='form_table'>
		<tr>
			<td align='right'>
				<form action='./index.php?step=5' method='post' name='next_button'>
					<input type='submit' name='next' value='Upgrade From RC1/RC2 >>'>
				</form>
				<form action='./index.php?step=1' method='post' name='next_button'>
					<input type='submit' name='next' value='New Installation >>'>
				</form>
			</td>
		</tr>
		</table>


		<table class='topic'>
		<tr>
			<td>System Check </td>
		</tr>
		</table>";

		if ($test = @fopen("../includes/dbconnect.php", "w")) {

			echo "<p align='center'><i>No errors reported</i></p>";

		} else {

			echo "
			<p class='error_code'>Warning: dbconnect.php is not writable - Setup will not complete.<br />
			<i>This error can be ignored if you are performing an upgrade.</i></p>";

		}


// ************************************************************
//		Step 1
// ************************************************************

	} else if ($step == 1) {

		echo "
		<table class='topic'>
		<tr>
			<td>MySQL Server Access</td>
		</tr>
		</table>";

		// Process Step 1
		if (!empty($submit)) {

			$username	= $_POST['username'];
			$password	= "";//$_POST['password'];
			$pass2		= "";//$_POST['pass2'];
			$hostname	= $_POST['hostname'];

			// Check Required Fields
			if ((empty($username)) || /*(empty($password)) || (empty($pass2)) ||*/ (empty($hostname))) {

				echo "
				<p class='error'>Please go back and make sure you filled out the entire form.</p>
				<p class='error'><a href='./index.php?step=1'>Go Back</a></p>";

			// Check for Password Match
			} else if ($password != $pass2) {

				echo "
				<p class='error'>The passwords you entered did not match.</p>
				<p class='error'><a href='./index.php?step=1'>Go Back</a></p>";

			} else {

				// Check the username/password/hostname against SQL
				$sql = @mysql_connect($hostname,$username,$password);

				if (!$sql) {

					$error = mysql_error();

					echo "
					<p class='error'>There was an error connecting to MySQL with the information provided. MySQL returned the following information:</p>
					<p class='error_code'>$error</p>
					<p class='error'><a href='./index.php?step=1'>Go Back</a></p>";

				} else {

					echo "
					<p class='error'>The connection to MySQL was successful! Click the button below to continue.</p>

					<form action='./index.php?step=2' method='post' name='next_button'>
					<input type='hidden' name='username' value='$username'>
					<input type='hidden' name='password' value='$password'>
					<input type='hidden' name='hostname' value='$hostname'>
					<table class='form_table'>
					<tr>
						<td align='right'><input type='submit' name='next' value='Next Step >>'></td>
					</tr>
					</table>
					</form>";

				}

			}

		} else {

			echo "
			<p>Your web host or systems administrator should have assigned you a username, password, and hostname to access your MySQL server.
			Enter that information below.</p>

			<form action='./index.php?step=1' method='post' name='step1'>
			<table class='form_table'>
			<tr>
				<td>&nbsp; Username:</td>
				<td><input type='text' name='username' size='20'></td>
			</tr>
			<tr>
				<td>&nbsp; Password:</td>
				<td><input type='password' name='password' size='20'></td>
			</tr>
			<tr>
				<td>&nbsp; Confirm Password:</td>
				<td><input type='password' name='pass2' size='20'></td>
			</tr>
			<tr>
				<td>&nbsp; Hostname:</td>
				<td><input type='text' name='hostname' value='localhost' size='20'></td>
			</tr>
			<tr>
				<td colspan='2'>&nbsp;</td>
			</tr>
			<tr>
				<td colspan='2' align='right'><input type='submit' name='submit' value='Next Step >>'></td>
			</tr>
			</table>
			</form>";
		}

// ************************************************************
//		Step 2
// ************************************************************

	} else if ($step == 2) {

		echo "
		<table class='topic'>
		<tr>
			<td>SimpleNews Database</td>
		</tr>
		</table>";

		// MySQL vars from step 1
		$username	= $_POST['username'];
		$password	= $_POST['password'];
		$hostname	= $_POST['hostname'];

		// Process Step 2
		if (!empty($submit)) {

			$sql_db	= $_POST['dblist'];	// Existing DQ
			$newdb	= $_POST['newdb'];	// New DB

			// Check if it's going to be a new or existing database
			if (!empty($sql_db)) {

				$database = $sql_db;

			} else {

				$database = $newdb;

				$sql = mysql_connect($hostname,$username,$password);
				mysql_query("CREATE DATABASE $database");

				echo "<p>SimpleNews database was created succsesfully!</p>";

			}

			// dbconnect.php template
			$config = "<?php\n
// *************************************************
// 	Set User Access
// *************************************************\n
	\$hostname	= \"$hostname\";
	\$username	= \"$username\";
	\$password	= \"$password\";
	\$database	= \"$database\";

// *************************************************
// 	Database Connection
// *************************************************\n
	\$connection = mysql_connect(\$hostname,\$username,\$password) or die (mysql_error()); \n
	\$database = mysql_select_db(\$database,\$connection) or die (mysql_error()); \n
?>";
			// Write dbconnect.php file
			$file = fopen("../includes/dbconnect.php", "w");
			fwrite($file, $config);
			fclose($file);

			echo "<p>MySQL config file was created successfully!</p>";

			// Create SimpleNews Tables
			include("sql_tables.php");

			echo "<p>SimpleNews database tables were created successfully!</p>";

			echo "
			<p class='error'>At this point, SimpleNews is installed but before you can use it we need to create a user account to log in with. Click the button below to continue.</p>

			<form action='./index.php?step=3' method='post' name='next_button'>
			<table class='form_table'>
			<tr>
				<td align='right'><input type='submit' name='next' value='Next Step >>'></td>
			</tr>
			</table>
			</form>";

		} else {

			echo "
			<p>Now we need to setup the database that SimpleNews will use.</p>
			<p>If you want to install into an existing database, choose one from the drop-down list below.
			Or, if you what to create a new database, enter the name or leave the default name of 'simplenews'.</p>

			<form action='./index.php?step=2' method='post' name='step2'>
			<input type='hidden' name='username' value='$username'>
			<input type='hidden' name='password' value='$password'>
			<input type='hidden' name='hostname' value='$hostname'>
			<table class='form_table'>
			<tr>
				<td>Existing Database:</td>
				<td>
					<select name='dblist'>
					<option></option>";

					$sql = mysql_connect($hostname,$username,$password);
					$db_list = mysql_list_dbs($sql);

					while ($row = mysql_fetch_object($db_list)) {

						echo"<option value='$row->Database'>$row->Database</option>";

					}

					echo "
					</select>
				</td>
			</tr>
			<tr>
				<td>New Database:</td>
				<td><input type='text' name='newdb' value='simplenews' size='25'></td>
			</tr>
			<tr>
				<td colspan='2' align='right'><input type='submit' name='submit' value='Next Step >>'></td>
			</tr>
			</table>
			</form>";

		}

// ************************************************************
//		Step 3
// ************************************************************

	} else if ($step == 3) {

		echo "
		<table class='topic'>
		<tr>
			<td>SimpleNews User Account</td>
		</tr>
		</table>";

		if (!empty($submit)) {

			$account	= $_POST['account'];
			$pw1		= $_POST['pw1'];
			$pw2		= $_POST['pw2'];
			$email	= $_POST['email'];

			// Check Required Fields
			if ((empty($account)) || (empty($pw1)) || (empty($pw2)) || (empty($email))) {

				echo "
				<p class='error'>Please go back and make sure you filled out the entire form.</p>
				<p class='error'><a href='./index.php?step=3'>Go Back</a></p>";

			// Check for Password Match
			} else if ($pw1 != $pw2) {

				echo "
				<p class='error'>The passwords you entered did not match.</p>
				<p class='error'><a href='./index.php?step=3'>Go Back</a></p>";

			} else {

				// Encrypt $password
				$pw1 = md5($pw1);

				// Current Time/Date
				$timestamp	= date("F j, Y, g:i a", time());

				// Connect to SQL, add user account
				include("../includes/dbconnect.php");

				$query = "INSERT INTO simplenews_users (username, email, reg_date, password, userlevel) VALUES ('$account', '$email', '$timestamp', '$pw1', '1')";
				$result = mysql_query($query) or die (mysql_error());

				// Disconnect from SQL


				echo "<p>The user account ($account) has been created.</p>

				<form action='./index.php?step=4' method='post' name='next_button'>
				<table class='form_table'>
				<tr>
					<td align='right'><input type='submit' name='next' value='Next Step >>'></td>
				</tr>
				</table>
				</form>";

			}

		} else {

			echo "
			<p>The user account you create here will be the primary administrator account. You can use this account to create other user accounts, change SimpleNews settings, etc.</p>

			<form action='./index.php?step=3' method='post' name='step3'>
			<table class='form_table'>
			<tr>
				<td>&nbsp; Username:</td>
				<td><input type='text' name='account' size='20'></td>
			</tr>
			<tr>
				<td>&nbsp; Password:</td>
				<td><input type='password' name='pw1' size='20'></td>
			</tr>
			<tr>
				<td>&nbsp; Confirm Password:</td>
				<td><input type='password' name='pw2' size='20'></td>
			</tr>
			<tr>
				<td>&nbsp; Email Address:</td>
				<td><input type='text' name='email' size='20'></td>
			</tr>
			<tr>
				<td colspan='2'>&nbsp;</td>
			</tr>
			<tr>
				<td colspan='2' align='right'><input type='submit' name='submit' value='Next Step >>'></td>
			</tr>
			</table>
			</form>";


		}
// ************************************************************
//		Step 4
// ************************************************************

	} else if ($step == 4) {

		echo "
		<table class='topic'>
		<tr>
			<td>Finished</td>
		</tr>
		</table>

		<p>SimpleNews is installed and is ready for use!</p>

		<p>You can login with the account you created by following this link: <a href='../admin/index.php'>Control Panel</a>. From there
		you can create more accounts, change settings, themes, and post your first news article.</p>

		<p>Before you do that though, for security reasons <u>make sure you remove the SimpleNews 'setup' directory</u>.</p>

		<p>You'll also need to add SimpleNews to your site. To do this, rename your 'news' page to a .php extension. For example, if the page
		you want SimpleNews to appear on is 'index.html', rename it to 'index.php'. Once you do that, add this line of code to where you want
		your news to appear:</p>

		<p align='center'><b>&lt;?php include(\"./simplenews/news.php\"); ?&gt;</b></p>

		<p>That's it. Enjoy!</p>";

// ************************************************************
//		Step 5 - Upgrade
// ************************************************************
	} else if ($step == 5) {

		echo "
		<table class='topic'>
		<tr>
			<td>Upgrade to SimpleNews 1.0.0</td>
		</tr>
		</table>";

		include("../includes/dbconnect.php");

		$query = "UPDATE simplenews_settings SET version = '1.0.0'";
		$result = mysql_query($query) or die (mysql_error());

		$query = "SELECT theme FROM simplenews_settings";
		$result = mysql_query($query) or die (mysql_error());
		$data = mysql_fetch_assoc($result);

		if ($data['theme'] == "Default") {

			$query = "UPDATE simplenews_settings SET theme = 'SimpleNews'";
			$result = mysql_query($query) or die (mysql_error());

		}

		echo "
		<p>The SimpleNews database has been updated.</p>
		<p>For security reasons, make sure you remove the 'setup' directory.</p>
		<br />
		<p align='center'>That's it - Installation is complete.!</p>";


	}

// ************************************************************
//		footer
// ************************************************************

	echo "
		</td>
	</tr>
	</table>

	</body>
	</html>";
?>