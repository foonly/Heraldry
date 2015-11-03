<?php /* Smarty version Smarty-3.1.16, created on 2014-05-26 23:16:49
         compiled from "/var/www/web/dev/heraldry2/templates/main/main_menu.php" */ ?>
<?php /*%%SmartyHeaderCode:8710742265383a1314f42d7-14635123%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '47766e12a8dbbcd4695a61627c808c315a5e063c' => 
    array (
      0 => '/var/www/web/dev/heraldry2/templates/main/main_menu.php',
      1 => 1400792905,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8710742265383a1314f42d7-14635123',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'section' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5383a131502399_18644823',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5383a131502399_18644823')) {function content_5383a131502399_18644823($_smarty_tpl) {?><div class='menu'>
	<a href='<?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.php?template=main'>
		<div class='menuitem'>
			Menu 1
		</div>
	</a>
	<a href='<?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.php?template=main2'>
		<div class='menuitem'>
			Menu 2
		</div>
	</a>
	<a href='<?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.php?template=main2'>
		<div class='menuitem'>
			Menu 3
		</div>
	</a>
</div><?php }} ?>
