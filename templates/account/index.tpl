<div class='ribbon'>
	
	<div class='topbar'>
		<header>
			
		{include file="top_header.tpl"}
		
        <div class='menu'>
            {foreach $menu as $m}
                <a href='{$section}.php?template={$m.tpl}'>
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