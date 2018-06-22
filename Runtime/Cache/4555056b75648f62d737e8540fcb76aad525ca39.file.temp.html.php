<?php /* Smarty version Smarty-3.1.6, created on 2018-06-22 14:08:42
         compiled from "F:/Apache24/htdocs/pg/Home/View\Value\temp.html" */ ?>
<?php /*%%SmartyHeaderCode:10133887535b2c926ad7d565-86667252%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4555056b75648f62d737e8540fcb76aad525ca39' => 
    array (
      0 => 'F:/Apache24/htdocs/pg/Home/View\\Value\\temp.html',
      1 => 1529573975,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10133887535b2c926ad7d565-86667252',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5b2c926ae9a82',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b2c926ae9a82')) {function content_5b2c926ae9a82($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>曲线图</title>
	<!--<script src="<?php echo @AJS_URL;?>
jquery-2.1.4/jquery.min.js"></script> -->

    <!--<link rel="stylesheet" href="<?php echo @ABOOT_URL;?>
css/bootstrap.css">-->
    <!--&lt;!&ndash; 最新的 Bootstrap 核心 JavaScript 文件 &ndash;&gt;-->
    <!--<script src="<?php echo @ABOOT_URL;?>
js/bootstrap.min.js"></script>-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="Write an awesome description for your new site here. You can edit this line in _config.yml. It will appear in your document head meta (for Google search results) and in your feed.xml site description.
">
	<link rel="stylesheet" href="<?php echo @WEUI_URL;?>
/weui.min.css">
	<link rel="stylesheet" href="<?php echo @WEUI_URL;?>
/jquery-weui.css">
	<link rel="stylesheet" href="<?php echo @WEUI_URL;?>
/demos.css?v=01.01.04">

</head>

<body>


    <div class="weui-tab" >
		<div class="weui-tab__bd">
			<div id="tab1" class="weui-tab__bd-item weui-tab__bd-item--active">
	<!--<div id="container0" style="min-width: 310px; height: 400px; margin: 0 auto"></div>-->


    <!--<div id="container1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>-->

    <!--<div id="container2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>-->
			<!--</div>-->

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
    </div>
</body>
</html>
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
</script>
<script src="<?php echo @AJS_URL;?>
highcharts.js"></script>
<script>
	$(function () {
        var cosPoints = $("#input_1").val();
            cosPoints=eval(cosPoints);
				var cosPoints2 = $("#input_2").val();
						cosPoints2=eval(cosPoints2)
        var time    = $("#input_1_1").val();
            time    = eval(time);
            //alert(time);
    Highcharts.chart('container0', {
        chart: {
            type: 'spline'
        },
        title: {
            text: '温度图1'
        },
        subtitle: {
            text: '每日一图 1'
        },
        xAxis: {
            type: 'datetime',
            labels: {
                overflow: 'justify'
            }
        },
        yAxis: {
            title: {
                text: '摄氏度'
            },
            minorGridLineWidth: 0,
            gridLineWidth: 0,
            alternateGridColor: null,
            plotBands: [{ // Light air
                from: 0.3,
                to: 1.5,
                color: 'rgba(68, 170, 213, 0.1)',
                label: {
                    text: '',
                    style: {
                        color: '#606060'
                    }
                }
            }, { // Light breeze
                from: 1.5,
                to: 3.3,
                color: 'rgba(0, 0, 0, 0)',
                label: {
                    text: '',
                    style: {
                        color: '#606060'
                    }
                }
            }, { // Gentle breeze
                from: 3.3,
                to: 5.5,
                color: 'rgba(68, 170, 213, 0.1)',
                label: {
                    text: '',
                    style: {
                        color: '#606060'
                    }
                }
            }, { // Moderate breeze
                from: 5.5,
                to: 8,
                color: 'rgba(0, 0, 0, 0)',
                label: {
                    text: '',
                    style: {
                        color: '#606060'
                    }
                }
            }, { // Fresh breeze
                from: 8,
                to: 11,
                color: 'rgba(68, 170, 213, 0.1)',
                label: {
                    text: '',
                    style: {
                        color: '#606060'
                    }
                }
            }, { // Strong breeze
                from: 11,
                to: 14,
                color: 'rgba(0, 0, 0, 0)',
                label: {
                    text: '',
                    style: {
                        color: '#606060'
                    }
                }
            }, { // High wind
                from: 14,
                to: 15,
                color: 'rgba(68, 170, 213, 0.1)',
                label: {
                    text: '',
                    style: {
                        color: '#606060'
                    }
                }
            }]
        },
        tooltip: {
            valueSuffix: ' 摄氏度'
        },
        plotOptions: {
            spline: {
                lineWidth: 3,
                states: {
                    hover: {
                        lineWidth: 5
                    }
                },
                marker: {
                    enabled: false
                },
                pointInterval: 3600000, // one hour,毫秒数
                pointStart: Date.UTC(time[0],time[1],time[2],time[3],time[4],time[5])
            }
        },
        series: [{
            name: 'Your device',
            data: cosPoints

        }],
        navigation: {
            menuItemStyle: {
                fontSize: '20px'
            }
        }
    });



    Highcharts.chart('container1', {
        chart: {
            type: 'spline'
        },
        title: {
            text: '温度图2'
        },
        subtitle: {
            text: '每日一图 2'
        },
        xAxis: {
            type: 'datetime',
            labels: {
                overflow: 'justify'
            }
        },
        yAxis: {
            title: {
                text: '摄氏度'
            },
            minorGridLineWidth: 0,
            gridLineWidth: 0,
            alternateGridColor: null,
            plotBands: [{ // Light air
                from: 0.3,
                to: 1.5,
                color: 'rgba(68, 170, 213, 0.1)',
                label: {
                    text: '',
                    style: {
                        color: '#606060'
                    }
                }
            }, { // Light breeze
                from: 1.5,
                to: 3.3,
                color: 'rgba(0, 0, 0, 0)',
                label: {
                    text: '',
                    style: {
                        color: '#606060'
                    }
                }
            }, { // Gentle breeze
                from: 3.3,
                to: 5.5,
                color: 'rgba(68, 170, 213, 0.1)',
                label: {
                    text: '',
                    style: {
                        color: '#606060'
                    }
                }
            }, { // Moderate breeze
                from: 5.5,
                to: 8,
                color: 'rgba(0, 0, 0, 0)',
                label: {
                    text: '',
                    style: {
                        color: '#606060'
                    }
                }
            }, { // Fresh breeze
                from: 8,
                to: 11,
                color: 'rgba(68, 170, 213, 0.1)',
                label: {
                    text: '',
                    style: {
                        color: '#606060'
                    }
                }
            }, { // Strong breeze
                from: 11,
                to: 14,
                color: 'rgba(0, 0, 0, 0)',
                label: {
                    text: '',
                    style: {
                        color: '#606060'
                    }
                }
            }, { // High wind
                from: 14,
                to: 15,
                color: 'rgba(68, 170, 213, 0.1)',
                label: {
                    text: '',
                    style: {
                        color: '#606060'
                    }
                }
            }]
        },
        tooltip: {
            valueSuffix: ' 摄氏度'
        },
        plotOptions: {
            spline: {
                lineWidth: 3,
                states: {
                    hover: {
                        lineWidth: 5
                    }
                },
                marker: {
                    enabled: false
                },
                pointInterval: 3600000, // one hour,毫秒数
                pointStart: Date.UTC(time[0],time[1],time[2],time[3],time[4],time[5])
            }
        },
        series: [{
            name: 'Your device',
            data: cosPoints2

        }],
        navigation: {
            menuItemStyle: {
                fontSize: '20px'
            }
        }
    });





});
</script><?php }} ?>