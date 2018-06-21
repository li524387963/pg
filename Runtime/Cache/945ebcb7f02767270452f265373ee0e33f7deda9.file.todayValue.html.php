<?php /* Smarty version Smarty-3.1.6, created on 2018-06-20 11:16:37
         compiled from "F:/Apache24/htdocs/pg/Home/View\Value\todayValue.html" */ ?>
<?php /*%%SmartyHeaderCode:7393921475b22335f5cb0b9-56874314%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '945ebcb7f02767270452f265373ee0e33f7deda9' => 
    array (
      0 => 'F:/Apache24/htdocs/pg/Home/View\\Value\\todayValue.html',
      1 => 1529464590,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7393921475b22335f5cb0b9-56874314',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5b22335f5f9ec',
  'variables' => 
  array (
    'dateArr' => 0,
    'temp1Arr' => 0,
    'temp2Arr' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b22335f5f9ec')) {function content_5b22335f5f9ec($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <meta name="description" content="Write an awesome description for your new site here. You can edit this line in _config.yml. It will appear in your document head meta (for Google search results) and in your feed.xml site description.
">
    <link rel="stylesheet" href="<?php echo @WEUI_URL;?>
/weui.min.css">
    <link rel="stylesheet" href="<?php echo @WEUI_URL;?>
/jquery-weui.css">
    <link rel="stylesheet" href="<?php echo @WEUI_URL;?>
/demos.css?v=01.01.07">
    <title>今日温度</title>
</head>
<body>

<div class="weui-tab" >

    <div class="weui-tab__bd">
        <div id="tab1" class="weui-tab__bd-item weui-tab__bd-item--active">
            <div style="position: relative;margin-top: 30px;width: 100%" class="demos-title" id="title">

            </div>
            <div id="main" style="width: 100%;height:400px;"></div>

        </div>
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
/acadd/mineTab" class="weui-tabbar__item">
                <div class="weui-tabbar__icon">
                    <img src="<?php echo @IMG_URL;?>
/icon_nav_cell.png" alt="">
                </div>
                <p class="weui-tabbar__label">我的</p>
            </a>
        </div>
    </div>

<script src="<?php echo @AJS_URL;?>
echarts.js?v=01.01.07"></script>
<script src="<?php echo @AJS_URL;?>
jquery-3.2.1.min.js"></script>
<script type="text/javascript">
    // 基于准备好的dom，初始化echarts实例
    var myChart = echarts.init(document.getElementById('main'))
    $(document).ready(function() {
        var C1=window.location.href.split("?")[1];
        var time=C1.split("=")[2];
        console.log(time);
        var uptime=  time.substring(5,10);
        document.getElementById("title").innerHTML=uptime;



        var date = JSON.parse('<?php echo $_smarty_tpl->tpl_vars['dateArr']->value;?>
');
        var temp1 = JSON.parse('<?php echo $_smarty_tpl->tpl_vars['temp1Arr']->value;?>
');
        var temp2 = JSON.parse('<?php echo $_smarty_tpl->tpl_vars['temp2Arr']->value;?>
');
       var min1 = Math.min.apply(null, temp1);
       var min2 = Math.min.apply(null, temp2);

       var min;
       if (min1<min2){
           min = min1;
       }else {
           min = min2;
       }

        console.log(date,temp1,temp2);
        var option = {

            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data:['温度1','温度2']
            },

            xAxis:  {
                type: 'category',
                boundaryGap: false,
                data:['00:00','03:00','06:00','09:00','12:00','15:00','18:00','21:00'],
            },
            yAxis: {
                type: 'value',
                axisLabel: {
                    formatter: '{value}°C'
                },
                min:20,
                max:50,


            },
            series: [
                {
                    name:'温度1',
                    type:'line',
                    data:temp1

                },
                {
                    name:'温度2',
                    type:'line',
                    data:temp2

                }
            ]
        };
        myChart.setOption(option);
    });



    // 使用刚指定的配置项和数据显示图表。

</script>
</body>
</html><?php }} ?>