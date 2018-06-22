<?php

namespace Home\Controller;
use Tools\HomeController; 
use Think\Controller;
$GLOBALS['currdate']=1;

$a=123;
//$currdate=1;

class ValueController extends HomeController {

	public function value(){
		//$_POST['devid']=0;
		if(isset($_POST['devid']) && ($_POST['aip']=='ios' || $_POST['aip']=='an')){
			
		for($i=0;$i<8;$i++){
			//前七天范围,到过去第八天
			if($i==0){
				//当前时间戳
				${'beginday'.$i}=mktime(0,0,0,date('m'),date('d'),date('Y'));
				${'endday'.$i}	=time();
			}else{
				${'beginday'.$i}=mktime(0,0,0,date('m'),date('d')-$i,date('Y'));
				${'endday'.$i}	=mktime(23,59,59,date('m'),date('d')-$i,date('Y'));
			}
			
			//前七周范围,到过去第八周
			${'beginweek'.$i}=mktime(0,0,0,date('m'),date('d')-date('w')+1-7*$i,date('Y'));
			${'endweek'.$i}	 =mktime(23,59,59,date('m'),date('d')-date('w')+7-7*$i,date('Y'));
			//前七个月范围,到过去第八个月
			${'beginmonth'.$i}=mktime(0,0,0,date('m')-$i,1,date('Y'));
			if($i==0){//本月
			 	${'endmonth'.$i}	 =mktime(23,59,59,date('m'),date('t'),date('Y'));
			}else{
				${'endmonth'.$i}=mktime(0,0,0,date('m')-$i+1,1,date('Y'));
			}
			${'beginyear'.$i}=mktime(0,0,0,date('1'),date('1'),date('Y')-$i);
			${'endyear'.$i}	 =mktime(23,59,59,date('12'),date('31'),date('Y')-$i);

			

			$str="devid = ".$_POST['devid']." and time BETWEEN ".${'beginday'.$i}." AND ".${'endday'.$i};
			${'accessday'.$i}=M('access')->where($str)->select();



			//echo $str="devid = ".$_POST['devid']." and time BETWEEN ".${'beginday'.$i}." AND ".${'endday'.$i};
			$str1="devid = ".$_POST['devid']." and time BETWEEN ".${'beginweek'.$i}." AND ".${'endweek'.$i};

			${'accessweek'.$i}=D('access')->where($str1)->order('id desc')->select();





			$str2="devid = ".$_POST['devid']." and time BETWEEN ".${'beginmonth'.$i}." AND ".${'endmonth'.$i};

			${'accessmonth'.$i}=D('access')->where($str2)->order('id desc')->select();





			$str3="devid = ".$_POST['devid']." and time BETWEEN ".${'beginyear'.$i}." AND ".${'endyear'.$i};

			${'accessyear'.$i}=D('access')->where($str3)->order('id desc')->select();



			
	
		}



		$jarr=array('ret'=>array("ret_message"=>'ok','status_code'=>10000400,
										'data'=>array(
                                                '7day'=>array( array('day'=>$accessday0),
    		                                                   array('day'=>$accessday1),
    		                                                   array('day'=>$accessday2),
    		                                                   array('day'=>$accessday3),
    		                                                   array('day'=>$accessday4),
    		                                                   array('day'=>$accessday5),
    		                                                   array('day'=>$accessday6),
    		                                                   array('day'=>$accessday7)
		                                                             ),
			                                       '7week'=>array(array('week'=>$accessweek0),
			                                                      array('week'=>$accessweek1),
			                                                      array('week'=>$accessweek2),
			                                                      array('week'=>$accessweek3),
			                                                      array('week'=>$accessweek4),
			                                                      array('week'=>$accessweek5),
			                                                      array('week'=>$accessweek6),
			                                                      array('week'=>$accessweek7),
			                                                      ),
		                                        
		                                        '7month'=>array(array('month'=>$accessmonth0),
														        array('month'=>$accessmonth1),
														        array('month'=>$accessmonth2),
														        array('month'=>$accessmonth3),
														        array('month'=>$accessmonth4),
														        array('month'=>$accessmonth5),
														        array('month'=>$accessmonth6),
														        array('month'=>$accessmonth7),
														        ),
		                                        /*'7year'=>array(array('year'=>$accessyear0),
														       array('year'=>$accessyear1),
														       array('year'=>$accessyear2),
														       array('year'=>$accessyear3),
														       array('year'=>$accessyear4),
														       array('year'=>$accessyear5),
														       array('year'=>$accessyear6),
														       array('year'=>$accessyear7),
														       ),*/
		                                )
			    				)
                );
		echo json_encode(array('UserInfo'=>$jarr));exit;
		}
		


	}

	public function temp(){
		$_POST['devid']=$_POST['devid']?$_POST['devid']:$_GET['devid'];
		//$ajarr=M('access')->where(array('devid'=>(int)$_POST['devid']))->field('temp1,time')->select();
		$time   =date('Y,m,d,H,i,s',mktime(0,0,0,date('m'),date('d'),date('Y')));
		for($i=0;$i<144;$i++){
			$start_time = mktime(0,0,0,date('m'),date('d'),date('Y'));
			//var_dump($i);
			${'beginday'.$i}=$start_time+$i*(60*10)*6;
			${'endday'.$i}=$start_time+($i+1)*(60*10)*6;
			//var_dump(${'beginday'.$i});
			//var_dump(${'endday'.$i});
			$str="devid = ".$_POST['devid']." and time BETWEEN ".${'beginday'.$i}." AND ".${'endday'.$i};
			${'accessday'.$i}=M('access')->where($str)->field('temp1,temp2,time,cur_time')->limit(0,1)->select();
			if(count(${'accessday'.$i})>0){
				$c_temp1 = ${'accessday'.$i};
				//var_dump($c_temp1);
				//var_dump($c_temp1[0]['temp1']);
				$temp1=(float)$c_temp1[0]['temp1'];
				$temp2=(float)$c_temp1[0]['temp2'];
			}else{
				$temp1=NULL;
				$temp2=NULL;
			}
			//var_dump($temp1);
			$temp1_1[]=$temp1;
			$temp2_1[]=$temp2;
	  }
	  //exit;
		$time   =date('Y,m,d,H,i,s',mktime(0,0,0,date('m'),date('d'),date('Y')));
		//var_dump($time);
			
    //foreach($ajarr as $value){
    	
    	//$temp1_1[]=(int)$value['temp1'];
    	//$time   =date('Y,m,d,H,i,s',$value['time']);
    	//$time1[]=$time;
    	//var_dump($temp1_1);
    //}
    $time=explode(',', $time);
    //var_dump($time);
    foreach($time as $value){
    	$time1[]=(int)$value;
    }
		$temp1_1=json_encode($temp1_1);
		$temp2_1=json_encode($temp2_1);
		$time1 =json_encode($time1);
		//var_dump($temp2_1);
	  //exit;
		$this->assign('temp1_1',$temp1_1);
		$this->assign('temp2_1',$temp2_1);
		$this->assign('time',$time1);
		$this->display();
	}

	public function calendar(){
        $devid=$_GET["devid"];

        $postArr=array();
        $postArr['devid']=$devid;
        $accSelect=M('access')->where($postArr)->order('time asc')->select();
        $first = reset($accSelect);
        $end = end($accSelect);

        $firstDay = substr($first[cur_time],0,strpos($first[cur_time],' '));//开始日期
        $endDay = substr($end[cur_time],0,strpos($end[cur_time],' '));//最后日期

        $days = (strtotime($endDay)-strtotime($firstDay))/86400+1;//天数
        $startStr = $firstDay . '00:00:00';
        $endStr = $firstDay .  '23:59:59';

        $startTime = strtotime($startStr);
        $endTime = strtotime($endStr);

        $jarr = array();
        $jsArr = array();
        for($i=0;$i<$days;$i++){
              $start = $startTime+86400*$i;
              $end = $endTime+86400*$i;
              $postArr['time']=array('between',array($start,$end));
              if($selectSql=M('access')->where($postArr)->order('time desc')->select()){
                    $curtime=($selectSql[0][cur_time]);
                    $day= substr($curtime,0,strpos($curtime,' '));
                    $jarr= array('day'=>$day,"price"=>$selectSql[0][temp1]);
                    array_push($jsArr,$jarr);

              }

        };
        $this->assign('data',json_encode($jsArr));
        $this->assign('date',$date);
        $this->display();
	}
	public function todayValue(){
        $devid = $_GET["devid"];
        $date = $_GET["date"];
        $postArr = array();
        $postArr['devid'] = $devid;
        $endDay = date($date);
        $firstDay = date('Y-m-d', strtotime("$endDay -4 day"));
        $days = (strtotime($endDay)-strtotime($firstDay))/86400+1;//天数
        $startStr = $firstDay . '00:00:00';
        $endStr = $firstDay .  '23:59:59';
        $startTime = strtotime($startStr);
        $endTime = strtotime($endStr);
        $dateArr = array();
        $temp1Arr = array();
        $temp2Arr = array();
        for($i=0;$i<$days;$i++){
              $start = $startTime+86400*$i;
              $end = $endTime+86400*$i;
              $postArr['time']=array('between',array($start,$end));
              if($selectSql=M('access')->where($postArr)->order('time desc')->select()){
                 $todayData = array_slice($selectSql,0,8);
                 $dataCount= count($todayData);
                 if($dataCount<8){
                     for($j=0;$j<$dataCount;$j++){
                         $time=($selectSql[$j][time]);
                         $date=date('m-d H:i',$time);
                       //  $date=date('m-d ',$time) . $j*3 . ':00';
                         //var_dump($time);
                         array_push($dateArr,$date);
                         array_push($temp1Arr,$todayData[$j][temp1]);
                         array_push($temp2Arr,$todayData[$j][temp2]);
                     }
                 }else{
                     for($j=0;$j<8;$j++){
                           $time=($selectSql[$j][time]);
                           $date=date('m-d H:i',$time);
                         // $date=date('m-d ',$time) . $j*3 . ':00';

                           array_push($dateArr,$date);
                           array_push($temp1Arr,$todayData[$j][temp1]);
                           array_push($temp2Arr,$todayData[$j][temp2]);
                     }
                 }
              }
        };





//        $startStr = $date . '00:00:00';
//        $endStr = $date .  '23:59:59';
//        $startTime = strtotime($startStr);
//        $endTime = strtotime($endStr);
//        $postArr['time'] = array('between',array($startTime,$endTime));
//        $accSelect = M('access')->where($postArr)->order('time asc')->select();
//        $todayData = array_slice($accSelect,0,8);
//        $dateArr = array();
//        $temp1Arr = array();
//        $temp2Arr = array();
//        $dataCount= count($todayData);
//        if($dataCount<8){
//            for($i=0;$i<$dataCount;$i++){
//                $time=($accSelect[$i][time]);
//                $date=date('H:i',$time);
//                array_push($dateArr,$date);
//                array_push($temp1Arr,$todayData[$i][temp1]);
//                array_push($temp2Arr,$todayData[$i][temp2]);
//            }
//        }else{
//            for($i=0;$i<8;$i++){
//                  $time=($accSelect[$i][time]);
//                  $date=date('H:i',$time);
//                  array_push($dateArr,$date);
//                  array_push($temp1Arr,$todayData[$i][temp1]);
//                  array_push($temp2Arr,$todayData[$i][temp2]);
//            }
//
//        }







        $this->assign('temp1Arr',json_encode(array_reverse($temp1Arr)));
        $this->assign('temp2Arr',json_encode(array_reverse($temp2Arr)));
        $this->assign('dateArr',json_encode(array_reverse($dateArr)));

        $this->display();

	}
	public function monthValue(){
	    $devid = $_GET["devid"];
        $date = $_GET["date"];
        $postArr = array();
        $postArr['devid'] = $devid;

        $firstDay = date($date . '-01');
        $endDay = date('Y-m-d', strtotime("$firstDay +1 month -1 day"));
        $days = (strtotime($endDay)-strtotime($firstDay))/86400+1;//天数
        $startStr = $firstDay . '00:00:00';
        $endStr = $firstDay .  '23:59:59';
        $startTime = strtotime($startStr);
        $endTime = strtotime($endStr);
        $dateArr = array();
        $temp1Arr = array();
        $temp2Arr = array();
        for($i=0;$i<$days;$i++){
              $start = $startTime+86400*$i;
              $end = $endTime+86400*$i;
              $postArr['time']=array('between',array($start,$end));
              if($selectSql=M('access')->where($postArr)->order('time asc')->select()){

                 $todayData = array_slice($selectSql,0,8);
                 $dataCount= count($todayData);
                 if($dataCount<8){
                     for($j=0;$j<$dataCount;$j++){
                         $time=($selectSql[$j][time]);
                         $date=date('m-d H:i',$time);
                       //  $date=date('m-d ',$time) . $j*3 . ':00';
                         //var_dump($time);
                         array_push($dateArr,$date);
                         array_push($temp1Arr,$todayData[$j][temp1]);
                         array_push($temp2Arr,$todayData[$j][temp2]);
                     }
                 }else{
                     for($j=0;$j<8;$j++){
                           $time=($selectSql[$j][time]);
                           $date=date('m-d H:i',$time);
                         // $date=date('m-d ',$time) . $j*3 . ':00';

                           array_push($dateArr,$date);
                           array_push($temp1Arr,$todayData[$j][temp1]);
                           array_push($temp2Arr,$todayData[$j][temp2]);
                     }
                 }
              }
        };

        $this->assign('temp1Arr',json_encode($temp1Arr));
        $this->assign('temp2Arr',json_encode($temp2Arr));
        $this->assign('dateArr',json_encode($dateArr));
        $this->display();


	}
}