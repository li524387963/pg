<?php /* Smarty version Smarty-3.1.6, created on 2018-07-03 14:37:39
         compiled from "F:/Apache24/htdocs/pg/Home/View\Manager\login.html" */ ?>
<?php /*%%SmartyHeaderCode:19381165805b39d571dc9f99-11019898%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9991d5fb6996db22b7bea2300120b6bcce1807e4' => 
    array (
      0 => 'F:/Apache24/htdocs/pg/Home/View\\Manager\\login.html',
      1 => 1530599361,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19381165805b39d571dc9f99-11019898',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5b39d571e5e6b',
  'variables' => 
  array (
    'ret' => 0,
    'name' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b39d571e5e6b')) {function content_5b39d571e5e6b($_smarty_tpl) {?><!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <title>登录</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

  <meta name="description" content="Write an awesome description for your new site here. You can edit this line in _config.yml. It will appear in your document head meta (for Google search results) and in your feed.xml site description.
">

  <link rel="stylesheet" href="<?php echo @WEUI_URL;?>
/weui.min.css">
  <link rel="stylesheet" href="<?php echo @WEUI_URL;?>
/demos.css?v=01.01.5">
  <link rel="stylesheet" href="<?php echo @WEUI_URL;?>
/jquery-weui.css">
  <link rel="shortcut icon" href="#" />

</head>
<body>
  
<div class="container">
  <div class="demos-logo" >
    <img src="<?php echo @IMG_URL;?>
/timg.jpg" alt="">
  </div>
  <form class="form-horizontal" action="" onSubmit="return chkinput(this)" method="post">
  <div class="weui-cells weui-cells_form" >
    <div class="weui-cell">
      <div class="weui-cell__hd"><label class="weui-label">手机号</label></div>
      <div class="weui-cell__bd">
        <input class="weui-input" type="tel" id="name" name="name" placeholder="请输入手机号">
      </div>

    </div>
    <div class="weui-cell">
      <div class="weui-cell__hd"><label class="weui-label">密码</label></div>
      <div class="weui-cell__bd">
        <input class="weui-input" type="password" id="pwd" name="pwd" placeholder="请输入密码">
        <input type='hidden' name='aip' value="pc">
      </div>

    </div>

  </div>
  <div class="weui-btn-area">
    <button class="weui-btn weui-btn_primary" type="submit">登录</button>
  </div>
  <div class="weui-btn-area">
    <a class="weui-btn weui-btn_plain-primary" href="<?php echo @__CONTROLLER__;?>
/register" >注册</a>
  </div>
  </form>



</div>





</body>

</html>
<script src="<?php echo @AJS_URL;?>
jquery-2.1.4.js"></script>
<script src="<?php echo @AJS_URL;?>
jquery-weui.js"></script>
<script src="<?php echo @AJS_URL;?>
fastclick.js"></script>
<script>
    $(document).ready(function() {
        var ret = "<?php echo $_smarty_tpl->tpl_vars['ret']->value;?>
";
        var name = "<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
";
        document.getElementById("name").value=name;
        if(ret=="10000107"){
            $.toptip('用户名或密码错误');
        }
        if(ret=="10000104"){
            $.toptip('登录成功', 'success');
        }


    });



  function chkinput(form){

      var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;

      if (!myreg.test(form.name.value)){
          $.toptip('请输入正确的手机号');
          return false;
      }

    if(form.pwd.value==""){
        $.toptip('密码错误');
      form.pwd.select();
      return(false);
    }
    return(true);
  }
</script><?php }} ?>