<?php /* Smarty version Smarty-3.1.19, created on 2015-02-25 11:12:08
         compiled from "/var/www/web/dev/heraldry/templates/account/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:155566581754eaf43b02c044-15090276%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c913347fb98be6ff6fd56f33c868d97c56f67dbb' => 
    array (
      0 => '/var/www/web/dev/heraldry/templates/account/index.tpl',
      1 => 1424855513,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '155566581754eaf43b02c044-15090276',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54eaf43b0bd3c1_04293200',
  'variables' => 
  array (
    'menu' => 0,
    'section' => 0,
    'm' => 0,
    'template' => 0,
    'scriptoutput' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54eaf43b0bd3c1_04293200')) {function content_54eaf43b0bd3c1_04293200($_smarty_tpl) {?><div class='ribbon'>
	
	<div class='topbar'>
		<header>
			
		<?php echo $_smarty_tpl->getSubTemplate ("top_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		
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
