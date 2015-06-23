<table border='0' bgcolor='#D2D2D2' width='100%' cellspacing='1' cellpadding='4'>
<tr>
	<td  background='./simplenews/themes/{THEME}/images/bg.gif' colspan='2'><b>{TITLE}</b><br />Posted by {POSTER} on {TIMESTAMP}</td>
</tr>
<tr>
	<td bgcolor='#FFFFFF' colspan='2'><img src='./simplenews/topics/{TOPIC_ICON}' hspace='10' vspace='10' border='0' align='right'>{SNIPPET}<br />{ARTICLE}</td>
</tr>
<tr>
	<td bgcolor='#FFFFFF' width='10%' align='center'>
		<a href='{PHP_SELF}?action=email&news_id={NEWS_ID}'><img src='./simplenews/themes/{THEME}/images/email.gif' hspace='2' border='0' align='middle' alt='Email this article to a friend'></a>
		<a href='./simplenews/print.php?news_id={NEWS_ID}' target='_blank'><img src='./simplenews/themes/{THEME}/images/printer.gif' hspace='2' border='0' align='middle' alt='Printer friendly version of this article'></a>
	</td>
	<td bgcolor='#FFFFFF' align='right'>
		{FULL_ARTICLE_LINK} ({NUM_COMMENTS}) <a href='?action=comments&news_id={NEWS_ID}'>Comments</a> 
	</td>
</tr>
</table>

<br />