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
//		Determin what needs to be done
// ************************************************************	
	
	// Variable of IP from comments page
	$comban = $_GET['comban'];
		
	if ((isset($submit)) || (isset($comban))) {
		
		// Check that logged in user is an Admin
		if ($sn_userlevel == 1) {
			
			if (isset($submit)) {
				
				// IP to un-ban
				$ip = $_POST['unban'];
				
				// IP to ban
				$banthis = $_POST['banthis'];
					
// ************************************************************
//		Un-ban an IP address
// ************************************************************

				if (!empty($ip)) {
					
					foreach ($ip as $key => $banned) {
						
						$query = "DELETE FROM simplenews_banned WHERE banned_ip = '$banned'";
						$result = mysql_query($query) or die (mysql_query());
							
						echo "<p class='error'><i>$banned</i> has been removed from the ban list.</p>";
						
					}
					
					echo "<p class='error'><a href='ban.php'>Go Back</a></p>";
					
// ************************************************************
//		Ban an IP address
// ************************************************************
					
				} else if (!empty($banthis)) {
					
					// Check to make sure IP isn't alread banned
					$query = "SELECT banned_ip FROM simplenews_banned WHERE banned_ip = '$banthis'";
					$result = mysql_query($query) or die (mysql_query()); 
						
					$rows = mysql_num_rows($result);
						
					if ($rows != 0) {
						
						echo "
						<p class='error'><i>$banthis</i> is already on the ban list.</p>
						<p class='error'><a href='ban.php'>Go Back</a></p>";
							
					} else {
					
						// Make sure it's an IP Address
						$stripped = str_replace(".", "", $banthis);
						
						if (is_numeric($stripped)) {
						
							$timestamp	= date("F j, Y, g:i a", time());
											
							$query = "INSERT INTO simplenews_banned (banned_ip, date) VALUES ('$banthis', '$timestamp')";
							$result = mysql_query($query) or die (mysql_query()); 
		
							echo "
							<p class='error'><i>$banthis</i> has been added to the ban list.</p>
							<p class='error'><a href='ban.php'>Go Back</a></p>";
					
						} else {
						
							echo "
							<p class='error'><i>$banthis</i> doesn't appear to be a valid IP address.</p>
							<p class='error'><a href='ban.php'>Go Back</a></p>";
						
						}	
						
					}
					
				} else {
				
					echo "
					<p class='error'>You didn't enter an IP address to ban.</p>
					<p class='error'><a href='ban.php'>Go Back</a></p>";
				
				}
					 
			} else if (!empty($comban)) {
					
				$query = "SELECT banned_ip FROM simplenews_banned WHERE banned_ip = '$comban'";
				$result = mysql_query($query) or die (mysql_query()); 
						
					$rows = mysql_num_rows($result);
						
					if ($rows != 0) {
						
						echo "
						<p class='error'><i>$comban</i> is already on the ban list.</p>
						<p class='error'><a href='ban.php'>View Ban List</a></p>";
							
					} else {
						
						$timestamp	= date("F j, Y, g:i a", time());
											
						$query = "INSERT INTO simplenews_banned (banned_ip, date) VALUES ('$comban', '$timestamp')";
						$result = mysql_query($query) or die (mysql_query()); 
		
						echo "
						<p class='error'><i>$comban</i> has been added to the ban list.</p>
						<p class='error'><a href='ban.php'>View Ban List</a></p>";
							
					}
					
				}
			
			} else {
			
				echo "
				<p class='error'>Only administratators can ban IP addresses.</p>
				<p class='error'><a href='ban.php'>Go Back</a></p>";
			
			}
			
		} else {
	
			echo "
			<form action='ban.php' method='post' name='banform'>
			<table class='topic'>
			<tr>
				<td width='10%'><input type='checkbox' name='master_box' onclick='javascript:BanCheckAll()'></td>
				<td width='40%'><b>Banned IP</b></td>
				<td width='50%'><b>Ban Date</b></td>
			</tr>
			<table>

			<table class='form_table'>";
					
			$query = "SELECT * FROM simplenews_banned";
			$result = mysql_query($query) or die (mysql_error());
						
			$rows = mysql_num_rows($result);
						
			if ($rows > 0) {
					
				while ($data = mysql_fetch_assoc($result)) {
					
					$ip	= $data['banned_ip'];
					$date	= $data['date'];
						
					echo "
					<tr>
						<td width='10%'><input type='checkbox' value='$ip' name='unban[]'></td>
						<td width='40%'>$ip</td>
						<td width='50%'>$date</td>
					</tr>";
						
				}
		
				echo "
				</table>
		
				<table class='form_table'>
				<tr>
					<td align='center'>With Selected:</td>
					<td>
						<select name='mass_action'>
							<option value='unban'>Un-Ban IP Address</option>
						</select>
					</td>
					<td align='right'><input type='submit' name='submit' value='Make Changes'></td>
				</tr>
				</table>";
							
			} else {
						
				echo "
				<table class='form_table'>
				<tr>
					<td align='center' colspan='3'><i>There are no banned IP addresses.</i></td>
				</tr>
				</table>";
		
			}

			echo "
			</form>

			<form action='ban.php' method='post'>
			<table class='topic'>
			<tr>
				<td width='10%'>&nbsp; Ban IP Address</td>
			</tr>
			<table>

			<table class='form_table'>
			<tr>
				<td align='right'><b>Add IP Address to Ban List</b></td>
				<td><td><input type='text' name='banthis' size='25'></td>
				<td align='right'><input type='submit' value='Ban This IP!' name='submit'>
			</tr>
			</table>
			</form>";
			
		}

// ************************************************************
//		Section Footer
// ************************************************************

	include("footer.php");
	
?>