<?php /* Smarty version Smarty-3.1.19, created on 2015-10-26 20:25:12
         compiled from "/var/www/web/dev/heraldry/templates/main/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:132308129354eaf421bdd918-49040836%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bb26677b2893cf482c09b73ebffa36cff277560b' => 
    array (
      0 => '/var/www/web/dev/heraldry/templates/main/login.tpl',
      1 => 1445861617,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '132308129354eaf421bdd918-49040836',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54eaf421c0bbd8_49808155',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54eaf421c0bbd8_49808155')) {function content_54eaf421c0bbd8_49808155($_smarty_tpl) {?><div class="login">
    <h2 class="header">Login</h2>
    <form action="/" method="post">

    <table class="login" align="center">
        <tr>
            <td>
                Email:
            </td>
            <td>
                <input type="email" name="login"/>
            </td>
        </tr>
        <tr>
            <td>
                Password:
            </td>
            <td>
                <input type="password" name="passwd"/>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input class="cbutton bstyle" type="submit" value="Login"/>
            </td>
        </tr>
    </table>

    </form>

</div>

<div class="login">
    <h3 class="header">Register a new user.</h3>
    <a href="/register"><div class="cbutton bstyle">Register</div></a>
</div>
<?php }} ?>
