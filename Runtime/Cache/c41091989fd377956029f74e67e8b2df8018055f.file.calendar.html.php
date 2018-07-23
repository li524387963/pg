<?php /* Smarty version Smarty-3.1.6, created on 2018-07-04 15:10:45
         compiled from "F:/Apache24/htdocs/pg/Home/View\Value\calendar.html" */ ?>
<?php /*%%SmartyHeaderCode:13499650295b3c72f586add3-93095288%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c41091989fd377956029f74e67e8b2df8018055f' => 
    array (
      0 => 'F:/Apache24/htdocs/pg/Home/View\\Value\\calendar.html',
      1 => 1530167525,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13499650295b3c72f586add3-93095288',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5b3c72f590b08',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b3c72f590b08')) {function content_5b3c72f590b08($_smarty_tpl) {?><!DOCTYPE html >
<html lang="zh-CN">
<head>
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
<body>
<div>
<!--<input style="width: 124px" location="right" class="calendar_btn" name="calendar" readonly="readonly"-->
<!--onclick="showCalendar(this,'232');" placeholder="酒店价格日历"/>-->

    <!--<div style="width: 100%;background-color: black;height: 20px">-->
    <div style="position: absolute;margin-top: 30px;width: 100%" class="demos-title" id="title">
        2
    </div>


</div>

<div class="weui-tab" >
    <div class="weui-tab__bd">
        <div id="tab1" class="weui-tab__bd-item weui-tab__bd-item--active">


        </div>
        <div class="weui-tabbar">
            <a href="<?php echo @__APP__;?>
/devselect/select" class="weui-tabbar__item weui-bar__item--on">

                <div class="weui-tabbar__icon">
                    <img src="<?php echo @IMG_URL;?>
/icon_nav_button.png" alt="">
                </div>
                <p class="weui-tabbar__label">首页</p>
            </a>
            <a href="<?php echo @__APP__;?>
/add/deviceTab" class="weui-tabbar__item">
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
</div>


</body>
    <script src="<?php echo @AJS_URL;?>
jquery-3.2.1.min.js"></script>
    <script src="<?php echo @AJS_URL;?>
zlDate.js?v=01.01.22"></script>
    <script>
        function showCalendar() {
            var ret = '<?php echo $_smarty_tpl->tpl_vars['data']->value;?>
';
            var json = JSON.parse(ret);

          //  console.log(ret,json);
            pickerEvent.setPriceArr(json);
            pickerEvent.Init(this);
        }
        var devid;
        $(document).ready(function() {

            showCalendar(this);
            var C1=window.location.href.split("?")[1];
             devid= C1.split("=")[1];

          //  console.log(devid);
            var devStr = '设备号: '+devid

             document.getElementById("title").innerHTML=devStr;
            // document.getElementById("uptime").value=uptime;

        });
        function changePrice(date,price ) {
           // console.log(date,price,devid);
            if (price!=-9999){
                window.location.href = '<?php echo @__APP__;?>
/Value/todayValue?devid='+devid+'&date='+date;
            }

        };
        function postMonthData(date) {
        var month = date.slice(0,7);
            console.log(month)
            window.location.href = '<?php echo @__APP__;?>
/Value/monthValue?devid='+devid+'&date='+month;

        }
    </script>
</head>


</html>
<?php }} ?>