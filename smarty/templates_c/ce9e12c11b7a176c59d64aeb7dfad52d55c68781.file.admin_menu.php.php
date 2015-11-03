<?php /* Smarty version Smarty-3.1.16, created on 2014-05-26 15:00:59
         compiled from "/var/www/web/dev/heraldry2/templates/admin/admin_menu.php" */ ?>
<?php /*%%SmartyHeaderCode:4188811345380634d2f7ab1-86233427%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ce9e12c11b7a176c59d64aeb7dfad52d55c68781' => 
    array (
      0 => '/var/www/web/dev/heraldry2/templates/admin/admin_menu.php',
      1 => 1401105639,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4188811345380634d2f7ab1-86233427',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5380634d347855_99410545',
  'variables' => 
  array (
    'section' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5380634d347855_99410545')) {function content_5380634d347855_99410545($_smarty_tpl) {?><div class='menu'>
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
	<a href='<?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.php?template=user_list'>
		<div class='menuitem'>
			Users
		</div>
	</a>
</div><?php }} ?>
