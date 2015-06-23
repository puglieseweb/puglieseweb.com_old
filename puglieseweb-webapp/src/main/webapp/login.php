<?php require $_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php'; ?>
<h1>Login</h1>
<h3>For administrators access only</h3>
<br />
<?php html_form_login(); ?>

<?php require $_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.jsp'; ?>




<?php
//---------------------------- FUNZIONI ----------------------------//

function html_form_login(){
$form=<<<FORM
<form id="form_login" action="../login.php" method="post">
	<div>
		<label for="f-user">Username: </label>
		<input id="f-user" type="text" name="uname" size="9" maxlength="10" />
	</div>
	<div>
		<label for="f-pwd">Password: </label>
		<input id="f-pwd" type="password" name="pwd" size="15" maxlength="15" />
	</div>
	<div>
		<input id="conferma" type="submit" name="submit_home" value="Login" />
	</div>
</form>
FORM;
echo $form;
}

?>







