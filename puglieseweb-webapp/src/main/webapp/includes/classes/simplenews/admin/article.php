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
//		Variables
// ************************************************************	

	$mass_action = $_POST['mass_action'];
		
// ************************************************************
//		Section Header
// ************************************************************	
			
	echo "
	<table class='main_table'>
	<tr>
		<td>";

// ************************************************************
//		Add News Article
// ************************************************************

	if ($action == "addnews") {
		
		// Process Add News Submition
		if (isset($submit)) {
		
			// Form post variables
			$poster		= $_POST['poster'];
			$title		= $_POST['title'];
			$sticky		= $_POST['sticky'];
			$snippet	= $_POST['snippet'];
			$article	= $_POST['article'];
			$topic_id	= $_POST['topic'];
				
			if (empty($poster)) {
			
				$poster = $sn_user;
				
			}                                                                                             
			
			// Current Time
			$timestamp	= date("F j, Y, g:i a", time());
			
			// Add slashes for ' and "
			$snippet	= addslashes($snippet);
			$article	= addslashes($article);
			
			// Check for required fields
			if ((empty($title)) || (empty($topic_id)) || (empty($snippet))) {
				
				echo "
				<p class='error'><i>Title</i>, <i>Topic</i>, and <i>Snippet</i> are required fields.</p>
				<p class='error'><a href='article.php?action=addnews'>Go Back</a></p>";
				
			} else {
			
				$news_id = $_GET['edit'];
						
				if (isset($sticky)) {
				
					// Check Access
					if (($sn_userlevel == 1) OR ($sn_userlevel == 2)) {
							
						//Remove sticky from other posts
						$query = "UPDATE simplenews_articles SET sticky = 'off' WHERE sticky = 'on'";
						$result = mysql_query($query) or die (mysql_error());			
							
					} else { 
					
						echo "
						<p class='error'>You don't have access to to create sticky posts.</p>
						<p class='error'><a href='article.php?action=addnews'>Go Back</a></p>";
		
					}
						
				}
				
				if (!empty($news_id)) {
					
					// Check Access
					if ((($sn_user == $poster) OR ($sn_userlevel == 1) OR ($sn_userlevel == 2))) {
					
						// Update Edited Article
						$query = "UPDATE simplenews_articles SET poster = '$poster', title = '$title', sticky = '$sticky', snippet = '$snippet', article = '$article', topic = '$topic_id' WHERE news_id = '$news_id'";
						$result	= mysql_query($query) or die (mysql_error());
											
						echo "
						<p class='error'>The news article has been updated.</p>
						<p class='error'><a href='article.php'>Go Back</a></p>";
			
					} else {		
					
						echo "
						<p class='error'>You don't have access to edit this post.</p>
						<p class='error'><a href='article.php'>Go Back</a></p>";
							
					}
							
				} else {
					
					//Insert new article
					$query = "INSERT INTO simplenews_articles (poster, title, sticky, snippet, article, date, topic) VALUES ('$poster', '$title', '$sticky', '$snippet', '$article', '$timestamp', '$topic_id')";
					$result = mysql_query($query) or die (mysql_error());
							
					echo "
					<p class='error'>The news article <i>$title</i> been added.</p>
					<p class='error'><a href='article.php'>Go Back</a></p>";
				
				}
			
			}

// ************************************************************
//		If 'Edit Article', open the article with the values
//		filled in in Add Article form.
// ************************************************************
		
		} else {
		
			// Not a new post
			if (!empty($_GET['edit'])) {
		
				//article number to be edited
				$news_id = $_GET['edit'];

				// Get article
				$query = "SELECT * FROM simplenews_articles WHERE news_id = '$news_id'";
				$result = mysql_query($query) or die (mysql_error());
				$data = mysql_fetch_assoc($result);
				
				$title		= $data['title'];
				$sticky		= $data['sticky'];
				$poster		= $data['poster'];
				$snippet	= $data['snippet'];
				$snippet	= stripslashes($snippet);
				$article	= $data['article'];
				$timestamp	= $data['date'];
				$topic_id	= $data['topic'];
				$edit		= "$news_id";
				
				// Get Topic
				$query = "SELECT topic FROM simplenews_topics WHERE topic_id = '$topic_id'";
				$result = mysql_query($query) or die (mysql_error());
				$data = mysql_fetch_assoc($result);
				
				$topic = $data['topic'];
				
			}

			// Add/Edit Article Form 
			echo "
			<form action='article.php?action=addnews&edit=$edit' method='post' name='form'>
			<table class='topic'>
			<tr>
				<td>&nbsp; Article Info</td>
			</tr>
			<table>
			
			<table class='form_table'>
			<tr>
				<td>&nbsp; Author</td>";
					
				// If $news_id, article is being edited - value will be different
				if (isset($news_id)) {
					
					echo "<td>$poster</td>";
					
				} else {
									
					echo "<td>$sn_user</td>";
					
				}
						
				echo "
				</tr>
				<tr>
					<td>&nbsp; Post Date</td>";
					
					if (isset($news_id)) {
						
						echo "<td>$timestamp</td>";
					
					} else {
								
						echo "<td><i>Article has not been posted yet.</i></td>";
					
					}
							
					echo "
					</tr>
					<tr>
						<td>&nbsp; Sticky Post</td>";
						
						if ($sn_userlevel == 3) {
						
							echo "<td><i>n/a</i></td>";
							
						} else {
					
							if ($sticky == "on") {
					
								echo "<td><input type='checkbox' checked name='sticky' size='25'></td>";
					
							} else {
						
								echo "<td><input type='checkbox' name='sticky' size='25'></td>";
						
							}
						
						}
							
						echo "
						<tr>
							<td>&nbsp; Article's Title</td>
							<td><input type='text' name='title' value='$title' size='25'></td>
						</tr>
						<tr>
							<td>&nbsp; Article's Topic</td>
							<td>
								<select name='topic'>";
								
								if (!empty($topic)) {
									
									echo "<option value='$topic_id'>$topic</option><option value=''> ----- </option>";
									
								} else {
								
									echo "<option value=''> - Choose - </option>";
								
								}
								
								$query = "SELECT * FROM simplenews_topics";
								$result = mysql_query($query) or die (mysql_error());
								
								while ($data = mysql_fetch_assoc($result)) {
								
									$topic_id	= $data['topic_id'];
									$topic 		= $data['topic'];
								
									echo "<option value='$topic_id'>$topic</option>";
									
								}
								
								echo "
								</select>
							</td>
						</tr>
						</table>
									
						<table class='topic'>
						<tr>
							<td>&nbsp; Article Snippet</td>
						</tr>
						<table>
			
						<table class='form_table'>
						<tr>
							<td></td>
							<td height='25' colspan='2'>
            			<a href='Javascript:insertbbcodesnippet(\"[b][/b]\")'><img src='../themes/$theme/images/icon_editor_bold.gif' align='middle' border='0' title='Bold Text' /></a>
            				<a href='Javascript:insertbbcodesnippet(\"[i][/i]\")'><img src='../themes/$theme/images/icon_editor_italicize.gif' align='middle' border='0' title='Italics Text' /></a>
               			<a href='Javascript:insertbbcodesnippet(\"[u][/u]\")'><img src='../themes/$theme/images/icon_editor_underline.gif' align='middle' border='0' title='Underline Text' /></a>
								&nbsp;
								<a href='Javascript:insertbbcodesnippet(\"[left][/left]\")'><img src='../themes/$theme/images/icon_editor_left.gif' align='middle' border='0' title='Left Alignment' /></a>
            				<a href='Javascript:insertbbcodesnippet(\"[center][/center]\")'><img src='../themes/$theme/images/icon_editor_center.gif' align='middle' border='0' title='Center Alignment' /></a>
               			<a href='Javascript:insertbbcodesnippet(\"[right][/right]\")'><img src='../themes/$theme/images/icon_editor_right.gif' align='middle' border='0' title='Right Alignment' /></a>
							</td>
						</tr>
						<tr>
							<td align='center'>
         					<a href='Javascript:insertbbcodesnippet(\"[:)]\")'><img src='../themes/$theme/images/emoticons/smile.gif' hspace='2' vspace='2' align='middle' border='0' title='Happy [:)]' /></a>
								<a href='Javascript:insertbbcodesnippet(\"[:(]\")'><img src='../themes/$theme/images/emoticons/frown.gif' hspace='2' vspace='2' align='middle' border='0' title='Sad [:{]' /></a>
           					<a href='Javascript:insertbbcodesnippet(\"[;)]\")'><img src='../themes/$theme/images/emoticons/wink.gif' hspace='2' vspace='2' align='middle' border='0' title='Wink [;)]' /></a>
         					<br>
         					<a href='Javascript:insertbbcodesnippet(\"[:D]\")'><img src='../themes/$theme/images/emoticons/grin.gif' hspace='2' vspace='2' align='middle' border='0' title='Big Grin [:D]' /></a>
           					<a href='Javascript:insertbbcodesnippet(\"[:p]\")'><img src='../themes/$theme/images/emoticons/tongue.gif' hspace='2' vspace='2' align='middle' border='0' title='Tongue [:p]' /></a>
								<a href='Javascript:insertbbcodesnippet(\"[8)]\")'><img src='../themes/$theme/images/emoticons/cool.gif' hspace='2' vspace='2' align='middle' border='0' title='Cool [8)]' /></a>
								<br>
								<a href='Javascript:insertbbcodesnippet(\"[:o]\")'><img src='../themes/$theme/images/emoticons/eek.gif' hspace='2' vspace='2' align='middle' border='0' title='Suprised [:o]' /></a>
         					<a href='Javascript:insertbbcodesnippet(\"[:mad:]\")'><img src='../themes/$theme/images/emoticons/mad.gif' hspace='2' vspace='2' align='middle' border='0' title='Mad [>(]' /></a>
         					<a href='Javascript:insertbbcodesnippet(\"[:light:]\")'><img src='../themes/$theme/images/emoticons/light.gif' hspace='2' vspace='2' align='middle' border='0' title='Light Bulb' /></a>
         					<br>
         					<a href='Javascript:insertbbcodesnippet(\"[:thumbup:]\")'><img src='../themes/$theme/images/emoticons/thumbup.gif' hspace='2' vspace='2' align='middle' border='0' title='Thumbs Up' /></a>
         					<a href='Javascript:insertbbcodesnippet(\"[:warning:]\")'><img src='../themes/$theme/images/emoticons/warning.gif' hspace='2' vspace='2' align='middle' border='0' title='Warning' /></a>
         					<a href='Javascript:insertbbcodesnippet(\"[:thumbdown:]\")'><img src='../themes/$theme/images/emoticons/thumbdown.gif' hspace='2' vspace='2' align='middle' border='0' title='Thumbs Down' /></a>
         					<br>
         					<a href='Javascript:insertbbcodesnippet(\"[:page:]\")'><img src='../themes/$theme/images/emoticons/page.gif' hspace='2' vspace='2' align='middle' border='0' title='Page' /></a>
         					<a href='Javascript:insertbbcodesnippet(\"[:question:]\")'><img src='../themes/$theme/images/emoticons/question.gif' hspace='2' vspace='2' align='middle' border='0' title='Question' /></a>
         				</td>
         				<td><textarea name='snippet' rows='10' cols='60'>$snippet</textarea></td>
						</tr>
						</table>
							
						<table class='topic'>
						<tr>
							<td>&nbsp; Full Article</td>
						</tr>
						<table>
			
						<table class='form_table'>
						<tr>
							<td></td>
							<td height='25' colspan='2'>
            				<a href='Javascript:insertbbcodearticle(\"[b][/b]\")'><img src='images/icon_editor_bold.gif' align='middle' border='0' title='Bold Text' /></a>
            				<a href='Javascript:insertbbcodearticle(\"[i][/i]\")'><img src='images/icon_editor_italicize.gif' align='middle' border='0' title='Italics Text' /></a>
           			   	<a href='Javascript:insertbbcodearticle(\"[u][/u]\")'><img src='images/icon_editor_underline.gif' align='middle' border='0' title='Underline Text' /></a>
								&nbsp;
								<a href='Javascript:insertbbcodearticle(\"[left][/left]\")'><img src='images/icon_editor_left.gif' align='middle' border='0' title='Left Alignment' /></a>
            				<a href='Javascript:insertbbcodearticle(\"[center][/center]\")'><img src='images/icon_editor_center.gif' align='middle' border='0' title='Center Alignment' /></a>
            		   	<a href='Javascript:insertbbcodearticle(\"[right][/right]\")'><img src='images/icon_editor_right.gif' align='middle' border='0' title='Right Alignment' /></a>
							</td>
						</tr>
						<tr>
							<td align='center'>
         					<a href='Javascript:insertbbcodearticle(\"[:)]\")'><img src='../themes/$theme/images/emoticons/smile.gif' hspace='2' vspace='2' align='middle' border='0' title='Happy [:)]' /></a>
								<a href='Javascript:insertbbcodearticle(\"[:(]\")'><img src='../themes/$theme/images/emoticons/frown.gif' hspace='2' vspace='2' align='middle' border='0' title='Sad [:{]' /></a>
           					<a href='Javascript:insertbbcodearticle(\"[;)]\")'><img src='../themes/$theme/images/emoticons/wink.gif' hspace='2' vspace='2' align='middle' border='0' title='Wink [;)]' /></a>
         					<br>
         					<a href='Javascript:insertbbcodearticle(\"[:D]\")'><img src='../themes/$theme/images/emoticons/grin.gif' hspace='2' vspace='2' align='middle' border='0' title='Big Grin [:D]' /></a>
           					<a href='Javascript:insertbbcodearticle(\"[:p]\")'><img src='../themes/$theme/images/emoticons/tongue.gif' hspace='2' vspace='2' align='middle' border='0' title='Tongue [:p]' /></a>
								<a href='Javascript:insertbbcodearticle(\"[8)]\")'><img src='../themes/$theme/images/emoticons/cool.gif' hspace='2' vspace='2' align='middle' border='0' title='Cool [8)]' /></a>
								<br>
								<a href='Javascript:insertbbcodearticle(\"[:o]\")'><img src='../themes/$theme/images/emoticons/eek.gif' hspace='2' vspace='2' align='middle' border='0' title='Suprised [:o]' /></a>
         					<a href='Javascript:insertbbcodearticle(\"[:mad:]\")'><img src='../themes/$theme/images/emoticons/mad.gif' hspace='2' vspace='2' align='middle' border='0' title='Mad [>(]' /></a>
         					<a href='Javascript:insertbbcodearticle(\"[:light:]\")'><img src='../themes/$theme/images/emoticons/light.gif' hspace='2' vspace='2' align='middle' border='0' title='Light Bulb' /></a>
         					<br>
         					<a href='Javascript:insertbbcodearticle(\"[:thumbup:]\")'><img src='../themes/$theme/images/emoticons/thumbup.gif' hspace='2' vspace='2' align='middle' border='0' title='Thumbs Up' /></a>
         					<a href='Javascript:insertbbcodearticle(\"[:warning:]\")'><img src='../themes/$theme/images/emoticons/warning.gif' hspace='2' vspace='2' align='middle' border='0' title='Warning' /></a>
         					<a href='Javascript:insertbbcodearticle(\"[:thumbdown:]\")'><img src='../themes/$theme/images/emoticons/thumbdown.gif' hspace='2' vspace='2' align='middle' border='0' title='Thumbs Down' /></a>
         					<br>
         					<a href='Javascript:insertbbcodearticle(\"[:page:]\")'><img src='../themes/$theme/images/emoticons/page.gif' hspace='2' vspace='2' align='middle' border='0' title='Page' /></a>
         					<a href='Javascript:insertbbcodearticle(\"[:question:]\")'><img src='../themes/$theme/images/emoticons/question.gif' hspace='2' vspace='2' align='middle' border='0' title='Question' /></a>
         				</td>
         				<td><textarea name='article' rows='10' cols='60'>$article</textarea></td>
						</tr>
						</table>				
					
					<table class='form_table'>
					<tr>
						<td align='right'>
							<input type='hidden' name='poster' value='$poster'>
							<input type='submit' name='submit' value='Post Article'>
							<input type='reset' name='reset' value='Start Over'>
						</td>
					</tr>
					</table>
					</form>";
	
			}
		
// ************************************************************
//		Delete News Article
// ************************************************************

	} else if (($action == "delete") || ($mass_action == "delete")) {
	
		// Get Variables
		$articles	= $_POST['articles'];
		
		if (!empty($articles)) {
		
			//Delete Article(s)
			foreach ($articles as $key => $news_id) {
			
				// Check to see who authored the article
				$query = "SELECT title,poster FROM simplenews_articles WHERE news_id = '$news_id'";
				$result = mysql_query($query) or die (mysql_error());
				$data = mysql_fetch_assoc($result);
				
				$poster	= $data['poster'];
				$title	= $data['title'];
			
				echo "<i>$title</i> has ";
				
				// Check Permissions
				if ($sn_userlevel == 1 || $sn_userlevel == 2 || $sn_user == $poster) {
						
					// Delete Article
					$query = "DELETE FROM simplenews_articles WHERE news_id = '$news_id' LIMIT 1";
					$result = mysql_query($query) or die (mysql_query());
					
					// Also delete it's comments
					$query = "DELETE FROM simplenews_comments WHERE news_id = '$news_id'";
					$result = mysql_query($query) or die (mysql_query());
					
					echo "been deleted.<br>";
					
				} else {
					
					echo "<u>not</u> been deleted. (Access Denied)<br>";
				
				}
			
			}
			
		} else {
		
			echo "<p class='error'>There were no articles to delete.</p>";
		
		}
			
			echo "<p class='error'><a href='article.php'>Go Back</a></p>";
								
// ************************************************************
//		List News Article
// ************************************************************
	
	} else {
	
		echo "
		<form action='article.php' method='post' name='editnews'>
		<table class='topic'>
		<tr>
			<td width='5%'><input type='checkbox' name='master_box' onclick='javascript:ckeck_uncheck_all()'></td>
			<td width='25%'><b>Title</b></td>
			<td width='10%'><b>Topic</b></td>
			<td width='15%'><b>Comments</b></td>
			<td width='15%'><b>Author</b></td>
			<td width='30%'><b>Date</b></td>
		</tr>
		<table>

		<table class='form_table'>";
		
		// Get All Articles From SQL
		$query = "SELECT * FROM simplenews_articles ORDER BY news_id DESC";
		$result = mysql_query($query) or die (mysql_error());
		
		while ($data = mysql_fetch_assoc($result)) {
			
			$news_id		= $data['news_id'];
			$poster		= $data['poster'];
			$date			= $data['date'];
			$title		= $data['title'];
			$topic_id 	= $data['topic'];
			$sticky		= $data['sticky'];
							
			// Get Number of Comments for each article	
			$query = "SELECT comment_id FROM simplenews_comments WHERE news_id = '$news_id'";
			$coms = mysql_query($query);
				
			$comments = mysql_num_rows($coms);
			
			// Get Topic
			$query = "SELECT topic FROM simplenews_topics WHERE topic_id = '$topic_id'";
			$res = mysql_query($query);
			$dat = mysql_fetch_assoc($res);
			
			$topic = $dat['topic'];
			

			
			echo "
			<tr>
				<td width='5%'><input type='checkbox' name='articles[]' value='$news_id'></td>
				<td width='25%'>";
			
			// Set Sticky Icon
			if ($sticky == "on") {
			
				echo "<img src = 'images/sticky.gif' border='0' align='absmiddle' alt='Sticky Post'>";
			
			}
			
			echo "
				<a href='article.php?action=addnews&edit=$news_id'>$title</a></td>
				<td width='10%'>$topic</td>
				<td width='15%'>&nbsp;($comments) <a href='comments.php?news_id=$news_id'>View</a></td>
				<td width='15%'>&nbsp;$poster</td>
				<td width='30%'>$date</td>
			</tr>";
			
		}
		
		echo "
		</table>
		
		<table class='form_table'>
		<tr>
			<td align='center'>With Selected:</td>
			<td>
				<select name='mass_action'>
					<option value='delete'>Delete</option>
				</select>
			</td>
			<td align='right'><input type='submit' name='submit' value='Make Changes'></td>
		</tr>
		</table>
		</form>";
		
	}
	
// ************************************************************
//		Section Footer
// ************************************************************

	include("footer.php");
	
?>