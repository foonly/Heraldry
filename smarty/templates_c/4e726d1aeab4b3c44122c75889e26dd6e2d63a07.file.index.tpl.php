<?php /* Smarty version Smarty-3.1.19, created on 2015-11-03 14:03:44
         compiled from "/var/www/web/dev/heraldry/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:124356383554eaf4183c7978-98837536%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4e726d1aeab4b3c44122c75889e26dd6e2d63a07' => 
    array (
      0 => '/var/www/web/dev/heraldry/templates/index.tpl',
      1 => 1446552221,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '124356383554eaf4183c7978-98837536',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54eaf4185092b7_87790140',
  'variables' => 
  array (
    'setting' => 0,
    's' => 0,
    'section' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54eaf4185092b7_87790140')) {function content_54eaf4185092b7_87790140($_smarty_tpl) {?><!DOCTYPE html>

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
        <link href="<?php echo $_smarty_tpl->tpl_vars['setting']->value['rpath'];?>
/css/min.css" title="main" rel="stylesheet" type="text/css" media="screen and (max-device-width: 800px)"/>
        <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['setting']->value['rpath'];?>
/img/favicon.png" type="image/x-icon" />
        <link href="https://fonts.googleapis.com/css?family=Pacifico|Uncial+Antiqua|Cinzel+Decorative|Shojumaru" rel="stylesheet" type="text/css"/>
        
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
