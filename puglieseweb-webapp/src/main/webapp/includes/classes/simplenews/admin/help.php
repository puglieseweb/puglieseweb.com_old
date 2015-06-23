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
//		Help and Support
// ************************************************************	
			
	echo "
	<table class='topic'>
	<tr>
		<td>&nbsp; Help and Support</td>
	</tr>
	<table>

	<table class='form_table'>
	<tr>
		<td>
			If you are having any technical difficulties with SimpleNews, there are a few different support options available to you:
			<ul>
				<li> Support <a href='http://forums.chaoscontrol.org/viewforum.php?f=4' target='_blank'>Message Board</a>
				<li> Via <a href='mailto:support@chaoscontrol.org'>Email</a>
			</ul>
			Before contacting tech support, make sure you know your php and MySQL version numbers and also the platform it's hosted on (i.e. Microsoft IIS or Unix Apache).
		</td>
	</tr>
	</table>";

// ************************************************************
//		Version Check
// ************************************************************	

	// File with latest version number
	$check = "http://simplenews.chaoscontrol.org/version_check/simplenews";
			
	// Open file
	if ($open = @fopen($check, 'r')) {
			
		$latest	= @fread($open, 100);
			
		if ($version != $latest) {
			
			$message = "
			<p>Your installation is out of date. The latest version is: $latest</p>
			<p><a href='http://simplenews.chaoscontrol.org/index.php#downloads'>Click here</a> to download it.</p>";
				
		} else {
			
			$message = "<p>You have SimpleNews" . $version . ". This is the latest release.</p>";
			
		}
				
	} else {
			
		$message = "<p><i>Service is unavailable</i></p>";

	}
			
	echo "
	<table class='topic'>
	<tr>
		<td>&nbsp; Version Check</td>
	</tr>
	<table>

	<table class='form_table'>
	<tr>
		<td align='center'>$message</td>
	</tr>
	</table>";
			
// ************************************************************
//		Doate
// ************************************************************	
			
	echo "
	<table class='topic'>
	<tr>
		<td>&nbsp; Donate To The Project</td>
	</tr>
	<table>

	<table class='form_table'>
	<tr>
		<td>
			<p>SimpleNews was written on 100% open source software and is provided free of charge under the GNU Public License. But free for you means expenses for us. :(</p>
			
			<p>The success of an open source project is dependent on it's community. If everyone contributes to the project, the community flourishes. The developers have donated 
				their time and talent in building this project so if you find SimpleNews useful, why not donate a few bucks to help us with the web hosting and bandwidth expenses? -- 
				and maybe even the occasional trip to the local pub to help keep our sanity ;)</p>
				
			<p>If you use any SimpleNews on your web site, why not donate a few bucks? Donations this script under continued development, pay for my web hosting bill, and support the occasional trip to the local pub ;)</p>
		
			<p>You can donate via <a href='http://www.paypal.com' target='blank'>PayPal</a> with the button below.</p>
					
			<div align='center'>
			<form action=https://www.paypal.com/cgi-bin/webscr method=post>
				<input type=hidden name=cmd value=_xclick>
				<input type=hidden name=business value=chris@chaoscontrol.org>
				<input type=hidden name=item_name value=PHP Script Donation>
				<input type=hidden name=no_shipping value=1>
				<input type=hidden name=return value=http://www.chaoscontrol.org/paypal.php>
				<input type=hidden name=no_note value=1>
				<input type=hidden name=currency_code value=USD>
				<input type=hidden name=tax value=0>
				<input type=image src=https://www.paypal.com/images/x-click-but21.gif border=0 name=submit alt=Make payments with PayPal - its fast, free and secure!>
			</form>
			</div>
			<p>You can also donate to SimpleNews in many other non-monetary ways. You can help us track down bugs, submit patches and add-on modules, create themes, translate documentation, and also by telling your friends about the project ;)</p>
			Thanks!
		</td>
	</tr>	
	</table>";
			
// ************************************************************
//		Section Footer
// ************************************************************
	
	include("footer.php");
	
?>