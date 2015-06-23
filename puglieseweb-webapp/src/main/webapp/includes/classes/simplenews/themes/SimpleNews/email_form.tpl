<form action='{PHP_SELF}?action=email&news_id={NEWS_ID}' method='post'>
<table border='0' bgcolor='#D2D2D2' width='100%' cellspacing='1' cellpadding='4'>
<tr>
	<td background='./simplenews/themes/{THEME}/images/bg.gif' colspan='2'><b>Email Article Link to a Friend</b></td>
</tr>
<tr>
	<td bgcolor='#FFFFFF'>
	<table border='0' align='center' cellspacing='2' cellpadding='2'>
	<tr>
		<td width='40%'>Your Name</td>
		<td><input type='text' name='name' size='25'></td>
	</tr>
	<tr>
		<td>Your E-Mail</td>
		<td><input type='text' name='email' size='25'></td>
	</tr>
	<tr>
		<td>Your Friend's E-Mail</td>
		<td><input type='text' name='sendemail' size='25'></td>
	</tr>
	</table>

	</td>
</tr>
<tr>
	<td align='right' bgcolor='#FFFFFF'>
		<input type='submit' name='submit' value='Send Email'>
		<input type='reset' name='reset' value='Clear Form'>
	</td>
</tr>
</table>
</form>