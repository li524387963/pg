<?php /* Smarty version Smarty-3.1.6, created on 2018-07-02 14:43:13
         compiled from "F:/Apache24/htdocs/pg/Home/View\Mine\mineTab.html" */ ?>
<?php /*%%SmartyHeaderCode:5036887015b347e9c861997-00313536%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0690f741f98aead48f88ecb00ee31acbb9ed33ec' => 
    array (
      0 => 'F:/Apache24/htdocs/pg/Home/View\\Mine\\mineTab.html',
      1 => 1530513779,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5036887015b347e9c861997-00313536',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5b347e9c9b95e',
  'variables' => 
  array (
    'ret' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b347e9c9b95e')) {function content_5b347e9c9b95e($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>设备展示</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" href="<?php echo @WEUI_URL;?>
/weui.min.css">
    <link rel="stylesheet" href="<?php echo @WEUI_URL;?>
/jquery-weui.css">
    <link rel="stylesheet" href="<?php echo @WEUI_URL;?>
/demos.css?v=01.01.04">



</head>

<body>

<div class="weui-tab">
 <div class="weui-tab__bd">
  <div id="tab3" class="weui-tab__bd-item weui-tab__bd-item--active" >
   <div class="weui-panel weui-panel_access">
    <div class="weui-panel__bd">
     <a href="<?php echo @__APP__;?>
/Mine/resetpwd" class="weui-media-box weui-media-box_appmsg">
       <div class="weui-media-box__hd">
        <img class="weui-media-box__thumb" src="<?php echo @IMG_URL;?>
/timg.jpg" alt="">
       </div>
       <div class="weui-media-box__bd">
        <h4 class="weui-media-box__title">
          修改密码
        </h4>
       </div>
     </a>
   </div>
  </div>
      <form class="" name="f1"   id="form1"   action=""   method="post" >
      <div class="weui-cell">

            <button class="weui-btn weui-btn_primary" type="submit" name="logout">退出</button>


</div>
      </form>
</div>
</div>
<div class="weui-tabbar">
<a href="<?php echo @__APP__;?>
/devselect/select" class="weui-tabbar__item">

<div class="weui-tabbar__icon">
<img src="<?php echo @IMG_URL;?>
/icon_nav_button.png" alt="">
</div>
<p class="weui-tabbar__label">首页</p>
</a>
<a href="<?php echo @__APP__;?>
/add/deviceTab" class="weui-tabbar__item  ">
<div class="weui-tabbar__icon">
<img src="<?php echo @IMG_URL;?>
/icon_nav_msg.png" alt="">
</div>
<p class="weui-tabbar__label">设备</p>
</a>
<a href="<?php echo @__APP__;?>
/Acadd/acTab" class="weui-tabbar__item">
<div class="weui-tabbar__icon">
<img src="<?php echo @IMG_URL;?>
/icon_nav_article.png" alt="">
</div>
<p class="weui-tabbar__label">温度</p>
</a>
<a href="#tab4" class="weui-tabbar__item weui-bar__item--on">
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
<script >

$(function() {
FastClick.attach(document.body);
    var ret = '<?php echo $_smarty_tpl->tpl_vars['ret']->value;?>
';
    if (ret=="10000108"){
        $.toptip('退出成功');
        setTimeout(function() {
            // window.history.back(-2);
            location.replace('<?php echo @__APP__;?>
/manager/login');
           // location.replace("http://www.baidu.com");

        }, 1000)

    };
});

</script>








</body>
<!-- Required datatable js -->


<!--<script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/jquery.dataTables.min.js"></script>-->
<!--<script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/dataTables.bootstrap4.min.js"></script>-->
<!--<script type="text/javascript">-->

<!--</script>-->
</html><?php }} ?>