<div class='ribbon'>
	{include file="user_info.tpl"}
	<div class='topbar'>
		<header>
			
			<div class='logoarea'>
				<a href='index.php'><h1 id='title'>{$setting.title}</h1></a>
				<h2 id='subtitle'>{$section}</h2>
			</div>
		    <div class='menu'>
            {foreach $menu as $m}
                <a href='/{$m.tpl}'>
                    <div class='menuitem'>
                        {$m.name}
                    </div>
                </a>
            {/foreach}
        	</div>
		</header>
	</div>
	
	<div class='textbody'>    
		<section id='body'>
			{if $template != ""}
					{include file="$template.tpl"}
				{else}
					{$scriptoutput}
				{/if}
			<br style="clear: both;"/>
		</section>  
	</div>
</div>
