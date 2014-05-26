<?php
echo "
	<div class='login'>
		<h2 class='header'>Login</h2>
		<form action='' method='post'>
	
		<table class='login' align='center'>
			<tr>
				<td>
					Email:
				</td>
				<td>
					<input type='text' name='login'/>
				</td>
			</tr>
			<tr>
				<td>
					Password:
				</td>
				<td>
					<input type='password' name='passwd'/>
				</td>
			</tr>
			<tr>
				<td colspan='2' style='text-align: center;'>
					<input class='cbutton bstyle' type='submit' value='Login'/>
				</td>
			</tr>
		</table>
		
		</form>
		
	</div>
	
	<div class='login'>
		<h3 class='header'>Register a new user.</h3>
		<a href='/register'><div class='cbutton bstyle'>Register</div></a>
	</div>
	";
?>