<?php /* Smarty version Smarty-3.1.6, created on 2018-07-10 13:27:36
         compiled from "F:/Apache24/htdocs/pg/Home/View\Add\select.html" */ ?>
<?php /*%%SmartyHeaderCode:3136836385b4443c8015a74-65669870%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0896cb9ffbfc1cff77807b8712843217d8084b6' => 
    array (
      0 => 'F:/Apache24/htdocs/pg/Home/View\\Add\\select.html',
      1 => 1530168103,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3136836385b4443c8015a74-65669870',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'selectSql' => 0,
    'value' => 0,
    'devid' => 0,
    'shed' => 0,
    'column' => 0,
    'ret' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5b4443c80bda2',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b4443c80bda2')) {function content_5b4443c80bda2($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>select</title>
	<!--<script src="<?php echo @AJS_URL;?>
jquery-2.1.4/jquery.min.js"></script>-->
	<!---->
	<!--&lt;!&ndash; 新 Bootstrap 核心 CSS 文件 &ndash;&gt;-->
	<!--&lt;!&ndash;<link rel="stylesheet" href="<?php echo @ABOOT_URL;?>
css/bootstrapone.css">&ndash;&gt;-->
	<!--<link rel="stylesheet" href="<?php echo @ABOOT_URL;?>
css/bootstrap.css">-->
	<!--&lt;!&ndash; 最新的 Bootstrap 核心 JavaScript 文件 &ndash;&gt;-->
	<!--<script src="<?php echo @ABOOT_URL;?>
js/bootstrap.min.js"></script>-->

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <link rel="stylesheet" href="<?php echo @WEUI_URL;?>
/weui.css?v=01.01.05">
  <link rel="stylesheet" href="<?php echo @WEUI_URL;?>
/jquery-weui.css?v=01.01.04">
  <link rel="stylesheet" href="<?php echo @WEUI_URL;?>
/demos.css?v=01.01.04">

</head>
<body>

<div class="weui-tab">
  <div class="weui-tab__bd">
  <div id="tab2" class="weui-tab__bd-item weui-tab__bd-item--active">
  <form class="form-horizontal" name="f1" id="form1"    action=""   method="post" >
    <div class="weui-cells weui-cells_form" >
      <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">设备ID</label></div>
        <div class="weui-cell__bd">
          <input class="weui-input" type="text" name="devid"  placeholder="请输入设备ID号" id="devid">
        </div>
      </div>
      <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">栅</label></div>
        <div class="weui-cell__bd">
          <input class="weui-input" type="text" name="shed"  placeholder="请输入多少栅" id="shed">
        </div>
      </div>
      <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">栏</label></div>
        <div class="weui-cell__bd">
          <input class="weui-input" type="text" name="column"  placeholder="请输入多少栏" id="column">
        </div>
      </div>
    </div>
    <div class="weui-btn-area">
      <button class="weui-btn weui-btn_primary" type="submit">查询</button>
    </div>
  </form>
    <?php if (!empty($_smarty_tpl->tpl_vars['selectSql']->value)){?>

    <div class="weui-panel weui-panel_access">
      <div class="weui-panel__bd">
        <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['selectSql']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
        <a href="<?php echo @__APP__;?>
/Acadd/select?devid=<?php echo $_smarty_tpl->tpl_vars['value']->value['devid'];?>
&flag=<?php echo $_smarty_tpl->tpl_vars['value']->value['flag'];?>
" class="weui-media-box weui-media-box_appmsg">
          <div class="weui-media-box__hd">
            <?php if (($_smarty_tpl->tpl_vars['value']->value['state'])==1){?>
            <img  class="weui-media-box__thumb" src="<?php echo @IMG_URL;?>
/warn.png" alt="" id="flag_img">
            <?php }?>
            <?php if (($_smarty_tpl->tpl_vars['value']->value['state'])==2){?>
            <img  class="weui-media-box__thumb" src="<?php echo @IMG_URL;?>
/warn1.png" alt="" >
            <?php }?>
            <?php if (($_smarty_tpl->tpl_vars['value']->value['state'])==3){?>
            <img  class="weui-media-box__thumb" src="<?php echo @IMG_URL;?>
/warn2.png" alt="" >
            <?php }?>
          </div>
          <div class="weui-media-box__bd">
            <h4 class="weui-media-box__title">
              设备号 <?php echo $_smarty_tpl->tpl_vars['value']->value['devid'];?>

              <span class="weui-media-box__title-after">棚 <?php echo $_smarty_tpl->tpl_vars['value']->value['shed'];?>
  栅<?php echo $_smarty_tpl->tpl_vars['value']->value['column'];?>
</span>
            </h4>
            <p class="weui-media-box__desc">时间 <?php echo $_smarty_tpl->tpl_vars['value']->value['time'];?>
</p>
          </div>
        </a>
        <?php } ?>
        <div class="weui-panel weui-panel_access">
          <a  class="weui-media-box weui-media-box_appmsg">
            <div class="weui-media-box__hd">
              <img class="weui-media-box__thumb"  alt="">
            </div>
            <div class="weui-media-box__bd">
              <h4 class="weui-media-box__title">

                <span class="weui-media-box__title-after"> </span>
              </h4>
              <p class="weui-media-box__desc"> </p>
            </div>
          </a>
        </div>


      </div>
    </div>

    <?php }?>
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
/mine/mineTab" class="weui-tabbar__item">
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
        // alert('{$devid}');
    });

    $(document).ready(function() {


        var devid = "<?php echo $_smarty_tpl->tpl_vars['devid']->value;?>
";
        var shed = "<?php echo $_smarty_tpl->tpl_vars['shed']->value;?>
";
        var column = "<?php echo $_smarty_tpl->tpl_vars['column']->value;?>
";
        var ret = '<?php echo $_smarty_tpl->tpl_vars['ret']->value;?>
';

        document.getElementById("devid").value=devid;
        document.getElementById("shed").value=shed;
        document.getElementById("column").value=column;
        if (ret=="20000001"){
            $.toptip('暂无查询数据');
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
</html><?php }} ?>