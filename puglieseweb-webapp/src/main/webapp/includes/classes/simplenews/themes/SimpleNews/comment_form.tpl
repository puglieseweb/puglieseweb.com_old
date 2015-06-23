<!-- Don't Remove JavaScript Code - Required for form to work correctly -->
<script language="JavaScript">
	function insertbbcodecomment(bbcode) {
		if (document.form.comment.createTextRange && document.form.comment.caretPos) {
			var caretPos = document.form.comment.caretPos;
			caretPos.text = caretPos.text.charAt(caretPos.text.length - 1) == ' ' ? bbcode + ' ' : bbcode;
			document.form.comment.focus();
		} else {
			document.form.comment.value+=bbcode;
			document.form.comment.focus();
		}
	}
</script>
<!-- End JavaScript Code-->

<form name='form' action='{PHP_SELF}?action=comments&news_id={NEWS_ID}' method='post'>
<table border='0' bgcolor='#D2D2D2' width='100%' cellspacing='1' cellpadding='4'>
<tr>
	<td background='./simplenews/themes/{THEME}/images/bg.gif' colspan='2'><b>Add Comments</b></td>
</tr>
<tr>
	<td bgcolor='#FFFFFF'>
	<table border='0' align='center' cellspacing='2' cellpadding='2'>
	<tr>
		<td width='30%'>Username</td>
		<td colspan='2'><input type='text' name='username' size='25'></td>

	</tr>
	<tr>
		<td>Email</td>
		<td colspan='2'><input type='text' name='email' size='25'></td>
	</tr>
	<tr> 
		<td height='25'>&nbsp;</td>
		<td height='25' colspan='2'>
	     	<a href='Javascript:insertbbcodecomment("[b][/b]")'><img src='./simplenews/themes/{THEME}/images/icon_editor_bold.gif' align='middle' border='0' title='Bold Text' /></a>
        	<a href='Javascript:insertbbcodecomment("[i][/i]")'><img src='./simplenews/themes/{THEME}/images/icon_editor_italicize.gif' align='middle' border='0' title='Italics Text' /></a>
         <a href='Javascript:insertbbcodecomment("[u][/u]")'><img src='./simplenews/themes/{THEME}/images/icon_editor_underline.gif' align='middle' border='0' title='Underline Text' /></a>
			&nbsp;
			<a href='Javascript:insertbbcodecomment("[left][/left]")'><img src='./simplenews/themes/{THEME}/images/icon_editor_left.gif' align='middle' border='0' title='Left Alignment' /></a>
        	<a href='Javascript:insertbbcodecomment("[center][/center]")'><img src='./simplenews/themes/{THEME}/images/icon_editor_center.gif' align='middle' border='0' title='Center Alignment' /></a>
         <a href='Javascript:insertbbcodecomment("[right][/right]")'><img src='./simplenews/themes/{THEME}/images/icon_editor_right.gif' align='middle' border='0' title='Right Alignment' /></a>
		</td>
	</tr>
	<tr>
		<td height='25'>&nbsp;</td>
		<td height='25' colspan='2'>
			<a href='Javascript:insertbbcodecomment("[:)]")'><img src='./simplenews/themes/{THEME}/images/emoticons/smile.gif' hspace='2' vspace='2' align='middle' border='0' title='Happy [:)]' /></a>
			<a href='Javascript:insertbbcodecomment("[:(]")'><img src='./simplenews/themes/{THEME}/images/emoticons/frown.gif' hspace='2' vspace='2' align='middle' border='0' title='Sad [:{]' /></a>
       	<a href='Javascript:insertbbcodecomment("[;)]")'><img src='./simplenews/themes/{THEME}/images/emoticons/wink.gif' hspace='2' vspace='2' align='middle' border='0' title='Wink [;)]' /></a>
       	<a href='Javascript:insertbbcodecomment("[:D]")'><img src='./simplenews/themes/{THEME}/images/emoticons/grin.gif' hspace='2' vspace='2' align='middle' border='0' title='Big Grin [:D]' /></a>
       	<a href='Javascript:insertbbcodecomment("[:p]")'><img src='./simplenews/themes/{THEME}/images/emoticons/tongue.gif' hspace='2' vspace='2' align='middle' border='0' title='Tongue [:p]' /></a>
			<a href='Javascript:insertbbcodecomment("[8)]")'><img src='./simplenews/themes/{THEME}/images/emoticons/cool.gif' hspace='2' vspace='2' align='middle' border='0' title='Cool [8)]' /></a>
			<a href='Javascript:insertbbcodecomment("[:o]")'><img src='./simplenews/themes/{THEME}/images/emoticons/eek.gif' hspace='2' vspace='2' align='middle' border='0' title='Suprised [:o]' /></a>
       	<a href='Javascript:insertbbcodecomment("[:mad:]")'><img src='./simplenews/themes/{THEME}/images/emoticons/mad.gif' hspace='2' vspace='2' align='middle' border='0' title='Mad [>(]' /></a>
       	<a href='Javascript:insertbbcodecomment("[:light:]")'><img src='./simplenews/themes/{THEME}/images/emoticons/light.gif' hspace='2' vspace='2' align='middle' border='0' title='Light Bulb' /></a>
       	<a href='Javascript:insertbbcodecomment("[:thumbup:]")'><img src='./simplenews/themes/{THEME}/images/emoticons/thumbup.gif' hspace='2' vspace='2' align='middle' border='0' title='Thumbs Up' /></a>
       	<a href='Javascript:insertbbcodecomment("[:warning:]")'><img src='./simplenews/themes/{THEME}/images/emoticons/warning.gif' hspace='2' vspace='2' align='middle' border='0' title='Warning' /></a>
       	<a href='Javascript:insertbbcodecomment("[:thumbdown:]")'><img src='./simplenews/themes/{THEME}/images/emoticons/thumbdown.gif' hspace='2' vspace='2' align='middle' border='0' title='Thumbs Down' /></a>
       	<a href='Javascript:insertbbcodecomment("[:page:]")'><img src='./simplenews/themes/{THEME}/images/emoticons/page.gif' hspace='2' vspace='2' align='middle' border='0' title='Page' /></a>
       	<a href='Javascript:insertbbcodecomment("[:question:]")'><img src='./simplenews/themes/{THEME}/images/emoticons/question.gif' hspace='2' vspace='2' align='middle' border='0' title='Question' /></a>
		</td>
	</tr>
	<tr> 
		<td>Comment</td>
	   <td colspan='3'><textarea name='comment' rows='10' cols='50'></textarea></td>
	</tr>
	<tr>
		<td height='25'>&nbsp;</td>
		<td colspan='2'>Your comment can be a maximum of {COMMENT_SIZE} characters.</td>
	</tr>
	</table>

	</td>
</tr>
<tr>
	<td align='right' bgcolor='#FFFFFF'>
		<input type='submit' name='submit' value='Submit Comment'>
		<input type='reset' name='reset' value='Clear Form'>
	</td>
</tr>
</table>
</form>