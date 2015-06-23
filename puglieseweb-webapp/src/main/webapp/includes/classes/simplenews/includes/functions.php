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

/************************************************************************
Function:	emoticons
Updated:		06/02/2003
Action:	 	1. Parses text string and replaces some text with images
Notes:		
To Do:  		Nothing
************************************************************************/

function bbcode($text) {

	$search	= array_keys($GLOBALS['bbcode']);
	$text	= str_replace($search, $GLOBALS['bbcode'], $text);
	return $text;
	
}

/************************************************************************
Function:	word_filter
Updated:		09/19/2004
Action		1. Replaces bad words with *s.
Notes:		Borrowed this one from Jeffrey Johns @ phpfreaks.com
To Do:  		Nothing
************************************************************************/

function word_filter($text) {
    $obscenities = array("fuck","shit"," bitch ","asshole", "cocksucker");
    foreach ($obscenities as $curse_word) {
        if (stristr(trim($text),$curse_word)) {
            $length = strlen($curse_word);
            for ($i = 1; $i <= $length; $i++) {
                $stars .= "*";
            }
            $text = eregi_replace($curse_word,$stars,trim($text));
            $stars = "";
        }
    }
    return $text;
} 

// ***********************************************************************
//
//		Function Name:		page_parse()
//		Date Modfied:		08.01.2004
//		Description: 		Parse the template page for theme variables.
//
// ***********************************************************************

function page_parse($template,$themevars,$replacevars) {

	// Load Template File into an Array
	$pparse = file($template);
	
	// Loop Through Array and Replace Template Variables; Echo Each Line of Template File
	foreach ($pparse as $line => $value) {

		$page = str_replace($themevars, $replacevars, $value);
		echo $page;
		
	}

}

// ***********************************************************************
//
//		Function Name:		setup_chk()
//		Date Modfied:		05.17.2005
//		Description: 		check for setup directory; warn user to remove
//							it if it exists.
//
// ***********************************************************************

function setup_chk() {

	$setupdir = "./simplenews/setup/";

	if (is_dir($setupdir) === TRUE) {

		echo "<p style='text-align:center; color:red'> Please remove the SimpleNews 'setup' directory.</p>";

	}

}
	
?>