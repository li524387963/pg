<?php
namespace Home\Controller;
use Tools\HomeController; 
use Think\Controller;
class AddController extends HomeController {
    public function add(){
    	if($_POST['aip']=='ios' || $_POST['aip']=='an'){
            if(!is_numeric($_POST['shed']) || !is_numeric($_POST['column']) || !is_numeric($_POST['flag']) || !is_numeric($_POST['state']) || !is_numeric($_POST['s_count']) || !is_numeric($_POST['age'])){
                $jarr=array('ret'=>array('ret_message'=>'shed column flag state s_count age is number','status_code'=>10000019));
                echo json_encode(array('UserInfo'=>$jarr));
                exit;
            }

            $postArr=array(
							'devid'=>intval($_POST['devid']),
							'shed'=>intval($_POST['shed']),
							'column'=>intval($_POST['column']),
							'flag'=>intval($_POST['flag']),
							'state'=>intval($_POST['state']),
							's_count'=>intval($_POST['s_count']),
							'rid'=>trim(htmlspecialchars($_POST['rid'])),
							'age'=>intval($_POST['age'])
            );
            //var_dump($postArr);
            if(!$have=M('device')->where(array('devid'=>intval($_POST['devid'])))->find() &&  $addSql=M('device')->add($postArr)){
                $jarr=array('ret'=>array('ret_message'=>'ok','status_code'=>10000000,'data'=>M('device')->where(array('id'=>$addSql))->find()));
                echo json_encode(array('UserInfo'=>$jarr));

            }else{
               $jarr=array('ret'=>array('ret_message'=>'error','status_code'=>10000001));
                echo json_encode(array('UserInfo'=>$jarr));

            } 
            
            exit;
        }

    	if($_POST && $_POST['devid']){
    		$postArr=array(
    		'devid'=>intval($_POST['devid']),
    		'shed'=>intval($_POST['shed']),
    		'column'=>intval($_POST['column']),
    		'flag'=>intval($_POST['flag']),
    		'state'=>intval($_POST['state']),
    		's_count'=>intval($_POST['s_count']),
    		'rid'=>trim(htmlspecialchars($_POST['rid'])),
    		'age'=>intval($_POST['age'])
    		);
    		//var_dump($postArr);
    		if($have=M('device')->where(array('devid'=>intval($_POST['devid'])))->find() ){
				//  echo "<script type='text/javascript'>alert('你的设备已注册');distory.back();</script>";

                  $this->assign('ret','10000001');
//				  $this->display();
//				  exit;
				  //U('index/index');
    		}
	    	if(!$have && $addSql=M('device')->add($postArr)){
	    		//echo "<script type='text/javascript'>alert('插入成功');distory.back();</script>";
	    		 $this->assign('ret','10000000');
//                 $this->display();
//                  exit;

	    	}else{
	    		//echo "<script type='text/javascript'>alert('插入失败');distory.back();</script>";
	    		$this->assign('ret','10000002');
//                $this->display();
//                 exit;
	    	}
    	}
    	
    	
       $this->display();
    }

   

    public function move(){
    	if($_POST['aip']=='ios' || $_POST['aip']=='an'){
    		if($_POST['devid'] && ($_POST['shed'] || $_POST['column'])){

    			if($_POST['devid'] && ($_POST['shed'] || $_POST['column'])){
	    			if($_POST['devid'] && !is_numeric($_POST['devid']) ){
		    			$jarr=array('ret'=>array('ret_message'=>'devid is number','status_code'=>10000019));
		                echo json_encode(array('UserInfo'=>$jarr));
		                 $this->display();
		                exit;

	    			}

	    			if(is_numeric($_POST['devid']) ){
	    				$devIs=M('device')->
		    			$jarr=array('ret'=>array('ret_message'=>'devid is number','status_code'=>10000019));
		                echo json_encode(array('UserInfo'=>$jarr));
		                exit;

	    			}

	    			if($_POST['shed'] && !is_numeric($_POST['shed']) ){
		    			$jarr=array('ret'=>array('ret_message'=>'shed is number','status_code'=>10000019));
		                echo json_encode(array('UserInfo'=>$jarr));
		                exit;

	    			}

	    			if($_POST['column'] && !is_numeric($_POST['column']) ){
		    			$jarr=array('ret'=>array('ret_message'=>'column is number','status_code'=>10000019));
		                echo json_encode(array('UserInfo'=>$jarr));
		                exit;

	    			}


	            }


    		$devInfo=M('device')->where(array('devid'=>intval($_POST['devid']),'flag'=>1))->order('id desc')->find();
    		$devInfoId=$devInfo['id'];
    		array_splice($devInfo,0,1);
    		$devInfo['flag']=1;//新记录flag置为1
    		$devNext=M('device')->add($devInfo);
    		//把原有的记录flag置为2
    		$devLast=M('device')->where(array('id'=>intval($devInfoId)))->save(array('flag'=>2));
            //修改又名移动
            if($_POST['shed']){
            	$saveData['shed']=$_POST['shed'];
            }
            if($_POST['column']){
            	$saveData['column']=$_POST['column'];
            }
            $saveNextDev=M('device')->where(array('id'=>intval($devNext)))->save($saveData);

    		$devNextInfo=M('device')->where(array('id'=>intval($devNext)))->find();

    		//var_dump($devInfo);
    		//var_dump($devNext);
	    		if($devNext && $devLast){
	                    $jarr=array('ret'=>array('ret_message'=>'ok','status_code'=>10000004,'data'=>$devNextInfo));
	                    echo json_encode(array('UserInfo'=>$jarr));


	            }else{
	                   $jarr=array('ret'=>array('ret_message'=>'error','status_code'=>10000005));
	                    echo json_encode(array('UserInfo'=>$jarr));

	            } 
    		exit;
    	    }
    	}


    	if($_POST){
    		if($_POST['devid'] && ($_POST['shed'] || $_POST['column'])){

    		$devInfo=M('device')->where(array('devid'=>intval($_POST['devid']),'flag'=>1))->order('id desc')->find();
    		$devInfoId=$devInfo['id'];
    		array_splice($devInfo,0,1);
    		$devInfo['flag']=1;//新记录flag置为1
    		$devNext=M('device')->add($devInfo);
    		//把原有的记录flag置为2
    		$devLast=M('device')->where(array('id'=>intval($devInfoId)))->save(array('flag'=>2));
            //修改又名移动
            if($_POST['shed']){
            	$saveData['shed']=$_POST['shed'];
            }
            if($_POST['column']){
            	$saveData['column']=$_POST['column'];
            }
            $saveNextDev=M('device')->where(array('id'=>intval($devNext)))->save($saveData);
    		$devNextInfo=M('device')->where(array('id'=>intval($devNext)))->find();


	    		if($devNext && $devLast){
	                //  echo "<script type='text/javascript'>alert('移动成功！');distory.back();</script>";
		    			  $this->assign('ret','10000004');
                          $this->display();
                          exit;

	            }else{
	                 // echo "<script type='text/javascript'>alert('错误！');distory.back();</script>";
	                   $this->assign('ret','10000005');
                       $this->display();
                       exit;
		    			 
	            } 

    	    }
    	}
    	$this->display();

    }

    public function saveInfo(){
    	if($_POST['aip']=='ios' || $_POST['aip']=='an'){
    		if($_POST['devid'] && ($_POST['state'] || $_POST['s_count'] || $_POST['rid'] || $_POST['age'])){


    			if($_POST['devid'] && ($_POST['state'] || $_POST['s_count'] || $_POST['age'])){
	    			if($_POST['devid'] && !is_numeric($_POST['devid']) ){

		    			$jarr=array('ret'=>array('ret_message'=>'devid is number','status_code'=>10000019));
		                echo json_encode(array('UserInfo'=>$jarr));
		                exit;

	    			}



	    			if($_POST['state'] && !is_numeric($_POST['state']) ){
		    			$jarr=array('ret'=>array('ret_message'=>'state is number','status_code'=>10000019));
		                echo json_encode(array('UserInfo'=>$jarr));
		                exit;

	    			}

	    			if($_POST['s_count'] && !is_numeric($_POST['s_count']) ){
		    			$jarr=array('ret'=>array('ret_message'=>'s_count is number','status_code'=>10000019));
		                echo json_encode(array('UserInfo'=>$jarr));
		                exit;

	    			}

	    			if($_POST['age'] && !is_numeric($_POST['age']) ){
		    			$jarr=array('ret'=>array('ret_message'=>'age is number','status_code'=>10000019));
		                echo json_encode(array('UserInfo'=>$jarr));
		                exit;

	    			}


	            }    



    			$devInfo=M('device')->where(array('devid'=>intval($_POST['devid']),'flag'=>1))->order('id desc')->find();
    			//var_dump($devInfo);
    			$postArr=array();
	    		if($_POST['devid']){
	    			$postArr['devid']=intval($_POST['devid']);

	    		}
	    		
		    	if($_POST['state']){
		    		$postArr['state']=intval($_POST['state']);	
	    		}

	    		if($_POST['s_count']){
		    		$postArr['s_count']=intval($_POST['s_count']);	
	    		}

	    		if($_POST['rid']){
		    		$postArr['rid']=
			    		intval($_POST['rid']);	
	    		}

	    		if($_POST['age']){
		    		$postArr['age']=intval($_POST['age']);	
	    		}
	    		if($devInfo=M('device')->where(array('devid'=>intval($_POST['devid']),'flag'=>1))->order('id desc')->find()){
		    		$devInfoId=$devInfo['id'];
		    		array_splice($devInfo,0,1);
		    		$devInfo['flag']=1;//新记录flag置为1
		    		$devNext=M('device')->add($devInfo);
	    		}else{
	    			$jarr=array('ret'=>array('ret_message'=>'devid is no','status_code'=>10000029));
                	echo json_encode(array('UserInfo'=>$jarr));
	    			exit;
	    		}
	    		

	    		$devNextSave=M('device')->where(array('id'=>intval($devNext)))->save($postArr);

		    	if($devNextSave){
		    		$devInfoNew=M('device')->where(array('id'=>$devNext))->find();

		    		$jarr=array('ret'=>array('ret_message'=>'ok','status_code'=>10000010,'data'=>$devInfoNew));
                	echo json_encode(array('UserInfo'=>$jarr));
		    	}else{
		    		$jarr=array('ret'=>array('ret_message'=>'error','status_code'=>10000011));
                    echo json_encode(array('UserInfo'=>$jarr));
		    	}
    			exit;
    		}
    		exit;
    	}




    	if($_POST){


    		if($_POST['devid'] && ($_POST['state'] || $_POST['s_count'] || $_POST['rid'] || $_POST['age'])){


    			if($_POST['devid'] && ($_POST['state'] || $_POST['s_count'] || $_POST['age'])){

	    			if($_POST['devid'] && !is_numeric($_POST['devid']) ){
		    			 //echo "<script type='text/javascript'>alert('devid is number');distory.back();</script>";
		    			 $this->assign('ret','11000001');
		    			 $this->display();
		    			 exit;


	    			}

	    			if($_POST['state'] && !is_numeric($_POST['state']) ){
		    			//echo "<script type='text/javascript'>alert('state is number');distory.back();</script>";
		    			 $this->assign('ret','11000002');
		    			 $this->display();
		    			 exit;

	    			}

	    			if($_POST['s_count'] && !is_numeric($_POST['s_count']) ){
		    			//echo "<script type='text/javascript'>alert('s_count is number');distory.back();</script>";
		    			 $this->assign('ret','11000003');
		    			 $this->display();
		    			 exit;
		   

	    			}

	    			if($_POST['age'] && !is_numeric($_POST['age']) ){
		    			//echo "<script type='text/javascript'>alert('age is number');distory.back();</script>";
                         $this->assign('ret','11000004');
		    			 $this->display();
		    			 exit;
		           

	    			}


	            }    



    			$devInfo=M('device')->where(array('devid'=>intval($_POST['devid']),'flag'=>1))->order('id desc')->find();
    			//var_dump($devInfo);
    			$postArr=array();
	    		if($_POST['devid']){
	    			$postArr['devid']=intval($_POST['devid']);

	    		}
	    		
		    	if($_POST['state']){
		    		$postArr['state']=intval($_POST['state']);	
	    		}

	    		if($_POST['s_count']){
		    		$postArr['s_count']=intval($_POST['s_count']);	
	    		}

	    		if($_POST['rid']){
		    		$postArr['rid']=
			    		intval($_POST['rid']);	
	    		}

	    		if($_POST['age']){
		    		$postArr['age']=intval($_POST['age']);	
	    		}
	    		//var_dump($postArr);

		    	$devInfo=M('device')->where(array('devid'=>intval($_POST['devid']),'flag'=>1))->order('id desc')->find();
	    		$devInfoId=$devInfo['id'];
	    		array_splice($devInfo,0,1);
	    		$devInfo['flag']=1;//新记录flag置为1
	    		$devNext=M('device')->add($devInfo);

	    		$devNextSave=M('device')->where(array('id'=>intval($devNext)))->save($postArr);

		    	if($devNextSave){
		    		$devInfoNew=M('device')->where(array('id'=>$devNext))->find();
                    $this->assign('ret','10000006');
		    		//echo "<script type='text/javascript'>alert('ok');distory.back();</script>";
		    			 $this->display();

		    			 exit;
		    	}else{
		    	    $this->assign('ret','10000007');
		    		//echo "<script type='text/javascript'>alert('error');distory.back();</script>";
		    			 $this->display();
		    			 exit;
		    	}
    			
    		}
    		 $this->assign('ret','10000007');
    	}

        $this->display();

    }



    public function select(){
    	if($_POST['aip']=='ios' || $_POST['aip']=='an'){
            if(is_numeric($_POST['devid']) || is_numeric($_POST['shed']) || is_numeric($_POST['column'])){

            }else{
            	$jarr=array('ret'=>array('ret_message'=>'shed column id is number','status_code'=>10000019));
                echo json_encode(array('UserInfo'=>$jarr));
                exit;
            }

        $postArr=array();//声明一个数组

				
	    	if($_POST['devid']){
	    		$postArr['devid']=intval($_POST['devid']);
	    	}
	    		
		    if($_POST['shed']){
		    	$postArr['shed']=intval($_POST['shed']);	
	    	}

	    	if($_POST['column']){
		    	$postArr['column']=intval($_POST['column']);	
	    	}

	    	if($selectSql=M('device')->where($postArr)->select()){
	    		$jarr=array('ret'=>array('ret_message'=>'ok','status_code'=>10000006,'data'=>$selectSql));
          echo json_encode(array('UserInfo'=>$jarr));
	    	}else{
	    		$jarr=array('ret'=>array('ret_message'=>'error','status_code'=>10000007));
          echo json_encode(array('UserInfo'=>$jarr));
	    	}
            exit;
        }

    	if($_POST){
    		$postArr=array();//声明一个数组

	    	if($_POST['devid']){
	    	 $devid = intval($_POST['devid']);
	    		$postArr['devid']=intval($_POST['devid']);
	    	}
	    		
		    if($_POST['shed']){
		         $shed = intval($_POST['shed']);
		    	$postArr['shed']=intval($_POST['shed']);	
	    	}

	    	if($_POST['column']){
	    	     $column = intval($_POST['column']);
		    	$postArr['column']=intval($_POST['column']);	
	    	}
	    	//var_dump($postArr);
	    //	$devSelect=M('device')->where(array('flag'=>1))->order('devid asc')->select();
	   // $selectSql=M('device')->where($postArr)->select()
	    	if($selectSql=M('device')->where(array('flag'=>1))->order('devid asc')->where($postArr)->select()){
	    		//dump($selectSql);
	    		$this->assign('selectSql',$selectSql);
	    	}else{
	    		//echo "<script type='text/javascript'>alert('查询的结果不存在');distory.back();</script>";
	    		$this->assign('ret',"20000001");
	    	}
	    	$this->assign('devid',$devid);
	    	$this->assign('shed',$shed);
	    	$this->assign('column',$column);
    	}    	
       $this->display();
    }
    public function bdselect(){
        $devSelect=M('bdevice')->where(array('state'=>1))->order('id asc')->select();
       // var_dump($devSelect);
        if($devSelect){
            $this->assign('devSelect',$devSelect);
        }else{
            $this->assign('ret',"20000003");
        }

        $this->display();
    }

    public function bdadd(){
        if($_POST && $_POST['id']){
            $uptime = preg_replace('# #', '', $_POST['uptime']);

            $postArr=array(
            'id'=>intval($_POST['id']),
            'shed'=>intval($_POST['shed']),
            'state'=>intval('1'),
            'uptime'=>$uptime,
        );
        //var_dump($postArr);
        if($have=M('bdevice')->where(array('id'=>intval($_POST['id'])))->find() ){
            //  echo "<script type='text/javascript'>alert('你的设备已注册');distory.back();</script>";

              $this->assign('ret','10000001');
        //				  $this->display();
        //				  exit;
              //U('index/index');
        }
        if(!$have && $addSql=M('bdevice')->add($postArr)){
            //echo "<script type='text/javascript'>alert('插入成功');distory.back();</script>";
             $this->assign('ret','10000000');
        //                 $this->display();
        //                  exit;

        }else{
            //echo "<script type='text/javascript'>alert('插入失败');distory.back();</script>";
            $this->assign('ret','10000002');
        //                $this->display();
        //                 exit;
        }
        }
            $this->display();
            exit;
    }
    public function revisetime(){
        if($_POST){
           $uptime = preg_replace('# #', '', $_POST['uptime']);
           $postArr=array(
               'uptime'=>$uptime,
           );

        $idSql=M('bdevice')->where(array('id'=>intval($_POST['id'])))->order('id asc')->find();
        $id=$idSql['autoid'];

        if($saveSql=M('bdevice')->where(array('autoid'=>$id))->save($postArr)){
           $this->assign('ret','10000006');
           $this->assign('uptime',$_POST['uptime']);
        }else{
           $this->assign('ret','10000007');
        }

        }
     $this->display();
    }
}