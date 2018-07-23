<?php /* Smarty version Smarty-3.1.6, created on 2018-07-20 14:41:02
         compiled from "F:/Apache24/htdocs/pg/Home/View\Add\deviceTab.html" */ ?>
<?php /*%%SmartyHeaderCode:5134855275b3591a8e73f21-60114995%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '68b2653d85e483630d10d378d7f82591e6e35cbe' => 
    array (
      0 => 'F:/Apache24/htdocs/pg/Home/View\\Add\\deviceTab.html',
      1 => 1532054700,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5134855275b3591a8e73f21-60114995',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5b3591a8ed1b3',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b3591a8ed1b3')) {function content_5b3591a8ed1b3($_smarty_tpl) {?><!DOCTYPE html>
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
            <div id="tab2" class="weui-tab__bd-item weui-tab__bd-item--active">
                <div class="weui-panel weui-panel_access">
                <div class="weui-panel__bd">
                    <a href="<?php echo @__APP__;?>
/add/add" class="weui-media-box weui-media-box_appmsg">
                        <div class="weui-media-box__hd">
                            <img class="weui-media-box__thumb" src="<?php echo @IMG_URL;?>
/timg.jpg" alt="">
                        </div>
                        <div class="weui-media-box__bd">
                            <h4 class="weui-media-box__title">
                               添加设备
                            </h4>
                        </div>
                    </a>
                    <a href="<?php echo @__APP__;?>
/add/move" class="weui-media-box weui-media-box_appmsg">
                        <div class="weui-media-box__hd">
                            <img class="weui-media-box__thumb" src="<?php echo @IMG_URL;?>
/timg.jpg" alt="">
                        </div>
                        <div class="weui-media-box__bd">
                            <h4 class="weui-media-box__title">
                                移动设备
                            </h4>
                        </div>
                    </a>
                    <a href="<?php echo @__APP__;?>
/add/saveinfo" class="weui-media-box weui-media-box_appmsg">
                        <div class="weui-media-box__hd">
                            <img class="weui-media-box__thumb" src="<?php echo @IMG_URL;?>
/timg.jpg" alt="">
                        </div>
                        <div class="weui-media-box__bd">
                            <h4 class="weui-media-box__title">
                                修改设备
                            </h4>
                        </div>
                    </a>
                    <a href="<?php echo @__APP__;?>
/add/select" class="weui-media-box weui-media-box_appmsg">
                        <div class="weui-media-box__hd">
                            <img class="weui-media-box__thumb" src="<?php echo @IMG_URL;?>
/timg.jpg" alt="">
                        </div>
                        <div class="weui-media-box__bd">
                            <h4 class="weui-media-box__title">
                                查询设备
                            </h4>
                        </div>
                    </a>
                    <a href="<?php echo @__APP__;?>
/add/bdselect" class="weui-media-box weui-media-box_appmsg">
                        <div class="weui-media-box__hd">
                            <img class="weui-media-box__thumb" src="<?php echo @IMG_URL;?>
/timg.jpg" alt="">
                        </div>
                        <div class="weui-media-box__bd">
                            <h4 class="weui-media-box__title">
                                主控设备
                            </h4>
                        </div>
                    </a>
                    <a href="<?php echo @__APP__;?>
/add/tempError" class="weui-media-box weui-media-box_appmsg">
                    <div class="weui-media-box__hd">
                        <img class="weui-media-box__thumb" src="<?php echo @IMG_URL;?>
/timg.jpg" alt="">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="weui-media-box__title">
                            异常温度
                        </h4>
                    </div>
                    </a>
                    <a  class="weui-media-box weui-media-box_appmsg">
                        <div class="weui-media-box__hd">
                        </div>
                        <div class="weui-media-box__bd">
                            <h4 class="weui-media-box__title">
                            </h4>
                        </div>
                    </a>

                </div>

                </div>
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
            <a href="#tab2" class="weui-tabbar__item  weui-bar__item--on">
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
    </div>

    <script src="<?php echo @AJS_URL;?>
jquery-2.1.4.js?v=01.01.04"></script>
    <script src="<?php echo @AJS_URL;?>
jquery-weui.js?v=01.01.04"></script>
    <script src="<?php echo @AJS_URL;?>
fastclick.js?v=01.01.04"></script>
    <script>
        $(function() {
            FastClick.attach(document.body);
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