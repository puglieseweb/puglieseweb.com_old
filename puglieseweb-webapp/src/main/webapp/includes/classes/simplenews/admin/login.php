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
//		Display login form
// ************************************************************

		echo"
		<form action='../includes/submit-login.php' method='post'>
		<table align='center' bgcolor='#333333' border='0' width='600' cellspacing='1' cellpadding='0'>
		<tr>
			<td bgcolor='#E5E5E5'><b>&nbsp;&nbsp;Login</b></td>
		</tr>
		<tr>
			<td bgcolor='#FFFFFF'>
			
			<table border='0' width='90%' align='center' cellspacing='4' cellpadding='4'>
			<tr>
				<td rowspan='3' align='center'><img src='../images/info.gif'></td>
				<td width='100'><b>Username</b></td>
				<td><input type='text' size='25' name='username'></td>
			</tr>
			<tr>
				<td><b>Password</b></td>
				<td><input type='password' size='25' name='password'></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type='submit' name='submit' value='Login' size='25'>&nbsp;&nbsp;&nbsp;<input type='reset' name='clear' value='Clear' size='25'></td>
			</tr>
			</table>
			
			</td>
		</tr>
		</table>
		</form>	
		<br>";
?>