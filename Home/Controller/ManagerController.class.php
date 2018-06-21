<?php
namespace Home\Controller;
use Tools\HomeController; 
use Think\Controller;
class ManagerController extends HomeController {
		public function register(){
			if($_POST['name'] && $_POST['pwd'] && ($_POST['aip']=='ios' || $_POST['aip']=='an')){
				$pwd   =trim($_POST['pwd']);
				$name  =trim($_POST['name']);
				$name  =htmlspecialchars($name);
				$pwdlen=strlen($pwd);
				$userfind=M('user')->where(array(
					'name'=>$name,
					))->find();
				if($userfind){
					$jarr=array('ret'=>array('ret_message'=>'name is existed','status_code'=>10000109));
                    echo json_encode(array('UserInfo'=>$jarr));
                    exit;
				}
				if($pwdlen<6){
					//echo 'password not is less than six';
					$jarr=array('ret'=>array('ret_message'=>'password not is less than six','status_code'=>10000101));
                    echo json_encode(array('UserInfo'=>$jarr));
                    exit;
				}
				$nameArr=array(
					'name'=>$name,
					'pwd' =>md5($pwd),
					);
				$userAdd=M('user')->add($nameArr);

				if($userAdd){
					$jarr=array('ret'=>array('ret_message'=>'register ok','status_code'=>10000104,'data'=>M('user')->where(array('id'=>$userAdd))->find()));
                    echo json_encode(array('UserInfo'=>$jarr));
				}else{
					$jarr=array('ret'=>array('ret_message'=>'register error','status_code'=>10000105));
                    echo json_encode(array('UserInfo'=>$jarr));
				}

				exit;
			}

			if($_POST['name'] && $_POST['pwd'] && $_POST['aip']=='pc'){
				$pwd   =trim($_POST['pwd']);
				$name  =trim($_POST['name']);
				$name  =htmlspecialchars($name);
				$pwdlen=strlen($pwd);

				$userfind=M('user')->where(array(
					'name'=>$name,
					))->find();
				if($userfind){
				    $this->assign('name',$name);
					$this->assign('ret','10000109');
                    $this->display();
					exit;
				}
				if($pwdlen<6){
					//echo 'password not is less than six';
					$jarr=array('ret'=>array('ret_message'=>'password not is less than six','status_code'=>10000101));
                    echo json_encode(array('UserInfo'=>$jarr));
				}

				$nameArr=array(
					'name'=>$name,
					'pwd' =>md5($pwd),
					);
				$userAdd=M('user')->add($nameArr);

				if($userAdd){
				    $this->assign('ret','10000104');
				    $this->assign('name',$name);
					$this ->redirect('login',array('ret'=>'10000104','name'=>$name),0,'');

				}else{
					$this ->redirect('',array(),0,'');
				}

				exit;
			}
			$this->display();
		}

		public function login(){
			if($_POST['name'] && $_POST['pwd'] && ($_POST['aip']=='ios' || $_POST['aip']=='an')){
				$pwd   =trim($_POST['pwd']);
				$name  =trim($_POST['name']);
				$name  =htmlspecialchars($name);

				$nameArr=array(
					'name'=>$name,
					'pwd' =>md5($pwd)
					);
				$userFind=M('user')->where($nameArr)->find();
				if($userFind){
					$jarr=array('ret'=>array('ret_message'=>'login ok','status_code'=>10000106,'data'=>$userFind));
                    echo json_encode(array('UserInfo'=>$jarr));
				}else{
					$jarr=array('ret'=>array('ret_message'=>'register error','status_code'=>10000107));
                    echo json_encode(array('UserInfo'=>$jarr));
				}
				exit;
			}

			if($_POST['name'] && $_POST['pwd'] && $_POST['aip']=='pc'){
				$pwd   =trim($_POST['pwd']);
			    $name =trim($_POST['name']);
				$name  =htmlspecialchars($name);

				$nameArr=array(
					'name'=>$name,
					'pwd' =>md5($pwd)
					);
				$userFind=M('user')->where($nameArr)->find();
				if($userFind){
					session('name',$userFind['name']);
                	session('id',  $userFind['id']);
                   // echo $_SESSION['id'];
                	$this ->redirect('Devselect/select',array(),0,'');
				}else{
					$jarr=array('ret'=>array('ret_message'=>'register error','status_code'=>10000107));
					$this->assign('name',$name);
					$this->assign('ret','10000107');
					
                   // echo json_encode(array('UserInfo'=>$jarr));
				}

			}
			$ret = $_GET['ret'];
            $name = $_GET['name'];
			if($ret){
                $this->assign('ret','10000104');
                $this->assign('name',$name);
			}
			$this->display();


		}
}