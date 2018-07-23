<?php /* Smarty version Smarty-3.1.6, created on 2018-07-09 10:00:59
         compiled from "F:/Apache24/htdocs/pg/Home/View\Add\add.html" */ ?>
<?php /*%%SmartyHeaderCode:18972194685b42c1db86cc50-74157661%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '479f61a27cefeebe34de8c640aa43588e15d4032' => 
    array (
      0 => 'F:/Apache24/htdocs/pg/Home/View\\Add\\add.html',
      1 => 1530167525,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18972194685b42c1db86cc50-74157661',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ret' => 0,
    'device' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5b42c1db95b10',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b42c1db95b10')) {function content_5b42c1db95b10($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>add</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <link rel="stylesheet" href="<?php echo @WEUI_URL;?>
/weui.min.css">
  <link rel="stylesheet" href="<?php echo @WEUI_URL;?>
/jquery-weui.css">
  <link rel="stylesheet" href="<?php echo @WEUI_URL;?>
/demos.css?v=01.01.07">
</head>
<body>
<div class="weui-tab">
<div class="weui-tab__bd">
  <div id="tab2" class="weui-tab__bd-item weui-tab__bd-item--active">

  <form class="" name="f1"   id="form1"   action=""   method="post" >
    <div class="weui-cells weui-cells_form" >
      <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">设备ID</label></div>
        <div class="weui-cell__bd">
          <input class="weui-input" type="text" name="devid"  placeholder="请输入设备ID号">
        </div>
      </div>
      <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">栅</label></div>
        <div class="weui-cell__bd">
          <input class="weui-input" type="text" name="shed"  placeholder="请输入多少栅">
        </div>
      </div>
      <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">栏</label></div>
        <div class="weui-cell__bd">
          <input class="weui-input" type="text" name="column"  placeholder="请输入多少栏">
        </div>
      </div>
      <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">状态</label></div>
        <div class="weui-cell__bd">
          <input class="weui-input" type="text" name="flag"  placeholder="请输入状态">
        </div>
      </div>
      <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">情况</label></div>
        <div class="weui-cell__bd">
          <input class="weui-input" type="text" name="state"  placeholder="请输入情况">
        </div>
      </div>
      <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">生产次数</label></div>
        <div class="weui-cell__bd">
          <input class="weui-input" type="text" name="s_count"  placeholder="请输入生产次数">
        </div>
      </div>
      <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">RFID</label></div>
        <div class="weui-cell__bd">
          <input class="weui-input" type="text" name="rid"  placeholder="请输入RFID">
        </div>
      </div>
      <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">AGE</label></div>
        <div class="weui-cell__bd">
          <input class="weui-input" type="text" name="age"  placeholder="请输入年龄">
        </div>
      </div>

    </div>

    <div class="weui-cell">
      <button class="weui-btn weui-btn_primary" type="submit">添加</button>
    </div>
    <div class="demos-cell-after" >
    </div>




  </form>

  </div>
</div>
<div class="weui-tabbar">
    <a href="<?php echo @__APP__;?>
/devselect/select" class="weui-tabbar__item ">

      <div class="weui-tabbar__icon">
        <img src="<?php echo @IMG_URL;?>
/icon_nav_button.png" alt="">
      </div>
      <p class="weui-tabbar__label">首页</p>
    </a>
    <a href="<?php echo @__APP__;?>
/add/deviceTab" class="weui-tabbar__item weui-bar__item--on">
      <div class="weui-tabbar__icon">
        <img src="<?php echo @IMG_URL;?>
/icon_nav_msg.png" alt="">
      </div>
      <p class="weui-tabbar__label">设备</p>
    </a>
    <a href="<?php echo @__APP__;?>
/acadd/acTab" class="weui-tabbar__item">
      <div class="weui-tabbar__icon">
        <img src="<?php echo @IMG_URL;?>
/icon_nav_article.png" alt="">
      </div>
      <p class="weui-tabbar__label">温度</p>
    </a>
    <a href="<?php echo @__APP__;?>
/mine/mineTab" class="weui-tabbar__item">
      <div class="weui-tabbar__icon">
        <img src="<?php echo @IMG_URL;?>
/icon_nav_cell.png" alt="">
      </div>
      <p class="weui-tabbar__label">我的</p>
    </a>
  </div>
</div>
  <script src="<?php echo @AJS_URL;?>
jquery-2.1.4.js"></script>
  <script src="<?php echo @AJS_URL;?>
jquery-weui.js"></script>
  <script src="<?php echo @AJS_URL;?>
fastclick.js"></script>
  <script>
      $(function() {
          FastClick.attach(document.body);
      });
      $(document).ready(function() {
          var ret = "<?php echo $_smarty_tpl->tpl_vars['ret']->value;?>
";
          var device = "<?php echo $_smarty_tpl->tpl_vars['device']->value;?>
";

         // document.getElementById("devid").value=device;
          if(ret=="10000001"){
              $.toptip('设备已注册');
          }
          if(ret=="10000000"){
              $.toptip('插入成功', 'success');
          }
          if(ret=="10000002"){
              $.toptip('插入失败', 'error');
          }

      });
  </script>
</body>
</html>
<?php }} ?>