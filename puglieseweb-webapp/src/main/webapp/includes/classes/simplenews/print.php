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
//		Get the news article to be printed
// ************************************************************

	$news_id = $_GET['news_id'];

	$query = "SELECT * FROM simplenews_articles WHERE news_id = '$news_id'";
	$result = mysql_query($query)or die (mysql_error());

	$data = mysql_fetch_assoc($result);

	$news_id	= $data['news_id'];
	$title		= $data['title']; 
	$poster		= $data['poster'];
	$timestamp	= $data['date'];

	// Snippet formatting
	$text = $data['snippet'];
	$text = nl2br($text);
	$text = bbcode($text);
	$snippet = stripslashes($text);

	// Article formatting
	$text = $data['article'];
	$text = nl2br($text);
	$text = bbcode($text);
	$article = stripslashes($text);

// ************************************************************
//		Print Template Code
// ************************************************************	

	// Theme Template Variables -- These Get Replaced
	$themevars = (array(
		"{TITLE}",
		"{POSTER}",
		"{TIMESTAMP}",
		"{SNIPPET}",
		"{ARTICLE}",
		"{THEME}"));
		
	// Replace Theme Template Variables With These
	$replacevars = (array(
		$title, $poster, $timestamp, $snippet, $article, $theme));
	
	// Template File to Use
	$template = "./themes/$theme/print.tpl";
	
	// Call Template Parsing Function
	page_parse($template,$themevars,$replacevars);
		
?>