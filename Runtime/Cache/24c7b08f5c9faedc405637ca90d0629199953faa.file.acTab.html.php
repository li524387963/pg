<?php /* Smarty version Smarty-3.1.6, created on 2018-06-29 11:27:39
         compiled from "F:/Apache24/htdocs/pg/Home/View\Acadd\acTab.html" */ ?>
<?php /*%%SmartyHeaderCode:1525319815b35a72b8c2c37-51740895%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24c7b08f5c9faedc405637ca90d0629199953faa' => 
    array (
      0 => 'F:/Apache24/htdocs/pg/Home/View\\Acadd\\acTab.html',
      1 => 1530165906,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1525319815b35a72b8c2c37-51740895',
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
  'unifunc' => 'content_5b35a72b9c87f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b35a72b9c87f')) {function content_5b35a72b9c87f($_smarty_tpl) {?><!DOCTYPE html>
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
	<!--<script src="<?php echo @AJS_URL;?>
jquery-2.1.4/jquery.min.js"></script>-->
	
	<!--&lt;!&ndash; 新 Bootstrap 核心 CSS 文件 &ndash;&gt;-->
	<!--&lt;!&ndash; <link rel="stylesheet" href="<?php echo @ABOOT_URL;?>
css/bootstrapone.css"> &ndash;&gt;-->
	<!--<link rel="stylesheet" href="<?php echo @ABOOT_URL;?>
css/bootstrap.css">-->
  <!--&lt;!&ndash; DataTables &ndash;&gt;-->
  <!--<link href="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />-->
  <!--<link href="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />-->
  <!--&lt;!&ndash; Responsive datatable examples &ndash;&gt;-->
  <!--<link href="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />-->
  <!--&lt;!&ndash; Buttons examples &ndash;&gt;-->
      <!--<script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/dataTables.buttons.min.js"></script>-->
  <!--<script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/buttons.bootstrap4.min.js"></script>-->
  <!--<script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/jszip.min.js"></script>-->
  <!--<script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/pdfmake.min.js"></script>-->
  <!--<script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/vfs_fonts.js"></script>-->
  <!--<script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/buttons.html5.min.js"></script>-->
  <!--<script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/buttons.print.min.js"></script>-->
  <!--&lt;!&ndash; Responsive examples &ndash;&gt;-->
  <!--<script src="<?php echo @PUBLIC_ROOT_URL;?>
plugins/datatables/dataTables.responsive.min.js"></script>-->
	<!--&lt;!&ndash; 最新的 Bootstrap 核心 JavaScript 文件 &ndash;&gt;-->
	<!--<script src="<?php echo @ABOOT_URL;?>
js/bootstrap.min.js"></script>-->


</head>
<!--<style>-->
	<!--b {color: #23527C;}-->
<!--</style>-->
<body>

    <div class="weui-tab">
        <div class="weui-tab__bd">


            <div id="tab3" class="weui-tab__bd-item weui-tab__bd-item--active">

                <div class="weui-search-bar" id="searchBar">
                    <form class="weui-search-bar__form" action="#" method="post">
                        <div class="weui-search-bar__box">
                            <i class="weui-icon-search"></i>
                            <input type="search" class="weui-search-bar__input" id="searchInput" placeholder="搜索" required="" name="devid">
                            <a href="javascript:" class="weui-icon-clear" id="searchClear"></a>
                        </div>
                        <label class="weui-search-bar__label" id="searchText" style="transform-origin: 0px 0px 0px; opacity: 1; transform: scale(1, 1);">
                            <i class="weui-icon-search"></i>
                            <span>搜索</span>
                        </label>
                    </form>
                    <a href="javascript:" class="weui-search-bar__cancel-btn" id="searchCancel">取消</a>

                </div>
                <div class="weui-panel weui-panel_access">
                    <div class="weui-panel__bd">
                        <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['devSelect']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
                    </div>

                </div>
                <div class="afterLine" style="height: 90px">
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
            <a href="<?php echo @__APP__;?>
/add/deviceTab" class="weui-tabbar__item  ">
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
jquery-2.1.4.js"></script>
    <script src="<?php echo @AJS_URL;?>
jquery-weui.js"></script>
    <script src="<?php echo @AJS_URL;?>
fastclick.js"></script>
    <script>
        $(function() {
            FastClick.attach(document.body);
        });
        var ret = '<?php echo $_smarty_tpl->tpl_vars['ret']->value;?>
';
        if (ret=="20000001"){
            $.toptip('暂无查询数据');
        };
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