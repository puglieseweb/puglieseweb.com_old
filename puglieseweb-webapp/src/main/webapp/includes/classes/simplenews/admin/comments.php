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
//		Delete Comments
// ************************************************************
		
	if ($action == "delete") {
	
		$news_id = $_GET['news_id'];
		$comment = $_GET['comment'];
		
		// Check access
		if ($sn_userlevel == 3) {
		
			echo "
			<p class='error'>You don't have access to delete comments.</p>
			<p class='error'><a href='comments.php?news_id=$news_id'>Go Back</a></p>";
		
		} else {
		
			$query = "DELETE FROM simplenews_comments WHERE comment_id = '$comment' LIMIT 1";
			$result = mysql_query($query) or die (mysql_query());
			
			echo "
			<p class='error'>The comment has been deleted.</p>
			<p class='error'><a href='comments.php?news_id=$news_id'>Go Back</a></p>";
		
		}
	
	} else {

// ************************************************************
//		View Comments
// ************************************************************

		$news_id = $_GET['news_id'];
		
		if (empty($news_id)) {
		
			echo "
			<p class='error'><a href='article.php'>Click here</a> to choose a news article you want to view comments from.</p>";
			
		} else {

			$query = "SELECT * FROM simplenews_comments WHERE news_id = '$news_id' ORDER BY comment_id";
			$result = mysql_query($query) or die (mysql_error());
			
			$rows = mysql_num_rows($result);
			
			if ($rows == 0) {
			
				echo "
				<p class='error'>There are no comments for this article.</p>
				<p class='error'><a href='article.php'>Go Back</a></p>";
				
			} else {
		
				while ($data = mysql_fetch_array($result)) {
		
					$comment_id	= $data['comment_id'];
					$guest		= $data['guest'];
					$guest_ip	= $data['guest_ip'];
					$date			= $data['date'];
					$email		= $data['email'];
					$text			= $data['comment'];
					$text			= strip_html($text);
					//$text			= bbcode($text);
					$text			= nl2br($text);
					$comment		= stripslashes($text);
					
					// Hyper-link guest if email address is present
					if (!empty($email)) {
						
						$guest = "<a href='mailto:$email'>$guest</a>";
							
					}
						
					echo "
					<table class='topic'>
					<tr>
						<td width='85%'>Comment by: $guest (<i>$guest_ip</i>) on $date</td>
						<td width='15%' align='center'>
							<a href='comments.php?action=delete&comment=$comment_id&news_id=$news_id'><img src='images/delete.gif' alt='Delete Comment' border='0'></a>
							 &nbsp;&nbsp; 
							<a href='ban.php?comban=$guest_ip'><img src='images/ban.png' alt='Ban $guest_ip' border='0'></a>
						</td>
					</tr>
					<table>
	
					<table class='form_table'>
					<tr>
						<td>$comment</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					</table>";
			
				}
					
			}
	
		}
		
	}
	
// ************************************************************
//		Section Footer
// ************************************************************
	
	include("footer.php");
	
?>