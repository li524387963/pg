<?php
namespace Home\Controller;
use Tools\HomeController;  
use Think\Controller;
class AcaddController extends HomeController {
public function acTab(){
		if($_POST['aip']=='ios' || $_POST['aip']=='an'){
			$devSelect=M('device')->select();
			$jarr=array('ret'=>array('ret_message'=>'select ok','status_code'=>10000108,'data'=>$devSelect));
      echo json_encode(array('UserInfo'=>$jarr));
      exit;
		}
		//$_SESSION['name']=1;
		//if($_SESSION['name']){
			//$devSelect=M('device')->where(array('flag'=>1))->select();
			$devSelect=M('device')->where(array('flag'=>1))->order('devid asc')->select();
			//dump($devSelect);
			 if($devSelect){
                        $this->assign('devSelect',$devSelect);
                        }else{
                        $this->assign('ret',"20000004");
                      }
		//}
		if($_POST['devid']){
                  $postArr=array();
                  $devid = intval($_POST['devid']);
                  $postArr['devid']=intval($_POST['devid']);

                  if($devSelect=M('device')->where(array('flag'=>1))->order('devid asc')->where($postArr)->select()){
                  	    		//dump($selectSql);
                  	    		$this->assign('devSelect',$devSelect);
                  	    	}else{
                  	    		//echo "<script type='text/javascript'>alert('查询的结果不存在');distory.back();</script>";
                  	    		$this->assign('ret',"20000001");
                  	    	}
          }



		$this->display();
	}
	//public function mineTab(){
	//if($_POST){
//       session_start();
//
//       $_SESSION = array(); //清除SESSION值.
//      // echo $_COOKIE[session_name()];
//        if(isset($_COOKIE[session_name()])){  //判断客户端的cookie文件是否存在,存在的话将其设置为过期.
//                setcookie(session_name(),'',time()-1,'/');
//         }
//         session_destroy();  //清除服务器的sesion文件

      //   $this->assign('ret','10000108');

//    }
//
//
//
//    $this->display();
//	}
    public function add(){
    	//var_dump($_POST);
        if($_POST['aip']=='ios' || $_POST['aip']=='an'){
            if(!is_numeric($_POST['temp'])){
                $jarr=array('ret'=>array('ret_message'=>'temp is number','status_code'=>10000009));
                echo json_encode(array('UserInfo'=>$jarr));
                exit;
            }
            if(is_numeric($_POST['temp'])){
                $postArr=array(
                    'temp1'=>$_POST['temp'],
                    'devid'=>intval($_POST['devid']),
                    'time'=>time()
                );
                //var_dump($postArr);
                if($addSql=M('access')->add($postArr)){
                    $jarr=array('ret'=>array('ret_message'=>'ok','status_code'=>10000000,'data'=>M('access')->where(array('id'=>$addSql))->find()));
                    echo json_encode(array('UserInfo'=>$jarr));
                    exit;
                }else{
                    echo 'error'.$addSql;
                    exit;
                } 
            }
            exit;
        }
        if(is_numeric($_POST['temp'])){
            $postArr=array(
                'temp1'=>$_POST['temp'],
                'devid'=>intval($_POST['devid']),
                'time'=>time(),
            );
            //var_dump($postArr);
            if($addSql=M('access')->add($postArr)){
                echo "<script type='text/javascript'>alert('插入成功');distory.back();</script>";
            }else{
                echo "<script type='text/javascript'>alert('插入失败');distory.back();</script>";
            } 
        }
    	
       $this->display();
    }

    public function save(){
        if($_POST['aip']=='ios' || $_POST['aip']=='an'){
            if(!is_numeric($_POST['temp']) || !is_numeric($_POST['devid']) ){
                 $jarr=array('ret'=>array('ret_message'=>'devid temp is number','status_code'=>10000009));
                    echo json_encode(array('UserInfo'=>$jarr));
                    exit;
            }
            $postArr=array(
            'temp1'=>$_POST['temp'],
            //'time'=>time(),
            );
            $idSql=M('access')->where(array('devid'=>intval($_POST['devid'])))->order('id desc')->find();
            $id=$idSql['id'];

            if($saveSql=M('access')->where(array('id'=>$id))->save($postArr)){
                $jarr=array('ret'=>array('ret_message'=>'ok','status_code'=>10000002,'data'=>M('access')->where(array('devid'=>intval($_POST['devid'])))->order('id desc')->find()));
                    echo json_encode(array('UserInfo'=>$jarr));
                    exit;
                
            }else{
                $jarr=array('ret'=>array('ret_message'=>'error','status_code'=>10000003));
                    echo json_encode(array('UserInfo'=>$jarr));
            }
            exit;
        }
        if($_POST){
            if(!is_numeric($_POST['temp']) || !is_numeric($_POST['devid']) ){
                
                echo "<script type='text/javascript'>alert('devid temp is number');distory.back();</script>";
                $this->display();
                    exit;
            }
            $postArr=array(
            'temp1'=>$_POST['temp'],
            //'time'=>time(),
            );
            $idSql=M('access')->where(array('devid'=>intval($_POST['devid'])))->order('id desc')->find();
            $id=$idSql['id'];

            if($saveSql=M('access')->where(array('id'=>$id))->save($postArr)){
               echo "<script type='text/javascript'>alert('ok');distory.back();</script>";
                $this->display();
                    exit;
                
            }else{
                echo "<script type='text/javascript'>alert('error');distory.back();</script>";
                $this->display();
                    exit;
            }
            exit;
        }
    	
       $this->display();

    }

    public function delete(){
        if($_POST['aip']=='ios' || $_POST['aip']=='an'){
            if(!is_numeric($_POST['devid'])){
                $jarr=array('ret'=>array('ret_message'=>'devid is number','status_code'=>10000009));
                echo json_encode(array('UserInfo'=>$jarr));
                exit;
            }
            if(!empty($_POST['devid']) && is_numeric($_POST['devid'])){
                $postArr=array(
                    'devid'=>intval($_POST['devid'])
                );
                $idSql=M('access')->where($postArr)->field('id')->find();
                $id=$idSql['id'];
                //var_dump($postArr);
                if($delSql=M('access')->where(array('id'=>$id))->delete()){
                    $jarr=array('ret'=>array('ret_message'=>'ok','status_code'=>10000004));
                    echo json_encode(array('UserInfo'=>$jarr));
                }else{
                    $jarr=array('ret'=>array('ret_message'=>'error','status_code'=>10000005));
                    echo json_encode(array('UserInfo'=>$jarr));
                } 
            }
            exit;
        }
        if(!empty($_POST['devid']) && is_numeric($_POST['devid'])){
            $postArr=array(
                'devid'=>intval($_POST['devid'])
                
            );
            //var_dump($postArr);
            if($delSql=M('access')->where($postArr)->delete()){
                echo "<script type='text/javascript'>alert('删除成功');distory.back();</script>";
            }else{
                echo "<script type='text/javascript'>alert('删除失败');distory.back();</script>";
            } 
        }
    	
       $this->display();

    }

    public function select(){
        if($_POST['aip']=='ios' || $_POST['aip']=='an'){
            if(!is_numeric($_POST['devid'])){
                $jarr=array('ret'=>array('ret_message'=>'devid is number','status_code'=>10000009));
                echo json_encode(array('UserInfo'=>$jarr));
                exit;
            }
            $postArr=array(
                'devid'=>intval($_POST['devid'])
                );
            //var_dump($postArr);
            if($selectSql=M('access')->where($postArr)->order('id desc')->select()){
                $jarr=array('ret'=>array('ret_message'=>'ok','status_code'=>10000006,'data'=>$selectSql));
                    echo json_encode(array('UserInfo'=>$jarr));
            }else{
                $jarr=array('ret'=>array('ret_message'=>'error','status_code'=>10000007));
                    echo json_encode(array('UserInfo'=>$jarr));
            }
            exit;
        }

        if($_POST){
           // $_POST['devid']=$_POST['devid']?$_POST['devid']:$_GET['devid'];
        	//$id = intval($_POST['devid']);
        	$id = intval($_GET['devid']);
        	 $flag = intval($_GET['flag']);
        	//$this -> assign('devid',$id);


          //	echo $flag;
        	$time =  $_POST['time'];
        	$time2 =  $_POST['time2'];
        	$this->assign('startTime',$time);
            $this->assign('endTime',$time2);

        	$start_time = strtotime($time);
        	//$start_time = date("Y-m-d 0:0:0", strtotime(time));
        //	echo $start_time;
        	//$end_time = $start_time+86400;

        	$end_time = strtotime($time2)+86399;
        	//echo $end_time;
        	//var_dump($start_time);
        	//var_dump($end_time);
            //var_dump($postArr);
            
            if($selectSql=M('access')->where('devid ='.$id.' and time >= '.$start_time.' and time <= '.$end_time)->order('id desc')->select()){
                //var_dump($selectSql);
                $this->assign('startTime',$time);
                $this->assign('endTime',$time2);

                $this->assign('id',$id);
                $this->assign('flag',$flag);
                $this->assign('selectSql',$selectSql);
            }else{
            		$this->assign('startTime',$time);
                    $this->assign('endTime',$time2);
                    $this->assign('ret',"20000001");
               // echo "<script type='text/javascript'>alert('没有查询到结果.');distory.back();</script>";
            }
        }else{
        	$date = date("Y/m/d");
        	$id = intval($_GET['devid']);
            $flag = intval($_GET['flag']);
            $this->assign('startTime',$date);
            $this->assign('endTime',$date);
        	$start_time = strtotime($date);
        	$end_time = strtotime($date)+86399;
        	if($selectSql=M('access')->where('devid ='.$id.' and time >= '.$start_time.' and time <= '.$end_time)->order('id desc')->select()){
                            //var_dump($selectSql);
                            $this->assign('startTime',$date);
                            $this->assign('endTime',$date);

                            $this->assign('id',$id);
                            $this->assign('flag',$flag);
                            $this->assign('selectSql',$selectSql);
                        }else{
                        		$this->assign('startTime',$date);
                                $this->assign('endTime',$date);
                                $this->assign('ret',"20000002");

                        }
    	  }
       $this->display();

    }
}