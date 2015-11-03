<?php /* Smarty version Smarty-3.1.19, created on 2015-02-22 09:05:14
         compiled from "/var/www/web/dev/heraldry2/templates/main/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12645461215374a6c8726691-99411219%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c8687f03ff86e3ac22f4f3e81c4d593a559411d' => 
    array (
      0 => '/var/www/web/dev/heraldry2/templates/main/index.tpl',
      1 => 1424588636,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12645461215374a6c8726691-99411219',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5374a6c8760cb9_73557775',
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
<?php if ($_valid && !is_callable('content_5374a6c8760cb9_73557775')) {function content_5374a6c8760cb9_73557775($_smarty_tpl) {?><div class='ribbon'>
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
