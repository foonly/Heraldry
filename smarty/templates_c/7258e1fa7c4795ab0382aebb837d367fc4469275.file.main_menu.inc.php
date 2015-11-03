<?php /* Smarty version Smarty-3.1.16, created on 2014-05-23 00:09:20
         compiled from "/var/www/web/dev/heraldry2/templates/main/main_menu.inc" */ ?>
<?php /*%%SmartyHeaderCode:9524147015374aef99397b8-36278827%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7258e1fa7c4795ab0382aebb837d367fc4469275' => 
    array (
      0 => '/var/www/web/dev/heraldry2/templates/main/main_menu.inc',
      1 => 1400792905,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9524147015374aef99397b8-36278827',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5374aef993b3c5_23035399',
  'variables' => 
  array (
    'section' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5374aef993b3c5_23035399')) {function content_5374aef993b3c5_23035399($_smarty_tpl) {?><div class='menu'>
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
