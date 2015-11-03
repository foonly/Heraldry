<?php /* Smarty version Smarty-3.1.19, created on 2015-02-22 09:08:35
         compiled from "/var/www/web/dev/heraldry2/templates/account/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12614691555385b0d5d91a75-03916004%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7482fe2122f6e94f3ca0cc3f1519bd9e36f007aa' => 
    array (
      0 => '/var/www/web/dev/heraldry2/templates/account/index.tpl',
      1 => 1402043215,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12614691555385b0d5d91a75-03916004',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5385b0d5e97bf7_37891074',
  'variables' => 
  array (
    'setting' => 0,
    'section' => 0,
    'menu' => 0,
    'm' => 0,
    'template' => 0,
    'scriptoutput' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5385b0d5e97bf7_37891074')) {function content_5385b0d5e97bf7_37891074($_smarty_tpl) {?><div class='ribbon'>
	<?php echo $_smarty_tpl->getSubTemplate ("user_info.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<div class='topbar'>
		<header>
			
		<div class='logoarea'>
			<a href='index.php'><h1 id='title'><?php echo $_smarty_tpl->tpl_vars['setting']->value['title'];?>
</h1></a>
			<h2 id='subtitle'><?php echo $_smarty_tpl->tpl_vars['section']->value;?>
</h2>
		</div>
        <div class='menu'>
            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value) {
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                <a href='<?php echo $_smarty_tpl->tpl_vars['section']->value;?>
.php?template=<?php echo $_smarty_tpl->tpl_vars['m']->value['tpl'];?>
'>
                    <div class='menuitem'>
                        <?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>

                    </div>
                </a>
            <?php } ?>
        </div>

        </header>
	</div>
	
	<div class='textbody'>
		<section id='body'>
			<?php if ($_smarty_tpl->tpl_vars['template']->value!='') {?>
				<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			<?php } else { ?>
				<?php echo $_smarty_tpl->tpl_vars['scriptoutput']->value;?>

			<?php }?>
			<br style="clear: both;"/>
		
		</section>  

	</div>
	  
</div><?php }} ?>
