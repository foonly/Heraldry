<?php /* Smarty version Smarty-3.1.19, created on 2015-02-25 11:05:07
         compiled from "/var/www/web/dev/heraldry/templates/user_info.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23221049254eaf418644406-34671819%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '526cfe058ecf4094c369a6dbdda6a4ae6b68556c' => 
    array (
      0 => '/var/www/web/dev/heraldry/templates/user_info.tpl',
      1 => 1424855075,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23221049254eaf418644406-34671819',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54eaf4186ce883_02751244',
  'variables' => 
  array (
    'user' => 0,
    'setting' => 0,
    'section' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54eaf4186ce883_02751244')) {function content_54eaf4186ce883_02751244($_smarty_tpl) {?><div class='blackbar'>
	
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
		<a href='/editor'>
			<div class='frame'>
				Editor
			</div>
		</a>
</div>

<div>
	<div class='logoarea'>
		<div class='logo'>
			<img src='<?php echo $_smarty_tpl->tpl_vars['setting']->value['rpath'];?>
/img/shield.png' alt='logo' />
		</div>
		<div class='logotext'>
				<a href='index.php'><h1 id='title'><?php echo $_smarty_tpl->tpl_vars['setting']->value['title'];?>
</h1></a>
				<h2 id='subtitle'><?php echo $_smarty_tpl->tpl_vars['section']->value;?>
</h2>
		</div>
	</div>
</div>
<?php }} ?>
