<?php /* Smarty version Smarty-3.1.16, created on 2014-05-21 22:33:28
         compiled from "/var/www/web/dev/heraldry2/include/top_box.inc" */ ?>
<?php /*%%SmartyHeaderCode:1272573355537cff1caee920-20983086%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c6931ad9cc1da52b249f9265d14153810987f4c2' => 
    array (
      0 => '/var/www/web/dev/heraldry2/include/top_box.inc',
      1 => 1400700805,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1272573355537cff1caee920-20983086',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_537cff1caf1994_78357225',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_537cff1caf1994_78357225')) {function content_537cff1caf1994_78357225($_smarty_tpl) {?>
		<a href='account.php'>
			<div class='sectionb'>
				<div>
					Account
				</div>
					Logged in as: <?php echo $_SESSION['s_id'];?>

			</div>
		</a>
	<?php }} ?>
