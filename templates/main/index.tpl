Yo <a href='admin.php'>goto Admin</a>

<header>
	<a href='index.php'><h1 id='title'>{$setting.title}</h1></a>
	<h2 id='subtitle'>{$section}</h2>
            
            
</header>
        
<section id='body'>
	{if $template != ""}
		{include file="$template.tpl"}
	{else}
		{$scriptoutput}
	{/if}
	<br style="clear: both;"/>
</section>  