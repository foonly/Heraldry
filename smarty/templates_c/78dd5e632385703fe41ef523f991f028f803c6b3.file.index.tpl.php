<?php /* Smarty version Smarty-3.1.16, created on 2014-05-15 11:58:16
         compiled from "/var/www/web/dev/heraldry2/smarty/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16092910753746f9881e8f4-67622462%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '78dd5e632385703fe41ef523f991f028f803c6b3' => 
    array (
      0 => '/var/www/web/dev/heraldry2/smarty/templates/index.tpl',
      1 => 1400144291,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16092910753746f9881e8f4-67622462',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_53746f98890d27_16449059',
  'variables' => 
  array (
    'setting' => 0,
    's' => 0,
    'menu' => 0,
    'sec' => 0,
    'template' => 0,
    'scriptoutput' => 0,
    'submenu' => 0,
    'section' => 0,
    'sm' => 0,
    'name' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53746f98890d27_16449059')) {function content_53746f98890d27_16449059($_smarty_tpl) {?><!DOCTYPE html>

<html xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml'>
    <head>
        <script src='//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js'></script>
        <title><?php echo $_smarty_tpl->tpl_vars['setting']->value['title'];?>
</title>
        <link href='/oxygen-fontfacekit/stylesheet.css' title='main' rel='stylesheet' type='text/css'/>
        <?php  $_smarty_tpl->tpl_vars['s'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['s']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['setting']->value['css']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['s']->key => $_smarty_tpl->tpl_vars['s']->value) {
$_smarty_tpl->tpl_vars['s']->_loop = true;
?>
            <link href='css/<?php echo $_smarty_tpl->tpl_vars['s']->value;?>
.css' title='main' rel='stylesheet' type='text/css' media='screen,tv'/>
        <?php } ?>
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
            <h1 id='title'><?php echo $_smarty_tpl->tpl_vars['setting']->value['title'];?>
</h1> 
            <h2 id='subtitle'><?php echo $_smarty_tpl->tpl_vars['setting']->value['subtitle'];?>
</h2>
            
            <nav id='sections'>
                <?php  $_smarty_tpl->tpl_vars['sub'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sub']->_loop = false;
 $_smarty_tpl->tpl_vars['sec'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['menu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sub']->key => $_smarty_tpl->tpl_vars['sub']->value) {
$_smarty_tpl->tpl_vars['sub']->_loop = true;
 $_smarty_tpl->tpl_vars['sec']->value = $_smarty_tpl->tpl_vars['sub']->key;
?>
                    <a href="/<?php echo urlencode($_smarty_tpl->tpl_vars['sec']->value);?>
" class="menuitem"><?php echo $_smarty_tpl->tpl_vars['sec']->value;?>
</a>
                <?php } ?>
            </nav>
        </header>
        
        <section id='body'>
            <?php if ($_smarty_tpl->tpl_vars['template']->value!='') {?>
                <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            <?php } else { ?>
                <?php echo $_smarty_tpl->tpl_vars['scriptoutput']->value;?>

            <?php }?>
            <br style="clear: both;"/>
        </section>  
        <nav id='menu'>
            <?php  $_smarty_tpl->tpl_vars['name'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['name']->_loop = false;
 $_smarty_tpl->tpl_vars['sm'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['submenu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['name']->key => $_smarty_tpl->tpl_vars['name']->value) {
$_smarty_tpl->tpl_vars['name']->_loop = true;
 $_smarty_tpl->tpl_vars['sm']->value = $_smarty_tpl->tpl_vars['name']->key;
?>
                <a href='/<?php echo $_smarty_tpl->tpl_vars['section']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sm']->value;?>
' class="menuitem"><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</a>
            <?php } ?>
        </nav>
        <?php echo $_smarty_tpl->tpl_vars['section']->value;?>

    </body>
</html>
    <?php }} ?>
