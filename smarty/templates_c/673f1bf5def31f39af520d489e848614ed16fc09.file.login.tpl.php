<?php /* Smarty version Smarty-3.1.19, created on 2015-02-22 09:05:51
         compiled from "/var/www/web/dev/heraldry2/templates/main/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1583942757538701be67f817-19525020%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '673f1bf5def31f39af520d489e848614ed16fc09' => 
    array (
      0 => '/var/www/web/dev/heraldry2/templates/main/login.tpl',
      1 => 1401169507,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1583942757538701be67f817-19525020',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_538701be7151c3_87145033',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_538701be7151c3_87145033')) {function content_538701be7151c3_87145033($_smarty_tpl) {?><div class="login">
    <h2 class="header">Login</h2>
    <form action="/" method="post">

    <table class="login" align="center">
        <tr>
            <td>
                Email:
            </td>
            <td>
                <input type="text" name="login"/>
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
