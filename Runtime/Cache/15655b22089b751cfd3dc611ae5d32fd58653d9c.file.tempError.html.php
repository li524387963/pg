<?php /* Smarty version Smarty-3.1.6, created on 2018-07-13 10:45:03
         compiled from "F:/Apache24/htdocs/pg/Home/View\Add\tempError.html" */ ?>
<?php /*%%SmartyHeaderCode:7398360535b3ed433895864-96004443%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15655b22089b751cfd3dc611ae5d32fd58653d9c' => 
    array (
      0 => 'F:/Apache24/htdocs/pg/Home/View\\Add\\tempError.html',
      1 => 1531365271,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7398360535b3ed433895864-96004443',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5b3ed4338cc37',
  'variables' => 
  array (
    'selectSql' => 0,
    'v' => 0,
    'startTime' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b3ed4338cc37')) {function content_5b3ed4338cc37($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>温度异常</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <meta name="description" content="Write an awesome description for your new site here. You can edit this line in _config.yml. It will appear in your document head meta (for Google search results) and in your feed.xml site description.
">
    <title>日历</title>
    <link href="<?php echo @WEUI_URL;?>
/datepicker.css?v=01.01.38" rel="stylesheet"/>
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
            <form class="form-horizontal" name="f1"      action=""   method="post" >
                <div class="weui-cells weui-cells_form" >

                    <div class="weui-cell">
                        <div class="weui-cell__hd"><label for="date" class="weui-label">日期</label></div>
                        <div class="weui-cell__bd">
                            <input class="weui-input" id="date" type="text" name="time" placeholder="请输入日期" >
                        </div>
                    </div>
                    <div class="weui-cell">
                        <button class="weui-btn weui-btn_primary" type="submit">查询</button>
                    </div>
                </div>
                <div class="container">
                    <?php if (!empty($_smarty_tpl->tpl_vars['selectSql']->value)){?>

                    <div class="weui-panel weui-panel_access">
                        <div class="weui-panel__bd">
                            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['selectSql']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                            <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                                <div class="weui-media-box__hd">
                                    <!--<img class="weui-media-box__thumb" src="<?php echo @IMG_URL;?>
/warn.png" alt="">-->
                                    <div class="weui-media-box__hd">

                                        <img  class="weui-media-box__thumb" src="<?php echo @IMG_URL;?>
/warn.png" alt="" id="flag_img1">

                                    </div>
                                </div>
                                <div class="weui-media-box__bd">
                                    <h4 class="weui-media-box__title">
                                        设备 <?php echo $_smarty_tpl->tpl_vars['v']->value['devid'];?>
  温度 <?php echo $_smarty_tpl->tpl_vars['v']->value['temp1'];?>


                                    </h4>
                                    <!--{$vo.start_time|date="Y-m-d H:i:s",###}   <?php echo $_smarty_tpl->tpl_vars['v']->value['cur_time'];?>
-->
                                    <!--date("Y-m-d ",$val['数据库中时间字段'])-->
                                    <p class="weui-media-box__desc">时间  <?php echo date("Y-m-d H:i:s",$_smarty_tpl->tpl_vars['v']->value['time']);?>
</p>

                                </div>
                            </a>
                            <?php } ?>

                        </div>

                    </div>
                    <?php }?>
                    <div class="afterLine" style="height: 90px">

                    </div>
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
</body>
<script src="<?php echo @AJS_URL;?>
jquery-2.1.4.js"></script>
<script src="<?php echo @AJS_URL;?>
jquery-weui.js"></script>
<script src="<?php echo @AJS_URL;?>
fastclick.js"></script>
<script>
    $("#date").calendar({
        onChange: function (p, values, displayValues) {
            console.log(p,values, displayValues);
        }
    })
    var startTime = "<?php echo $_smarty_tpl->tpl_vars['startTime']->value;?>
";
    document.getElementById("date").value=startTime;
    </script>
</html><?php }} ?>