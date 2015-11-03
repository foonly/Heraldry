<?php /* Smarty version Smarty-3.1.19, created on 2015-02-22 09:05:14
         compiled from "/var/www/web/dev/heraldry2/templates/user_info.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17974798135383a2e40ecfc1-95246382%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '015367e198f5d0671c48302337153cebbf99f6df' => 
    array (
      0 => '/var/www/web/dev/heraldry2/templates/user_info.tpl',
      1 => 1402043152,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17974798135383a2e40ecfc1-95246382',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5383a2e40fb3d7_03724105',
  'variables' => 
  array (
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5383a2e40fb3d7_03724105')) {function content_5383a2e40fb3d7_03724105($_smarty_tpl) {?><div class='userinfo'>
	
	<?php if ($_smarty_tpl->tpl_vars['user']->value->getId()) {?>
		<a href='/account'>
			<div class='frame'>
				User: <?php echo $_smarty_tpl->tpl_vars['user']->value->getName();?>

			</div>
		</a>

		

	<?php } else { ?>
		<a href='/login'>
			<div class='frame'>
			Login
			</div>
		</a>
	<?php }?>
	
	<?php if ($_smarty_tpl->tpl_vars['user']->value->getId()) {?>
		<a href='/admin'>
			<div class='frame'>
				Admin
			</div>
		</a>
	<?php }?>
		
</div>


<?php }} ?>
