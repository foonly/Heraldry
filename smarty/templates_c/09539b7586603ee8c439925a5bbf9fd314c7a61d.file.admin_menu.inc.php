<?php /* Smarty version Smarty-3.1.16, created on 2014-05-16 15:06:24
         compiled from "/var/www/web/dev/heraldry2/templates/admin/admin_menu.inc" */ ?>
<?php /*%%SmartyHeaderCode:4054412075374af1cde1c27-16473511%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '09539b7586603ee8c439925a5bbf9fd314c7a61d' => 
    array (
      0 => '/var/www/web/dev/heraldry2/templates/admin/admin_menu.inc',
      1 => 1400241975,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4054412075374af1cde1c27-16473511',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5374af1ce16f98_22419982',
  'variables' => 
  array (
    'section' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5374af1ce16f98_22419982')) {function content_5374af1ce16f98_22419982($_smarty_tpl) {?><div class='menu'>
	<a href='<?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.php?template=main'>
		<div class='menuitem'>
			Main
		</div>
	</a>
	<a href='<?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.php?template=charges'>
		<div class='menuitem'>
			Charges
		</div>
	</a>
	<a href='<?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.php?template=blog_list'>
		<div class='menuitem'>
			News
		</div>
	</a>
</div><?php }} ?>
