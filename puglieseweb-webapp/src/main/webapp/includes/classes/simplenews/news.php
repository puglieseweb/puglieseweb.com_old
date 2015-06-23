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

	include("includes/dbconnect.php");	// MySQL Connection Settings
	include("includes/settings.php");	// Site Wide Settings & Variables
	include("includes/functions.php");	// php Functions
	
// ************************************************************
//		Check for 'setup' directory
// ************************************************************

	setup_chk();

// ************************************************************
//		Header Display (optional)
// ************************************************************

	// Theme Template Variables -- These Get Replaced
	$themevars = (array("{PHP_SELF}","{THEME}",));
	
	// Replace Theme Template Variables With These
	$replacevars = (array($php_self, $theme));

	// Template File to Use
	$template = "./simplenews/themes/$theme/header.tpl";

	// Call Template Parsing Function
	page_parse($template,$themevars,$replacevars);

// ************************************************************
//		The following code initiates the archive page numbers at
//		the bottom of the news page - Part 1.
//	
//		$postlimit is the number of news articles to display per
//		page.
// ************************************************************

	$query = "SELECT news_id FROM simplenews_articles";
	$result = mysql_query($query) or die (mysql_error());
	
	// Total Number of news articles
	$newsrows = mysql_num_rows($result);
	
	// Offset is used later
	if (empty($offset)) {
	
		$offset = "0";
		
	}
	
// ************************************************************
//		If no articles have been created, display a notice.
// ************************************************************

	if ($newsrows == 0) {
	
		// Theme Template Variables -- These Get Replaced
		$themevars = (array("{PHP_SELF}","{THEME}",));
		
		// Replace Theme Template Variables With These
		$replacevars = (array($php_self, $theme));
	
		// Template File to Use
		$template = "./simplenews/themes/$theme/no_articles.tpl";
	
		// Call Template Parsing Function
		page_parse($template,$themevars,$replacevars);
	
	} else {

// ************************************************************
//		Get news articles from SQL.
//
//		If comments, full article, or email form are to be 
//		displayed, the query will be different; only one article 
//		will be selected.
// ************************************************************

		if ($action == "comments" || $action == "article" || $action == "email") {
		
			$query = "SELECT * FROM simplenews_articles WHERE news_id = '$news_id' LIMIT 1";
			$result = mysql_query($query) or die (mysql_error());
				
		} else {
	
			// Get all non-sticky news articles
			$query = "SELECT * FROM simplenews_articles WHERE sticky = 'off' OR sticky = '' ORDER BY news_id DESC LIMIT $offset,$postlimit";
			$result = mysql_query($query) or die (mysql_error());
	
// ************************************************************
//		Display the sticky post (if there is one) and 
//		if comments/email/article are not being viewed.
// ************************************************************	

			$query = "SELECT * FROM simplenews_articles WHERE sticky = 'on' ";
			$sticky = mysql_query($query) or die (mysql_error());
			
			while ($data = mysql_fetch_assoc($sticky)) {
			
				$news_id = $data['news_id'];
				$title = $data['title'];
				$poster = $data['poster'];
				$date = $data['date'];
				$topic_id = $data['topic'];
				$text = $data['snippet'];
				$snippet = bbcode($text);
				$snippet = nl2br($snippet); 
				$snippet = stripslashes($snippet);
				
				// Get Topic Image
				$query = "SELECT icon FROM simplenews_topics WHERE topic_id = '$topic_id'";
				$res = mysql_query($query) or die (mysql_error());
				$dat = mysql_fetch_assoc($res);
				
				$icon = $dat['icon'];
	
// ************************************************************
//		Sticky Post Template Code
// ************************************************************	

			// Theme Template Variables -- These Get Replaced
			$themevars = (array(
				"{TITLE}",
				"{POSTER}",
				"{TIMESTAMP}",
				"{TOPIC_ICON}",
				"{SNIPPET}",
				"{THEME}"));
				
			// Replace Theme Template Variables With These
			$replacevars = (array($title, $poster, $date, $icon, $snippet, $theme));
	
			// Template File to Use
			$template = "./simplenews/themes/$theme/sticky.tpl";
		
			// Call Template Parsing Function
			page_parse($template,$themevars,$replacevars);
			
			}
			
		}
		
// ************************************************************
//		Begin loop to display articles until $postlimit is 
//		reached.
// ************************************************************

		while ($data = mysql_fetch_assoc($result)) {
		
			$news_id = $data['news_id'];
			$title = $data['title']; 
			$poster = $data['poster'];
			$date = $data['date'];
			$topic_id = $data['topic'];
			
			// Get Topic Icon
			$query = "SELECT icon FROM simplenews_topics WHERE topic_id = '$topic_id'";
			$res = mysql_query($query) or die (mysql_error());
			$dat = mysql_fetch_assoc($res);
			
			$icon = $dat['icon'];
	
// ************************************************************
//		Count the number of comments associated with each 
//		article.
// ************************************************************

			$query = "SELECT comment_id FROM simplenews_comments WHERE news_id = '$news_id'";
			$comments = mysql_query($query);
			
			// Total Comments
			$comments = mysql_num_rows($comments);
			
// ************************************************************
// 	Set some variables for the HTML output
// ************************************************************

			if ($action == "article") {
		
				// Snippet
				$text		= $data['snippet'];
				$text		= bbcode($text);
				$text		= nl2br($text);
				$snippet = stripslashes($text);
			
				// Full Article
				$text		= $data['article'];
				$text		= bbcode($text);
				$text	= nl2br($text);
				$article = stripslashes($text);
				
				$full_article 	= $data['article'];
				
			} else if ($action == "email" || $action == "comment") {
			
				// Snippet
				$text		= $data['snippet'];
				$full_article 	= $data['article'];
				$text				= bbcode($text);
				$text				= nl2br($text);
				$snippet 		= stripslashes($text);
			
			} else {
		
				// Snippet		
				$text				= $data['snippet'];
				$full_article 	= $data['article'];
				$text				= bbcode($text);
				$text				= nl2br($text);
				$snippet 		= stripslashes($text);
				
			}

			// If there is a full article, this will create a link to it
			if (!empty($full_article)) {
		
				$full_link = "&nbsp;<a href='$PHP_SELF?action=article&news_id=$news_id'>Full Article</a>";
				$full_article = "";

			} else {

				// No link
				$full_link = "";
	
			}

// ************************************************************
//		Output template for each news article.
// ************************************************************	

			// Theme Template Variables -- These Get Replaced
			$themevars = (array(
				"{PHP_SELF}",
				"{NEWS_ID}",
				"{POSTER}",
				"{TITLE}",
				"{TIMESTAMP}",
				"{SNIPPET}",
				"{ARTICLE}",
				"{NUM_COMMENTS}",
				"{THEME}",
				"{TOPIC_ICON}",
				"{FULL_ARTICLE_LINK}"));
			
			// Replace Theme Template Variables With These
			$replacevars = (array($php_self, $news_id, $poster, $title, $date, $snippet, $article, $comments, $theme, $icon, $full_link));
		
			// Template File to Use
			$template = "./simplenews/themes/$theme/article.tpl";
		
			// Call Template Parsing Function
			page_parse($template,$themevars,$replacevars);
			
// ************************************************************
// 	Email Link to Friend Code
// ************************************************************		
	
			if ($action == "email") {
		
				// Check if email is allowed
				if ($allow_email == "on") {
			
					// Process form on submition; check for errors, if there are none - send it!
					if (isset($submit)) {
			
						$name	= $_POST['name'];
						$email = $_POST['email'];
						$sendemail = $_POST['sendemail'];
					
						// Check for empty fields.
						if (empty($name)) {
			
							echo "<div align='center'>You must enter your name.<p><a href='$PHP_SELF?action=email&news_id=$news_id'>Go Back</a></div>";
				
						} else if (empty($email)) {
			
							echo "<div align='center'>You must enter your email address.<p><a href='$PHP_SELF?action=email&news_id=$news_id'>Go Back</a></div>";
				
						} else if (empty($sendemail)) {
			
							echo "<div align='center'>You must enter your friend's email address.<p><a href='$PHP_SELF?action=email&news_id=$news_id'>Go Back</a></div>";
			
						} else {
				
							// No errors, prep email
							$query = "SELECT news_id,title,snippet FROM simplenews_articles WHERE news_id = '$news_id'";
							$result = mysql_query($query) or die (mysql_error());
							$data = mysql_fetch_assoc($result);
						
							$news_id	= $data['news_id'];
							$title = $data['title'];
							$snippet	= $data['snippet'];
							$snippet	= stripslashes($snippet);
							$link	= 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; 
							$linkvars = "?action=article&news_id=$news_id";
							$url = "$link$linkvars";
							$subject	= $title;
							$message	= "
					
From: $name ($email)

$name thought you'd be insterested in this article on our web site: 

$title

Click on this link to read the article: 

$url

 *Please note that this is not spam and you have not been added to any email lists.

";
							// Send message
							mail($sendemail, $subject, $message, "From: $email");
	
							echo "<div align='center'>Your message to " . $sendemail . "has been sent!</div>";
				
						}
							
					} else {
			
// ************************************************************
// 	Email Form
// ************************************************************	
		
						// Theme Template Variables -- These Get Replaced
						$themevars = (array(
							"{PHP_SELF}",
							"{NEWS_ID}",
							"{THEME}"));
				
						// Replace Theme Template Variables With These
						$replacevars = (array(
							$php_self, $news_id, $theme));
				
						// Template File to Use
						$template = "./simplenews/themes/$theme/email_form.tpl";
		
						// Call Template Parsing Function
						page_parse($template,$themevars,$replacevars);
				
					}
					
				} else { 
				
					echo "<div align='center'>Article link emailing has been disabled.</div>"; 
				
				}
				
			} 
		
		}
	
// ************************************************************
//		Process comment submition
// ************************************************************
	
		if ($action == "comments") {
	
			// Check if comments are allowed
			if ($allow_comments == "on") {

				if (isset($submit)) {
		
					// IP of comment poster
					$ip = $_SERVER['REMOTE_ADDR'];
				
					// Check if IP is on the banned list
					$query = "SELECT banned_ip FROM simplenews_banned WHERE banned_ip = '$ip'";
					$result = mysql_query($query) or die (mysql_error());
			
					$rows = mysql_num_rows($result);
			
					// Allow comment if no rows are returned
					if ($rows == 0) {
					
						$username = $_POST['username'];
						$comment	= $_POST['comment'];
						$comment = htmlentities($comment);
						$email = $_POST['email'];
						$count = strlen($comment);
						$comment	= addslashes($comment);
						$username = addslashes($username);
						$email = addslashes($email);
	
						$date	= date("F j, Y, g:i a", time());
				
						// Check if article exists
						$query = "SELECT news_id FROM simplenews_articles WHERE news_id = '$news_id'";
						$result = mysql_query($query) or die (mysql_error());
						$rows = mysql_num_rows($result);
					
						if ($rows != 0) {
				
							// Check for empty fields
							if (empty($username)) {
				
								echo "<div align='center'>Username is a required field.<p><a href='$PHP_SELF?action=comments&news_id=$news_id'>Go Back</a></div>";
			
							} else if (empty($comment)) {
			
								echo "<div align='center'>Comment is a required field.<p><a href='$PHP_SELF?action=comments&news_id=$news_id'>Go Back</a></div>";
			
							} else if ($count > $com_size) {

								echo "<div align='center'>Your comment must be fewer then " . $com_size . " characters, it's " . $count . ".<p><a href='$PHP_SELF?action=comments&news_id=$news_id'>Go Back</a></div>";

							} else {
			
								// Add comment
								$query	= "INSERT INTO simplenews_comments (news_id, guest, email, date, comment, guest_ip) VALUES ('$news_id', '$username', '$email', '$date', '$comment', '$ip')";
								$result	= mysql_query($query) or die (mysql_error());
							
								echo "<div align='center'>Thanks $username, your comment was added succesfully!<p><a href='$PHP_SELF?action=comments&news_id=$news_id'>View Your Comment</a></div>";
					
							}
					
						} else {
				
							echo "<div align='center'>It doesn't look like that news article exists.<p><a href='$PHP_SELF'>Go Back</a></div>";
				
						}
				
					// Comment rejected -- user(IP) was banned
					} else {
				
						echo "<div align='center'>You have been banned from posting any comments.<br> If you feel this is in error, please contact the site's administrator.</div>";
			
					}
	
// ************************************************************
//		Display the article's comments if submit was not clicked
// ************************************************************

				} else {	
	
					$query = "SELECT * FROM simplenews_comments WHERE news_id = '$news_id' ORDER BY comment_id";
					$result = mysql_query($query)or die (mysql_error());
			
					while ($data = mysql_fetch_array($result)) {
			
						$comment_id	= $data['comment_id'];
						$guest		= $data['guest'];
						$guest		= stripslashes($guest);
						$date		= $data['date'];
						$email		= $data['email'];
						$email		= stripslashes($email);
						$text		= $data['comment'];
						$text		= stripslashes($text);
						$text		= bbcode($text);
						$text		= nl2br($text);
				
						// If the bad word filter is enabled, parse comment text.
						if ($wordfilter == "on") {
		
							// Filtered
							$comment = word_filter($text);
		
						} else {
		
							// No Filtering
							$comment = $text;
			
						}
						
						// Hyper-link guest if email address is present
						if (!empty($email)) {
						
							$guest = "<a href='mailto:{EMAIL}'>$guest</a>";
					
						}
					
						// Theme Template Variables -- These Get Replaced
						$themevars = (array(
							"{NEWS_ID}",
							"{GUEST}",
							"{COMMENT}",
							"{TIMESTAMP}",
							"{EMAIL}",
							"{THEME}"));
				
						// Replace Theme Template Variables With These
						$replacevars = (array(
							$news_id, $guest, $comment, $date, $email, $theme));
			
						// Template File to Use
						$template = "./simplenews/themes/$theme/comments.tpl";
		
						// Call Template Parsing Function
						page_parse($template,$themevars,$replacevars);
			
					}
	
// ************************************************************
//		Display the Add Comments form
// ************************************************************

					// Theme Template Variables -- These Get Replaced
					$themevars = (array(
						"{PHP_SELF}",
						"{NEWS_ID}",
						"{COMMENT_SIZE}",
						"{THEME}"));
				
					// Replace Theme Template Variables With These
					$replacevars = (array(
						$php_self,$news_id, $com_size, $theme));
			
					// Template File to Use
					$template = "./simplenews/themes/$theme/comment_form.tpl";
			
					// Call Template Parsing Function
					page_parse($template,$themevars,$replacevars);
		
				} 	
				
			} else {
		
				echo "<div align='center'>Article commenting has been disabled.</div>";
			
			}

		} 
	
// ************************************************************
//		Display News Archive page numbers - Part 2.
//
//		Only display page numbers on main news page.
// ************************************************************
	
		if (!isset($action)) {

			$pages = intval($newsrows / $postlimit);
	
			if ($newsrows % $postlimit) {
		    
 	  			$pages++;
	
			}	
		
			echo "<div align='center'>";
		
			//prev
			if($offset > 0) {
			
				$newoffset = ($offset - $postlimit);
	
				echo "<a href='$PHP_SELF?offset=$newoffset'><< Previous</a> | &nbsp;&nbsp;";
		
			}
			
			// Generate page links for 1 2 3 4 5 6 7 8 9 10
			$a = ceil($newsrows / $postlimit);
			$b = 0;
			$c = 1;
	
			while ($a > 0) {
	
				echo "&nbsp;[<a href='$PHP_SELF?offset=$b'>$c</a>]&nbsp;";
			
				$a--;
				$c++;
				$b = $b + $postlimit;
				
			}
		
			//Next
			if($newsrows > ($offset + $postlimit)) {
		
				$newoffset = ($offset + $postlimit);
		
				echo "&nbsp;&nbsp; | <a href='$PHP_SELF?offset=$newoffset'> Next >></a>"; 
		
			}
		
			echo "</div>";
	
		}
		
// ************************************************************
//		Display the footer
// ************************************************************
	
			// Theme Template Variables -- These Get Replaced
			$themevars = (array(
				"{VERSION}",
				"{THEME}"));
			
			// Replace Theme Template Variables With These
			$replacevars = (array(
				$version, $theme));
		
			// Template File to Use
			$template = "./simplenews/themes/$theme/footer.tpl";
		
			// Call Template Parsing Function
			page_parse($template,$themevars,$replacevars);	
	
	}
?>