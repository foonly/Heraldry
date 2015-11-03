<?php /* Smarty version Smarty-3.1.19, created on 2015-02-22 09:05:14
         compiled from "/var/www/web/dev/heraldry2/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9537616975374a6b21b0d66-06246867%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42c04f03ff7e97ef0809101e815c81c73b54250d' => 
    array (
      0 => '/var/www/web/dev/heraldry2/templates/index.tpl',
      1 => 1424588636,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9537616975374a6b21b0d66-06246867',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5374a6b23806f8_97767782',
  'variables' => 
  array (
    'setting' => 0,
    's' => 0,
    'section' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5374a6b23806f8_97767782')) {function content_5374a6b23806f8_97767782($_smarty_tpl) {?><!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">
    <head>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <title><?php echo $_smarty_tpl->tpl_vars['setting']->value['title'];?>
</title>
        <?php  $_smarty_tpl->tpl_vars['s'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['s']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['setting']->value['css']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['s']->key => $_smarty_tpl->tpl_vars['s']->value) {
$_smarty_tpl->tpl_vars['s']->_loop = true;
?>
            <link href="<?php echo $_smarty_tpl->tpl_vars['setting']->value['rpath'];?>
/css/<?php echo $_smarty_tpl->tpl_vars['s']->value;?>
.css" title="main" rel="stylesheet" type="text/css" media="screen,tv"/>
        <?php } ?>
        <link href="<?php echo $_smarty_tpl->tpl_vars['setting']->value['rpath'];?>
/css/<?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.css" title="main" rel="stylesheet" type="text/css" media="screen,tv"/>
        <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['setting']->value['rpath'];?>
/img/favicon.png" type="image/x-icon" />
        
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
    	<div class="world">
		<!-- include section specific index file -->
		<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['section']->value)."/index.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>
    </body>
</html>

<?php }} ?>
