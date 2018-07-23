<?php /* Smarty version Smarty-3.1.6, created on 2018-07-06 14:41:01
         compiled from "F:/Apache24/htdocs/pg/Home/View\Mine\resetpwd.html" */ ?>
<?php /*%%SmartyHeaderCode:19979783795b39c95f045dd7-07958041%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20282f2a89e6f24330b788d82c980ca39d23d105' => 
    array (
      0 => 'F:/Apache24/htdocs/pg/Home/View\\Mine\\resetpwd.html',
      1 => 1530610669,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19979783795b39c95f045dd7-07958041',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5b39c95f08075',
  'variables' => 
  array (
    'ret' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b39c95f08075')) {function content_5b39c95f08075($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>重置密码</title>
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
        <div id="tab4" class="weui-tab__bd-item weui-tab__bd-item--active">
            <form class="form-horizontal" name="f1"     action=""   method="post" >
                <div class="weui-cells weui-cells_form" >
                    <div class="weui-cell">
                        <div class="weui-cell__hd"><label class="weui-label">原始密码</label></div>
                        <div class="weui-cell__bd">
                            <input class="weui-input" type="text" name="oldpwd"  placeholder="请输入原始密码" required="required">
                        </div>
                    </div>
                    <div class="weui-cell">
                        <div class="weui-cell__hd"><label class="weui-label">新密码</label></div>
                        <div class="weui-cell__bd">
                            <input class="weui-input" type="text" name="newpwd"  placeholder="请输入新密码" required="required">
                        </div>
                    </div>
                    <div class="weui-cell">
                        <div class="weui-cell__hd"><label class="weui-label">确认新密码</label></div>
                        <div class="weui-cell__bd">
                            <input class="weui-input" type="text" name="newpwd1"  placeholder="请再次输入新密码" required="required">
                        </div>
                    </div>
                </div>
                <div class="weui-btn-area">
                    <button class="weui-btn weui-btn_primary" type="submit">修改</button>
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
/add/deviceTab" class="weui-tabbar__item " >
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
/mine/mineTab" class="weui-tabbar__item weui-bar__item--on">
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

<script type="text/javascript">
    function back() {
        window.history.back();
    }

</script>
<script src="<?php echo @AJS_URL;?>
fastclick.js?v=01.01.04"></script>

<script>
    $(function() {
        FastClick.attach(document.body);
    });
    $(document).ready(function() {
        var ret = "<?php echo $_smarty_tpl->tpl_vars['ret']->value;?>
";


        // document.getElementById("devid").value=device;

        if(ret=="10000113"){
            $.toptip('密码修改成功', 'success');


            setTimeout(function() {
                // window.history.back(-2);
                window.location.href = '<?php echo @__APP__;?>
/mine/mineTab';

            }, 1000)

        }
        if(ret=="10000110"){
            $.toptip('初始密码错误', 'error');
        }
        if(ret=="10000111"){
            $.toptip('两次密码不一致', 'error');
        }
        if(ret=="10000101"){
            $.toptip('密码少于六位', 'error');
        }

    });

</script>
</body>
</html><?php }} ?>