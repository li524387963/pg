<?php
namespace Home\Controller;
use Think\Controller;
class MineController extends Controller {
	public function mineTab(){
	if($_POST){
       session_start();

       $_SESSION = array(); //清除SESSION值.

        if(isset($_COOKIE[session_name()])){  //判断客户端的cookie文件是否存在,存在的话将其设置为过期.
                setcookie(session_name(),'',time()-1,'/');
         }
         session_destroy();  //清除服务器的sesion文件

         $this->assign('ret','10000108');
         $this->display();

       }
     $this->display();
    }
    public function resetpwd(){
      if($_POST){
            $name = $_SESSION['name'];
            $oldpwd = $_POST['oldpwd'];
            $newpwd = $_POST['newpwd'];
            $newpwd1 = $_POST['newpwd1'];
           // var_dump($newpwd,$newpwd1);
            $nameArr=array(
                    'name'=>$name,
                'pwd' =>md5($oldpwd)
            );
            $userFind=M('user')->where($nameArr)->find();
            if($userFind){
               if($newpwd!=$newpwd1){
//                    var_dump('两次密码不一致');
                    $this->assign('ret','10000111');
               }else{
                    $pwdlen=strlen($newpwd);
                    if($pwdlen<6){
                       // var_dump('密码少于6位');
                        $this->assign('ret','10000101');
                    }else{
                       // var_dump($userFind);
                        $saveData['pwd'] = md5($newpwd);
                       // var_dump($userFind);
                        //$userNext=M('user')->add($userFind);
                        $userNext=M('user')->where(array('id'=>intval($userFind['id'])))->save($saveData);
                       // var_dump($userNext);
                        $this->assign('ret','10000113');
                    }
               }
            }else{
               $this->assign('ret','10000110');


               // echo json_encode(array('UserInfo'=>$jarr));
            }

       }
      $this->display();
    }

}