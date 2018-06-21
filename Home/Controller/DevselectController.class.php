<?php
namespace Home\Controller;
use Tools\HomeController; 
use Think\Controller;
class DevselectController extends HomeController {
	public function select(){
		if($_POST['aip']=='ios' || $_POST['aip']=='an'){
			$devSelect=M('device')->select();
			$jarr=array('ret'=>array('ret_message'=>'select ok','status_code'=>10000108,'data'=>$devSelect));
            echo json_encode(array('UserInfo'=>$jarr));
            exit;
		}

        $devid = $_POST['devid'];
//         $id = 0;
//        if(is_null($id)){
//            var_dump("test");
//        }

        if(empty($devid)){
          //  var_dump($devid);
            $devSelect=M('device')->where(array('flag'=>1))->order('devid asc')->select();
            if($devSelect){
            $this->assign('devSelect',$devSelect);
            }else{
            $this->assign('ret',"20000004");
            }

        }else{
            $postArr=array();
            $postArr['devid']=$devid;
            $postArr['flag']=1;
            $devSelect=M('device')->where($postArr)->order('devid asc')->select();
            if($devSelect){
                $this->assign('devSelect',$devSelect);
            }else{
                $devSelect=M('device')->where(array('flag'=>1))->order('devid asc')->select();
                $this->assign('devSelect',$devSelect);
                $this->assign('ret',"20000001");
            }
        }

//
//		}
		$this->display();
	}
}