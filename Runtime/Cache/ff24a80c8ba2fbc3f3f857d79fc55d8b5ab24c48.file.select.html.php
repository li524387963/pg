<?php /* Smarty version Smarty-3.1.6, created on 2018-07-10 14:35:51
         compiled from "F:/Apache24/htdocs/pg/Home/View\Acadd\select.html" */ ?>
<?php /*%%SmartyHeaderCode:18835013595b3ed98f73bb31-74250181%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ff24a80c8ba2fbc3f3f857d79fc55d8b5ab24c48' => 
    array (
      0 => 'F:/Apache24/htdocs/pg/Home/View\\Acadd\\select.html',
      1 => 1531203803,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18835013595b3ed98f73bb31-74250181',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5b3ed98f8d9c9',
  'variables' => 
  array (
    'selectSql' => 0,
    'flag' => 0,
    'v' => 0,
    'startTime' => 0,
    'endTime' => 0,
    'ret' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b3ed98f8d9c9')) {function content_5b3ed98f8d9c9($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>查询温度</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" href="<?php echo @WEUI_URL;?>
/weui.min.css">
    <link rel="stylesheet" href="<?php echo @WEUI_URL;?>
/jquery-weui.css">
    <link rel="stylesheet" href="<?php echo @WEUI_URL;?>
/demos.css?v=01.01.04">
	<script src="<?php echo @AJS_URL;?>
jquery-2.1.4/jquery.min.js"></script>


</head>
<body>
<div class="weui-tab" >
    <div class="weui-tab__bd">
    <div id="tab3" class="weui-tab__bd-item weui-tab__bd-item--active">
    <form class="form-horizontal" name="f1"      action=""   method="post" >
        <div class="weui-cells weui-cells_form" >

            <div class="weui-cell">
                <div class="weui-cell__hd"><label for="date" class="weui-label">起始日期</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" id="date" type="text" name="time" placeholder="请输入起始日期" >
                </div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__hd"><label for="date" class="weui-label">结束日期</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" id="date1" type="text" name="time2" placeholder="请输入结束日期" >
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


                                <?php if ($_smarty_tpl->tpl_vars['flag']->value==1){?>
                                <img  class="weui-media-box__thumb" src="<?php echo @IMG_URL;?>
/warn.png" alt="" id="flag_img1">
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['flag']->value==2){?>
                                <img  class="weui-media-box__thumb" src="<?php echo @IMG_URL;?>
/warn1.png" alt="" id="flag_img2">
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['flag']->value==3){?>
                                <img  class="weui-media-box__thumb" src="<?php echo @IMG_URL;?>
/warn2.png" alt="" id="flag_img3">
                                <?php }?>

                            </div>
                        </div>
                        <div class="weui-media-box__bd">
                            <h4 class="weui-media-box__title">
                                温度 <?php echo $_smarty_tpl->tpl_vars['v']->value['temp1'];?>
       温度2 <?php echo $_smarty_tpl->tpl_vars['v']->value['temp2'];?>

                                <span class="weui-media-box__title-after">延迟 <?php echo $_smarty_tpl->tpl_vars['v']->value['delay'];?>
  环境温度 <?php echo $_smarty_tpl->tpl_vars['v']->value['env_temp'];?>
</span>
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
/add/deviceTab" class="weui-tabbar__item ">
            <div class="weui-tabbar__icon">
                <img src="<?php echo @IMG_URL;?>
/icon_nav_msg.png" alt="">
            </div>
            <p class="weui-tabbar__label">设备</p>
        </a>
        <a href="<?php echo @__APP__;?>
/acadd/acTab" class="weui-tabbar__item weui-bar__item--on">
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
    $(function() {
        FastClick.attach(document.body);
       // alert('{$devid}');



    });

    $(document).ready(function() {


        var startTime = "<?php echo $_smarty_tpl->tpl_vars['startTime']->value;?>
";
        var endTime = "<?php echo $_smarty_tpl->tpl_vars['endTime']->value;?>
";
        var ret = '<?php echo $_smarty_tpl->tpl_vars['ret']->value;?>
'
        console.log(startTime,endTime)
        document.getElementById("date").value=startTime;
        document.getElementById("date1").value=endTime;
        if (ret=="20000001"){
            $.toptip('暂无查询数据');
        }
        if (ret=="20000002"){
            $.toptip('暂无今日数据');
        }

        // var src = location.href
        // var params = src.split('?');
        // if(params[1]) {
        //     var idparams = params[1].split('=');
        // }
       // console.log(src,idparams[2],date);
       // document.getElementById("name").value=name;


    });


</script>

<script>
    $("#date").calendar({
        onChange: function (p, values, displayValues) {
            console.log(p,values, displayValues);
        }
    });
    $("#date1").calendar({
        onChange: function (p, values, displayValues) {
            console.log(values, displayValues);
        }
    });
    $("#date2").calendar({
        value: ['2016-12-12'],
        dateFormat: 'yyyy年mm月dd日'  // 自定义格式的时候，不能通过 input 的value属性赋值 '2016年12月12日' 来定义初始值，这样会导致无法解析初始值而报错。只能通过js中设置 value 的形式来赋值，并且需要按标准形式赋值（yyyy-mm-dd 或者时间戳)
    });
    $("#date-multiple").calendar({
        multiple: true,
        onChange: function (p, values, displayValues) {
            console.log(values, displayValues);
        }
    });
    $("#date3").calendar({
        container: "#inline-calendar",
        onChange: function (p, values, displayValues) {
            console.log(values, displayValues);
        }
    });
</script>
</html><?php }} ?>