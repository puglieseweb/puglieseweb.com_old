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
//		Check Permisions
// ************************************************************
	
	// Logged in user must be an admin.
	if ($sn_userlevel == 1) {

// ************************************************************
//		Get Vars
// ************************************************************

	$gettopic			= $_GET['gettopic'];
	$addtopic			= $_POST['addtopic'];
	$submitprefs		= $_POST['submitprefs'];
	$submit_updatetopic	= $_POST['submit_updatetopic'];
	$submit_filter		= $_POST['submit_filter'];
	$updatetheme		= $_POST['updatetheme'];
			
// ************************************************************
//		Submit - Add Topic
// ************************************************************

		if (isset($addtopic)) {
	
			$topic	= $_POST['topic'];
			$icon		= $_POST['icon'];
		
			// Check for required fields
			if ((empty($topic)) || (empty($icon))) {
			
				echo "
				<p class='error'>All fields are required.</p>
				<p class='error'><a href='prefs.php'>Go Back</a></p>";
	
			} else {
		
				// Add New Topic 
				$query = "INSERT INTO simplenews_topics (topic, icon) VALUES ('$topic', '$icon')";
				$result = mysql_query($query) or die (mysql_error());
			
				echo "
				<p class='error'>The topic <i>$topic</i> was added sucsessfully.</p>
				<p class='error'><a href='prefs.php'>Go Back</a></p>";
		
			}

// ************************************************************
//		Submit - Update Theme
// ************************************************************

		} else if (isset($updatetheme)) {
		
			$newtheme = $_POST['newtheme'];
			
			$query = "UPDATE simplenews_settings SET theme = '$newtheme'";
			$result = mysql_query($query) or die (mysql_error());
				
			echo "
			<p class='error'>The default theme has been updated.</p>
			<p class='error'><a href='prefs.php'>Go Back</a></p>";

// ************************************************************
//		Submit - Update Topic
// ************************************************************

		} else if (isset($submit_updatetopic)) {
	
			$deletetopic	= $_POST['deletetopic'];
			$topic			= $_POST['topic'];
			$topic_id		= $_POST['topic_id'];
			$icon			= $_POST['icon'];
		
			// Delete Topic
			if (isset($deletetopic)) {
		
				mysql_query("DELETE FROM simplenews_topics WHERE topic_id = '$topic_id' LIMIT 1");
			
				$query = "UPDATE simplenews_articles SET topic = '0' WHERE topic = '$topic_id'";
				$result = mysql_query($query) or die (mysql_error());
			
				echo "
				<p class='error'>The topic <i>$topic</i> was deleted sucsessfully.</p>
				<p class='error'><a href='prefs.php'>Go Back</a></p>";
		
			} else {
		
				// Check for required fields
				if ((empty($topic)) || (empty($icon))) {
				
					echo "
					<p class='error'>All fields are required.</p>
					<p class='error'><a href='prefs.php'>Go Back</a></p>";
	
				} else {
				
					// Update Topic
					$query = "UPDATE simplenews_topics SET topic = '$topic', icon = '$icon' WHERE topic_id = '$topic_id'";
					$result = mysql_query($query) or die (mysql_error());
					
					echo "
					<p class='error'>The topic was updated sucsessfully.</p>
					<p class='error'><a href='prefs.php'>Go Back</a></p>";
				
				}
		
			}

// ************************************************************
//		Submit - Program Options
// ************************************************************

		} else if (isset($submitprefs)) {
		
			$postlimit		= $_POST['postlimit'];
			$com_size		= $_POST['com_size'];
			$allow_email	= $_POST['allow_email'];
			$allow_comments	= $_POST['allow_comments'];
			$wordfilter		= $_POST['wordfilter'];
		
			// Add settings to SQL
			$query = "UPDATE simplenews_settings SET
				postlimit		= '$postlimit',
				com_size		= '$com_size',
				allow_comments	= '$allow_comments',
				allow_email		= '$allow_email',
				wordfilter		=  '$wordfilter'";
			$result = mysql_query($query) or die (mysql_error());
				
				echo "
				<p class='error'>SimpleNews settings have been updated.</p>
				<p class='error'><a href='prefs.php'>Go Back</a></p>";
				
// ************************************************************
//		Show Settings
// ************************************************************
	
		} else {
				
			echo "
			<table class='topic'>
			<tr>
				<td>&nbsp; Program Options</td>
			</tr>
			<table>

			<form action='prefs.php' method='post'>
			<table class='form_table'>
			<tr>
				<td width='40%'>&nbsp; News Articles to Display</td>
				<td><input type='text' name='postlimit' value='$postlimit' size='3' maxlenght='3'></td>
			</tr>
			<tr>
				<td>&nbsp; Allow News Comments</td>";

				if ($allow_comments == "on") {

					echo "<td><input type='checkbox' checked name='allow_comments'></td>";

				} else {

					echo "<td><input type='checkbox' name='allow_comments'></td>";

				}
			
			echo "
			</tr>
			<tr>
				<td>&nbsp; Allow 'Email Article'</td>";

				if ($allow_email == "on") {

					echo "<td><input type='checkbox' checked name='allow_email'></td>";

				} else {

					echo "<td><input type='checkbox' name='allow_email'></td>";

				}
			
			echo "
			</tr>
						<tr>
				<td width='40%'>&nbsp; Enable Foul Language Filter</td>";

				if ($wordfilter == "on") {

					echo "<td><input type='checkbox' checked name='wordfilter'></td>";

				} else {

					echo "<td><input type='checkbox' name='wordfilter'></td>";

				}
			
				echo "
				</tr>
				<tr>
					<td>&nbsp; Comment Character Limit</td>
					<td><input type='text' name='com_size' value='$com_size' size='4' maxlenght='4'></td>
				</tr>
				</table>
		
				<table class='form_table'>
				<tr>
					<td align='right'><input type='submit' name='submitprefs' value='Update Program Options'></td>
				</tr>
      	   </table>";
			
// ************************************************************
//		Topics
// ************************************************************	

		echo "			
		<table class='topic'>
		<tr>
			<td>&nbsp; Article Topics</td>
		</tr>
		<table>

		<form action='prefs.php' method='post'>
		<table class='form_table'>";
		
		if (!empty($gettopic)) {
		
			// Show Topic Details
			$query = "SELECT * FROM simplenews_topics WHERE topic_id = '$gettopic' LIMIT 1";
			$result = mysql_query($query) or die (mysql_error());
			
			while ($data = mysql_fetch_assoc($result)) {
			
				$topic_id	= $data['topic_id'];
				$topic		= $data['topic'];
				$icon		= $data['icon'];
				
				//Get the number of articles in this topic
				$query = "SELECT news_id FROM simplenews_articles WHERE topic = '$gettopic'";
				$res = mysql_query($query) or die (mysql_error());
				
				$posts = mysql_num_rows($res);
			
				echo "			
				<tr>
					<td>&nbsp; Topic Name </td>
					<td><input type='text' name='topic' value='$topic' size='25'></td>
					<td width='30%' rowspan='3'><img src='../topics/$icon' hspace='10' vpsace='10'></td>
				</tr>
				<tr>
					<td>&nbsp; Topic Icon </td>
					<td><input type='text' name='icon' value='$icon' size='15'></td>
				</tr>
				<tr>
					<td>&nbsp; Articles in Topic</td>
					<td>$posts</td>
				</tr>
				<tr>
					<td>&nbsp; Delete Topic</td>
					<td><input type='checkbox' name='deletetopic'></td>
				</tr>";
			
			}
			
			echo "
			</table>

			<table class='form_table'>
			<tr>
				<td align='right'>
					<input type='hidden' name='topic_id' value='$topic_id'>
					<input type='submit' name='submit_updatetopic' value='Update Topic'>
				</td>
			</tr>
			</table>
			</form>";
			
		} else {
		
			// Show All Topics
			$query = "SELECT topic_id FROM simplenews_topics";
			$result = mysql_query($query) or die (mysql_error());
			$return = mysql_num_rows($result);
			
			if ($return != 0) {
			
				$columns = 5;
	
				while ($data = mysql_fetch_assoc($result)) {
	
					if (empty($row)) {

						$row = "0"; 
	
					}
					
					echo "
					<table class='form_table'>
					<tr>";
					
					$query = "SELECT * FROM simplenews_topics LIMIT $row,$columns";
					$result2 = mysql_query($query) or die (mysql_error());
					
					while ($data = mysql_fetch_assoc($result2)) {
							
						$topic_id	= $data['topic_id'];
						$topic		= $data['topic'];
						$icon		= $data['icon'];
						
						echo "
						<td align='center'>
							<a href='prefs.php?gettopic=$topic_id'><img src='../topics/$icon' border='0'></a><br>
							<b>$topic</b>
						</td>";
					
					}
					
					$row = $row + $columns;
					
					echo "</tr></table>";
					
				}
				
			}	
			
		}
					
// ************************************************************
//		Add Topic
// ************************************************************	

		echo "			
		<table class='topic'>
		<tr>
			<td>&nbsp; Add Topic</td>
		</tr>
		<table>

		<form action='prefs.php' method='post'>
		<table class='form_table'>
		<tr>
			<td>&nbsp; Topic Name </td>
			<td><input type='text' name='topic' size='25'></td>
		</tr>
		<tr>
			<td>&nbsp; Topic Icon </td>
			<td><input type='text' name='icon' size='15'><br><i>* The icon will need to be uploaded to the simplenews/topics directory.</i></td>
		</tr>
		</table>
		
		<table class='form_table'>
		<tr>
			<td align='right'><input type='submit' name='addtopic' value='Add Article Topic'></td>
		</tr>
		</table>
		</form>";

// ************************************************************
//		Available Themes
// ************************************************************			
	
	echo "
	<table class='topic'>
	<tr>
		<td>&nbsp; Themes</td>
	</tr>
	<table>
	
	<form action='prefs.php' method='post'>
	<table class='form_table'>
	<tr>";

		// Get Theme Directories		
		$dir = "../themes/";

   	if ($dh = opendir($dir)) {
       
       	while (($themedir = readdir($dh)) !== false) {
       	
           	
           	// Skip the . and .. directore
        		if ($themedir != "." && $themedir != ".." && $themedir != "index.html") {
           
					echo "
					<tr>
						<td align='center' width='15%'>";
						
						if ($themedir == $theme) {
						
							 echo "<input type='radio' name='newtheme' value='$themedir' checked>";
							 
						} else {
						
							echo "<input type='radio' name='newtheme' value='$themedir'>";
						
						}
						
						echo "
						</td>
						<td>$themedir</td>
					</tr>";
      
      		} 
      
       	}
       		
      	closedir($dh);
   	
   	}
		
		echo "
		</tr>
		</table>
		
		<table class='form_table'>
		<tr>
			<td align='right'><input type='submit' name='updatetheme' value='Select Theme'></td>
		</tr>
		</table>
		</form>";
									
				}
						
		} else {
			
			echo "
			<p class='error'>Only an administrator can change the program options.</p>
			<p class='error'><a href='prefs.php'>Go Back</a>";
		
		}	
		
// ************************************************************
//		Section Footer
// ************************************************************

	include("footer.php");
	
?>