<?php /* Smarty version Smarty-3.1.19, created on 2015-02-25 11:14:00
         compiled from "/var/www/web/dev/heraldry/templates/top_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:195224083954ed91df141a96-42010758%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7fc79027f5f7be6106164e6a82d1c63ecad87559' => 
    array (
      0 => '/var/www/web/dev/heraldry/templates/top_header.tpl',
      1 => 1424855634,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '195224083954ed91df141a96-42010758',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54ed91df16ab66_57925283',
  'variables' => 
  array (
    'user' => 0,
    'setting' => 0,
    'section' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54ed91df16ab66_57925283')) {function content_54ed91df16ab66_57925283($_smarty_tpl) {?><div class='blackbar'>
	
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
			<a href='index.php'><img src='<?php echo $_smarty_tpl->tpl_vars['setting']->value['rpath'];?>
/img/shield.png' alt='logo' /></a>
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
