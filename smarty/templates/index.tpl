<!DOCTYPE html>

<html xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml'>
    <head>
        <script src='//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js'></script>
        <title>{$setting.title}</title>
        <link href='/oxygen-fontfacekit/stylesheet.css' title='main' rel='stylesheet' type='text/css'/>
        {foreach $setting.css as $s}
            <link href='css/{$s}.css' title='main' rel='stylesheet' type='text/css' media='screen,tv'/>
        {/foreach}
        <link rel='shortcut icon' href='/img/favicon.png' type='image/x-icon' />
        
        <!-- analytics -->
        <script type="text/javascript">
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-2123436-8']);
		  _gaq.push(['_trackPageview']);
		
		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
		</script>
    </head>

    <body>
        <header>
            <h1 id='title'>{$setting.title}</h1> 
            <h2 id='subtitle'>{$setting.subtitle}</h2>
            
            <nav id='sections'>
                {foreach $menu as $sec => $sub}
                    <a href="/{$sec|urlencode}" class="menuitem">{$sec}</a>
                {/foreach}
            </nav>
        </header>
        
        <section id='body'>
            {if $template != ""}
                {include file="$template.tpl"}
            {else}
                {$scriptoutput}
            {/if}
            <br style="clear: both;"/>
        </section>  
        <nav id='menu'>
            {foreach $submenu as $sm => $name}
                <a href='/{$section}/{$sm}' class="menuitem">{$name}</a>
            {/foreach}
        </nav>
    </body>
</html>
    