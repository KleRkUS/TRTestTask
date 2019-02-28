<div class="wrapper">
<div class="form">
	<h2>Registration</h2>
	<form action="reg/registration" method="post" id="regform">
		<label for="login">Login</label>
		<input type="text" id="login" name="login" placeholder="Login" oninput="loginCheck(this)">
		<span id="login-indicator"></span>
		<label for="password">Password</label>
		<input type="password" id="pass" name="password" placeholder="Password" oninput="passLengthCheck(this)">
		<span id="pass-indicator"></span>
		<label for="email">E-mail</label>
		<input type="text" id="email" name="email" placeholder="E-mail">
		<span class="button" onclick="emailClick()" id="confirmEmail">Confirm E-mail</span>
		<span id="error"></span>
	</form>
</div>
</div>