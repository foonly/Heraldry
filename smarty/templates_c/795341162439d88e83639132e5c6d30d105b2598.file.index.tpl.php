<?php /* Smarty version Smarty-3.1.19, created on 2015-02-25 11:11:59
         compiled from "/var/www/web/dev/heraldry/templates/main/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16180814354eaf41857e5d1-21751840%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '795341162439d88e83639132e5c6d30d105b2598' => 
    array (
      0 => '/var/www/web/dev/heraldry/templates/main/index.tpl',
      1 => 1424855474,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16180814354eaf41857e5d1-21751840',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54eaf41863d231_37230303',
  'variables' => 
  array (
    'menu' => 0,
    'm' => 0,
    'template' => 0,
    'scriptoutput' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54eaf41863d231_37230303')) {function content_54eaf41863d231_37230303($_smarty_tpl) {?><div class='ribbon'>
	
	<div class='topbar'>
		<header>
			<?php echo $_smarty_tpl->getSubTemplate ("top_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			
		    <div class='menu'>
            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value) {
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                <a href='<?php echo $_smarty_tpl->tpl_vars['m']->value['tpl'];?>
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
</div>
<?php }} ?>
