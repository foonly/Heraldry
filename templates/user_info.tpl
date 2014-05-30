
{if $user->getId()}

<div class='framehead'>
	Account
</div>
<div class='framebody'>
	User:<br/>
	{$user->getName()}
</div>

{else}
	<a href='/login'>Login</a>
{/if}