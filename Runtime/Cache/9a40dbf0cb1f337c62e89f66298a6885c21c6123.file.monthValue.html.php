<?php /* Smarty version Smarty-3.1.6, created on 2018-06-21 13:46:54
         compiled from "F:/Apache24/htdocs/pg/Home/View\Value\monthValue.html" */ ?>
<?php /*%%SmartyHeaderCode:21100191955b29c8b692f3f7-44224187%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9a40dbf0cb1f337c62e89f66298a6885c21c6123' => 
    array (
      0 => 'F:/Apache24/htdocs/pg/Home/View\\Value\\monthValue.html',
      1 => 1529560011,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21100191955b29c8b692f3f7-44224187',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5b29c8b696dbf',
  'variables' => 
  array (
    'dateArr' => 0,
    'temp1Arr' => 0,
    'temp2Arr' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b29c8b696dbf')) {function content_5b29c8b696dbf($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>本月温度</title>
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



        document.getElementById("title").innerHTML=time;



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
                data:date,
            },
            dataZoom: [{
                type: 'inside',
                start: 0,
                end: 10
            }, {
                start: 0,
                end: 10,
                handleIcon: 'M10.7,11.9v-1.3H9.3v1.3c-4.9,0.3-8.8,4.4-8.8,9.4c0,5,3.9,9.1,8.8,9.4v1.3h1.3v-1.3c4.9-0.3,8.8-4.4,8.8-9.4C19.5,16.3,15.6,12.2,10.7,11.9z M13.3,24.4H6.7V23h6.6V24.4z M13.3,19.6H6.7v-1.4h6.6V19.6z',
                handleSize: '80%',
                handleStyle: {
                    color: '#fff',
                    shadowBlur: 3,
                    shadowColor: 'rgba(0, 0, 0, 0.6)',
                    shadowOffsetX: 2,
                    shadowOffsetY: 2
                }
            }],
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