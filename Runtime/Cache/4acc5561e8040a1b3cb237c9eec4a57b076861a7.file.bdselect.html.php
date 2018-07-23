<?php /* Smarty version Smarty-3.1.6, created on 2018-07-03 14:36:30
         compiled from "F:/Apache24/htdocs/pg/Home/View\Add\bdselect.html" */ ?>
<?php /*%%SmartyHeaderCode:3558392555b3b196e60a253-76517835%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4acc5561e8040a1b3cb237c9eec4a57b076861a7' => 
    array (
      0 => 'F:/Apache24/htdocs/pg/Home/View\\Add\\bdselect.html',
      1 => 1530165906,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3558392555b3b196e60a253-76517835',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'devSelect' => 0,
    'value' => 0,
    'ret' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5b3b196e6fc58',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b3b196e6fc58')) {function content_5b3b196e6fc58($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>主控设备</title>
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

            <div class="weui-btn-area">
                <button class="weui-btn weui-btn_primary" type="submit" onclick="jump()">添加</button>
            </div>
            <div class="weui-panel weui-panel_access">
                <div class="weui-panel__bd">
                    <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['devSelect']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
                    <a href="<?php echo @__APP__;?>
/add/reviseTime?id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
&uptime=<?php echo $_smarty_tpl->tpl_vars['value']->value['uptime'];?>
" class="weui-media-box weui-media-box_appmsg">
                        <div class="weui-media-box__hd">
                            <img  class="weui-media-box__thumb" src="<?php echo @IMG_URL;?>
/shuibiaoicon.png" alt="" id="flag_img">
                        </div>
                        <div class="weui-media-box__bd">
                            <h4 class="weui-media-box__title">
                                id: <?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>

                                <span class="weui-media-box__title-after">棚 <?php echo $_smarty_tpl->tpl_vars['value']->value['shed'];?>
</span>
                            </h4>
                            <p class="weui-media-box__desc" id="uptime">时间 <?php echo $_smarty_tpl->tpl_vars['value']->value['uptime'];?>
</p>
                        </div>
                    </a>
                    <?php } ?>



                </div>
            </div>
            <div class="afterLine" style="height: 90px">


        </div>
    </div>
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
/Mine/mineTab" class="weui-tabbar__item">
        <div class="weui-tabbar__icon">
            <img src="<?php echo @IMG_URL;?>
/icon_nav_cell.png" alt="">
        </div>
        <p class="weui-tabbar__label">我的</p>
    </a>
</div>

</body>
<script src="<?php echo @AJS_URL;?>
jquery-2.1.4.js"></script>
<script src="<?php echo @AJS_URL;?>
jquery-weui.js"></script>
<script src="<?php echo @AJS_URL;?>
fastclick.js"></script>
<script>
    $(function() {
        FastClick.attach(document.body);
        var time = document.getElementById("uptime").value;
        console.log(time)

    });

    var ret = '<?php echo $_smarty_tpl->tpl_vars['ret']->value;?>
';
    if (ret=="20000003"){
        $.toptip('暂无查询数据');
    }
    function jump() {
        window.location.href='bdadd.html';
    }


</script>
</html><?php }} ?>