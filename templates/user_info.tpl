<div class='userinfo'>
	
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
		
</div>


