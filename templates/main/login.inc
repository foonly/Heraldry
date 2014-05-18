<?php
echo "
	<div class='login'>
		<h2 class='header'>Login</h2>
		<form action='transaction.php?t=check_login' method='post'>
	
		<table class='login' align='center'>
			<tr>
				<td>
					Email:
				</td>
				<td>
					<input type='text' name='user'/>
				</td>
			</tr>
			<tr>
				<td>
					Password:
				</td>
				<td>
					<input type='password' name='pass'/>
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
		<a href='file.php?template=registration'><div class='cbutton bstyle'>Register</div></a>
	</div>
	";
?>