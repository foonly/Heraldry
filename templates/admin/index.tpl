
<div class='ribbon'>
	<header>
		<div class='buttons right'>
			<a href='index.php'><div>Main</div></a>
		</div>
		<div class='logoarea'>
			<a href='index.php'><h1 id='title'>{$setting.title}</h1></a>
			<h2 id='subtitle'>{$section}</h2>
		</div>
	            
	    {include file="{$section}/{$section}_menu.inc"}  
	</header>
	        
	<section id='body'>
		
			{if $template != ""}
				{include file="$template.tpl"}
			{else}
				{$scriptoutput}
			{/if}
			<br style="clear: both;"/>
		
	</section>  
</div>