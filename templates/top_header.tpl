<div class='blackbar'>
	
	{if $user->getId()}
		<a href='/account'>
			<div class='frame'>
				User: {$user->getName()}
			</div>
		</a>

		

	{else}
		<a href='/login'>
			<div class='frame'>
			Login
			</div>
		</a>
	{/if}
	
	{if $user->getId()}
		<a href='/admin'>
			<div class='frame'>
				Admin
			</div>
		</a>
	{/if}
		<a href='/editor'>
			<div class='frame'>
				Editor
			</div>
		</a>
</div>

<div>
	<div class='logoarea'>
		<div class='logo'>
			<img src='{$setting.rpath}/img/shield.png' alt='logo' />
		</div>
		<div class='logotext'>
				<a href='index.php'><h1 id='title'>{$setting.title}</h1></a>
				<h2 id='subtitle'>{$section}</h2>
		</div>
	</div>
</div>
