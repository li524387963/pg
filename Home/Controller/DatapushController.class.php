<?php
namespace Home\Controller;
use Think\Controller;
class DatapushController extends Controller {
	public function push(){
		// $checksum=crc32("Thequickbrownfoxjumpedoverthelazydog.");
		// printf("%u\n",$checksum);

		$TIME_LEN = 14;//时间字符长度
		$BSN_LEN  = 2;//BS字符长度
		$COUNT_LEN =2; //data的条数
		$DATA_LEN = 7; //一条data长度
		$CSN_LEN  =2;//设备字符长度
		$VALUE_LEN = 2;//data三个中每个长度
		$STATE_LEN  =1;//设备字符长度
		$CRC_LEN  = 4;//校验码
		$post      =file_get_contents('php://input');//抓取内容
    $strarr    =unpack("H*", $post);//unpack() 函数从二进制字符串对数据进行解包。
    $str       =implode("", $strarr);
    {
          $imgDir = "lora_backup/";
          if(!file_exists("lora_backup")){
                 mkdir("lora_backup");
          }
          if(!file_exists($imgDir)){
             mkdir($imgDir);
          }
          //要生成的图片名字
          $ctime = date("Ymd_His_").mt_rand(10, 99);
          $lnewFilePath = $imgDir.$ctime."/";//图片存入路径
          if(!file_exists($lnewFilePath)){
          	mkdir($lnewFilePath);
          }
          			
          $filename = date("Ymd_His_").mt_rand(10, 99).".bmp"; //新图片名称
          $newFilePath = $lnewFilePath.$filename;//图片存入路径
          $newFile = fopen($newFilePath,"w"); //打开文件准备写入
          fwrite($newFile,$str);
          fclose($newFile); //关闭文件
    }
    //$str= "2032323630373131313731313033eaf40006000240635d1856000340647c1856000440c444c444000540c33cc33c000640ad0bad0b000740c10dc10d00000fc5";
    //print_r($str);
    //var_dump($str);
    $bsnstr   =substr($str, $TIME_LEN*2,$BSN_LEN*2);
    $bsnint = hexdec($bsnstr);
    if($bsnint>100){
    	$bsnint=1;
    }
    $bdevinfo    =D('bdevice')->where(array('id'=>$bsnint))->find();
    
    if($bdevinfo){
    	$uptime=$bdevinfo['uptime'];
    	$delay  = str_pad($uptime,4,'0',STR_PAD_LEFT);
    }
    //var_dump($delay);
    $count     =substr($str,($TIME_LEN+$BSN_LEN)*2,$COUNT_LEN*2);//2为解包后的倍数
    //var_dump($count);
    $count	   =hexdec($count);//从十六进制转十进制
    $data      =substr($str,($TIME_LEN+$BSN_LEN+$COUNT_LEN)*2,$count*$DATA_LEN*2);//取出data
    //var_dump($count);
    //var_dump($data);
    $env_temp = 0;
    $snint = 0;
    $battery = 0;
    for($i=0 ; $i < $count ; $i++){
    	$snstr   =substr($data, $i*$DATA_LEN*2,$CSN_LEN*2);
    	//var_dump($snstr);
    	$snint = hexdec($snstr);	//从十六进制转十进制
    	$stastr = substr($data, $i*$DATA_LEN*2+$CSN_LEN*2,$STATE_LEN*2);
    	$state =  hexdec($stastr);
    	//var_dump($state);
    	$stmp = 0x7f;
    	$stmp2 = 0x80;
    	if(($state & $stmp2) == $stmp2){
    		$battery=1;
    	}
    	else{
    		$battery=0;
    	}
    	$state=$state & $stmp;
    	//var_dump($state);
    	
    	$info    =D('device')->where(array('devid'=>$snint))->find();//查询devce是否存在
    	//var_dump($info);
    	if(!$info){
    		continue;
    	}
    	
    	$temp1str=substr($data, $i*$DATA_LEN*2+$CSN_LEN*2+$STATE_LEN*2,$VALUE_LEN*2);//temp1十六进制字符
    	$temp1int=hexdec($temp1str);								//temp1转成十进制
    	$temp2str=substr($data, $i*$DATA_LEN*2+$CSN_LEN*2+$VALUE_LEN*2+$STATE_LEN*2,$VALUE_LEN*2);
    	$temp2int=hexdec($temp2str);
    	
    	if($snint>3){
	    	$temp1 = gettemp3($temp1int);
	    	$temp2 = gettemp3($temp2int);
    	}else{
    		$temp1 = gettemp($temp1int);
	    	$temp2 = gettemp($temp2int);
    	}
    	
    	if($snint==1){
    		$env_temp = 0;
    		//$env_temp = $temp1;
    		//echo "env_temp:";
	    	//var_dump($env_temp);
    	}
  		$buf_sn[]=$snint;
  		$buf_temp1[]=$temp1;
  		$buf_temp2[]=$temp2;
  		$buf_bat[]=$battery;
  		$buf_state[]=$state;
  		//echo "normal_temp:";
    	//var_dump($temp1);
    	//var_dump($temp2);
    	
    }
    
    for($i=0;$i<count($buf_temp1);$i++){
    	 //var_dump($buf_sn[$i]);
    	 //var_dump($buf_temp1[$i]);
    	 //var_dump($buf_temp2[$i]);
    	 //if($buf_sn[$i]!=1){
	    	 $access=D('access')->add(array(
		  		'devid'=>$buf_sn[$i],
		  		'temp1'=>$buf_temp1[$i],
		  		'temp2'=>$buf_temp2[$i],
		  		'env_temp'=>$env_temp,
		  		'time' =>time(),
		  	));
	 		 //}
	 		 //if($buf_bat[$i]==1)
	 		 {
	  	 	$saveSql=M('device')->where(array('devid'=>$buf_sn[$i]))->save(array('battery'=>$buf_bat[$i],'dev_state'=>$buf_state[$i]));
	  	 }
    }
    //未解包比对
    
    $len=strlen($str);
    $crc=substr($str,$len-$CRC_LEN*2);//收到发来的crc
    //var_dump($crc);
    $crc=hexdec($crc);
    //var_dump($crc);

    $sum=0;
    $len = strlen($str);
		for($i=0 ; $i < $len/2-$CRC_LEN;$i++)
		{
			$value = hexdec(substr($str, $i*2,2));
			//var_dump($value);
			$sum+=$value;
		}
		//var_dump($sum);
		if($crc==$sum){
			echo "OK1".date('YmdHis').$delay;
		}else{
			echo "OK2".date('YmdHis').$delay;
		}
		exit;
	}
	
	public function test(){
		$temp = $_GET['temp'];
		var_dump($temp);
		$value = gettemp3($temp);
		var_dump($value);					
		exit;
	}
	
	public function pushnew2(){
		// $checksum=crc32("Thequickbrownfoxjumpedoverthelazydog.");
		// printf("%u\n",$checksum);

		$TIME_LEN = 14;//时间字符长度
		$BSN_LEN  = 4;//BS字符长度
		$COUNT_LEN =2; //data的条数
		$DATA_LEN = 11; //一条data长度
		$CSN_LEN  =2;//设备字符长度
		$VALUE_LEN = 4;//data三个中每个长度
		$STATE_LEN  =1;//设备字符长度
		$CRC_LEN  = 4;//校验码
		$post      =file_get_contents('php://input');//抓取内容
    $strarr    =unpack("H*", $post);//unpack() 函数从二进制字符串对数据进行解包。
    $str       =implode("", $strarr);
    {
          $imgDir = "lora_backup/";
          if(!file_exists("lora_backup")){
                 mkdir("lora_backup");
          }
          if(!file_exists($imgDir)){
             mkdir($imgDir);
          }
          //要生成的图片名字
          $ctime = date("Ymd_His_").mt_rand(10, 99);
          $lnewFilePath = $imgDir.$ctime."/";//图片存入路径
          if(!file_exists($lnewFilePath)){
          	mkdir($lnewFilePath);
          }
          			
          $filename = date("Ymd_His_").mt_rand(10, 99).".bmp"; //新图片名称
          $newFilePath = $lnewFilePath.$filename;//图片存入路径
          $newFile = fopen($newFilePath,"w"); //打开文件准备写入
          fwrite($newFile,$str);
          fclose($newFile); //关闭文件
    }
    //$str ="3230313630343038303932323535000000020000000002ce";
    //$str= "203232363037313131373131303318701a810006000240635d1856000340647c1856000440c444c444000540c33cc33c000640ad0bad0b000740c10dc10d00000fc5";
    //print_r($str);
    //var_dump($str);
    $sid =  (int)$_GET['sid'];
    //var_dump($sid);
    $bsnstr   =substr($str, $TIME_LEN*2,$BSN_LEN*2);
    //var_dump($bsnstr);
    $bsnint = hexdec($bsnstr);
    //var_dump($bsnint);
    if($bsnint!=$sid){
    	echo "OKE".date('YmdHis')."0010";
    	exit;
    }

    $bdevinfo    =D('bdevice')->where(array('id'=>$bsnint))->find();

    if($bdevinfo){
    	$uptime=$bdevinfo['uptime'];
    	//var_dump($uptime);
    	$delay  = str_pad($uptime,4,'0',STR_PAD_LEFT);
    }else{
    	$delay = "0010";
    }

    $count     =substr($str,($TIME_LEN+$BSN_LEN)*2,$COUNT_LEN*2);//2为解包后的倍数
    $count	   =hexdec($count);//从十六进制转十进制
    $data      =substr($str,($TIME_LEN+$BSN_LEN+$COUNT_LEN)*2,$count*$DATA_LEN*2);//取出data
    $env_temp = 0;
    $snint = 0;
    $battery = 0;
    
    for($i=0 ; $i < $count ; $i++){
    	$snstr   =substr($data, $i*$DATA_LEN*2,$CSN_LEN*2);
    	//var_dump($snstr);
    	$snint = hexdec($snstr);	//从十六进制转十进制
    	$stastr = substr($data, $i*$DATA_LEN*2+$CSN_LEN*2,$STATE_LEN*2);
    	$state =  hexdec($stastr);
    	//var_dump($state);
    	$stmp = 0x7f;
    	$stmp2 = 0x80;
    	if(($state & $stmp2) == $stmp2){
    		$battery=1;
    	}
    	else{
    		$battery=0;
    	}
    	$state=$state & $stmp;
    	//var_dump($state);
    	$snint=$snint+100;
    	$info    =D('device')->where(array('devid'=>$snint))->find();//查询devce是否存在
    	//var_dump($info);
    	if(!$info){
    		continue;
    	}
    	
    	$temp1str=substr($data, $i*$DATA_LEN*2+$CSN_LEN*2+$STATE_LEN*2,$VALUE_LEN*2);//temp1十六进制字符
    	$temp1int=hexdec($temp1str);								//temp1转成十进制
    	$temp2str=substr($data, $i*$DATA_LEN*2+$CSN_LEN*2+$VALUE_LEN*2+$STATE_LEN*2,$VALUE_LEN*2);
    	$temp2int=hexdec($temp2str);
    	
    	if($snint>3){
	    	$temp1 = gettemp3($temp1int);
	    	$temp2 = gettemp3($temp2int);
    	}else{
    		$temp1 = gettemp($temp1int);
	    	$temp2 = gettemp($temp2int);
    	}
    	
    	if($snint==1){
    		$env_temp = 0;
    		//$env_temp = $temp1;
    		//echo "env_temp:";
	    	//var_dump($env_temp);
    	}
  		$buf_sn[]=$snint;
  		$buf_temp1[]=$temp1;
  		$buf_temp2[]=$temp2;
  		$buf_bat[]=$battery;
  		$buf_state[]=$state;
  		//echo "normal_temp:";
    	//var_dump($temp1);
    	//var_dump($temp2);
    	
    }
    
    for($i=0;$i<count($buf_temp1);$i++){
    	 //var_dump($buf_sn[$i]);
    	 //var_dump($buf_temp1[$i]);
    	 //var_dump($buf_temp2[$i]);
    	 //if($buf_sn[$i]!=1){
	    	 $access=D('access')->add(array(
		  		'devid'=>$buf_sn[$i],
		  		'temp1'=>$buf_temp1[$i],
		  		'temp2'=>$buf_temp2[$i],
		  		'env_temp'=>$env_temp,
		  		'time' =>time(),
		  	));
	 		 //}
	 		 //if($buf_bat[$i]==1)
	 		 {
	  	 	$saveSql=M('device')->where(array('devid'=>$buf_sn[$i]))->save(array('battery'=>$buf_bat[$i],'dev_state'=>$buf_state[$i]));
	  	 }
    }
    //未解包比对
    
    $len=strlen($str);
    $crc=substr($str,$len-$CRC_LEN*2);//收到发来的crc
    //var_dump($crc);
    $crc=hexdec($crc);
    //var_dump($crc);

    $sum=0;
    $len = strlen($str);
		for($i=0 ; $i < $len/2-$CRC_LEN;$i++)
		{
			$value = hexdec(substr($str, $i*2,2));
			//var_dump($value);
			$sum+=$value;
		}
		//var_dump($sum);
		if($crc==$sum){
			echo "OK1".date('YmdHis').$delay;
		}else{
			echo "OK2".date('YmdHis').$delay;
		}
		exit;
	}
	
	public function pushtest(){
	// $checksum=crc32("Thequickbrownfoxjumpedoverthelazydog.");
	// printf("%u\n",$checksum);

	$TIME_LEN = 14;//时间字符长度
	$BSN_LEN  = 2;//BS字符长度
	$COUNT_LEN =2; //data的条数
	$DATA_LEN = 7; //一条data长度
	$CSN_LEN  =2;//设备字符长度
	$VALUE_LEN = 4;//data三个中每个长度
	$STATE_LEN  =1;//设备字符长度
	$CRC_LEN  = 4;//校验码
	$post      =file_get_contents('php://input');//抓取内容
    $strarr    =unpack("H*", $post);//unpack() 函数从二进制字符串对数据进行解包。
    $str       =implode("", $strarr);

    $str= "2032323630373131313731313033eaf40006000240635d1856000340647c1856000440c444c444000540c33cc33c000640ad0bad0b000740c10dc10d00000fc5";
    //print_r($str);
    //var_dump($str);
    $bsnstr   =substr($str, $TIME_LEN*2,$BSN_LEN*2);
    $bsnint = hexdec($bsnstr);
    if($bsnint>100){
    	$bsnint=1;
    }
    var_dump($bsnint);
    $bdevinfo    =D('bdevice')->where(array('id'=>$bsnint))->find();
    
    if($bdevinfo){
    	$uptime=$bdevinfo['uptime'];
    	$delay  = str_pad($uptime,4,'0',STR_PAD_LEFT);
    }
    var_dump($delay);
    $count     =substr($str,($TIME_LEN+$BSN_LEN)*2,$COUNT_LEN*2);//2为解包后的倍数
    //var_dump($count);
    $count	   =hexdec($count);//从十六进制转十进制
    $data      =substr($str,($TIME_LEN+$BSN_LEN+$COUNT_LEN)*2,$count*$DATA_LEN*2);//取出data
    //var_dump($count);
    //var_dump($data);
    $env_temp = 0;
    $snint = 0;
    $battery = 0;
    for($i=0 ; $i < $count ; $i++){
    	$snstr   =substr($data, $i*$DATA_LEN*2,$CSN_LEN*2);
    	//var_dump($snstr);
    	$snint = hexdec($snstr);	//从十六进制转十进制
    	$stastr = substr($data, $i*$DATA_LEN*2+$CSN_LEN*2,$STATE_LEN*2);
    	$state =  hexdec($stastr);
    	//var_dump($state);
    	$stmp = 0x7f;
    	$stmp2 = 0x80;
    	if(($state & $stmp2) == $stmp2){
    		$battery=1;
    	}
    	else{
    		$battery=0;
    	}
    	$state=$state & $stmp;
    	//var_dump($state);
    	
    	$info    =D('device')->where(array('devid'=>$snint))->find();//查询devce是否存在
    	//var_dump($info);
    	if(!$info){
    		continue;
    	}
    	
    	$temp1str=substr($data, $i*$DATA_LEN*2+$CSN_LEN*2+$STATE_LEN*2,$VALUE_LEN*2);//temp1十六进制字符
    	$temp1int=hexdec($temp1str);								//temp1转成十进制
    	$temp2str=substr($data, $i*$DATA_LEN*2+$CSN_LEN*2+$VALUE_LEN*2+$STATE_LEN*2,$VALUE_LEN*2);
    	$temp2int=hexdec($temp2str);
    	
    	if($snint>3){
	    	$temp1 = gettemp3($temp1int);
	    	$temp2 = gettemp3($temp2int);
    	}else{
    		$temp1 = gettemp($temp1int);
	    	$temp2 = gettemp($temp2int);
    	}
    	
    	if($snint==1){
    		$env_temp = 0;
    		//$env_temp = $temp1;
    		//echo "env_temp:";
	    	//var_dump($env_temp);
    	}
  		$buf_sn[]=$snint;
  		$buf_temp1[]=$temp1;
  		$buf_temp2[]=$temp2;
  		$buf_bat[]=$battery;
  		$buf_state[]=$state;
  		//echo "normal_temp:";
    	//var_dump($temp1);
    	//var_dump($temp2);
    	
    }
    
    //未解包比对
    
    $len=strlen($str);
    $crc=substr($str,$len-$CRC_LEN*2);//收到发来的crc
    //var_dump($crc);
    $crc=hexdec($crc);
    //var_dump($crc);

    $sum=0;
    $len = strlen($str);
		for($i=0 ; $i < $len/2-$CRC_LEN;$i++)
		{
			$value = hexdec(substr($str, $i*2,2));
			//var_dump($value);
			$sum+=$value;
		}
		//var_dump($sum);
		if($crc==$sum){
			echo "OK1".date('YmdHis').$delay;
		}else{
			echo "OK2".date('YmdHis').$delay;
		}
		exit;
	}
	
	public function pushnew(){
		// $checksum=crc32("Thequickbrownfoxjumpedoverthelazydog.");
		// printf("%u\n",$checksum);

		$TIME_LEN = 14;//时间字符长度
		$BSN_LEN  = 4;//BS字符长度
		$COUNT_LEN =2; //data的条数
		$DATA_LEN = 12; //一条data长度
		$CSN_LEN  =2;//设备字符长度
		$VALUE_LEN = 4;//data三个中每个长度
		$STATE_LEN  =1;//设备字符长度
		$DELAY_LEN  =1;//设备字符长度
		$CRC_LEN  = 4;//校验码
		$post      =file_get_contents('php://input');//抓取内容
    $strarr    =unpack("H*", $post);//unpack() 函数从二进制字符串对数据进行解包。
    $str       =implode("", $strarr);
    {
          $imgDir = "lora_backup/";
          if(!file_exists("lora_backup")){
                 mkdir("lora_backup");
          }
          if(!file_exists($imgDir)){
             mkdir($imgDir);
          }
          //要生成的图片名字
          $ctime = date("Ymd_His_").mt_rand(10, 99);
          $lnewFilePath = $imgDir.$ctime."/";//图片存入路径
          if(!file_exists($lnewFilePath)){
          	mkdir($lnewFilePath);
          }
          			
          $filename = date("Ymd_His_").mt_rand(10, 99).".bmp"; //新图片名称
          $newFilePath = $lnewFilePath.$filename;//图片存入路径
          $newFile = fopen($newFilePath,"w"); //打开文件准备写入
          fwrite($newFile,$str);
          fclose($newFile); //关闭文件
    }
    //$str ="3230313630343038303932323535000000020000000002ce";
    //$str= "323031383033323630383537313100000002000400020400000105e20001040400040401000110c7000110ba00050400000111ab00011440000104b10000fd7f0000fcf800000ab6";
    //print_r($str);
    //var_dump($str);
    $sid =  (int)$_GET['sid'];
    //var_dump($sid);
    $bsnstr   =substr($str, $TIME_LEN*2,$BSN_LEN*2);
    //var_dump($bsnstr);
    $bsnint = hexdec($bsnstr);
    //var_dump($bsnint);
    if($bsnint!=$sid){
    	echo "OKE".date('YmdHis')."0010";
    	exit;
    }

    $bdevinfo    =D('bdevice')->where(array('id'=>$bsnint))->find();

    if($bdevinfo){
    	$uptime=$bdevinfo['uptime'];
    	//var_dump($uptime);
    	$delay  = str_pad($uptime,4,'0',STR_PAD_LEFT);
    }else{
    	$delay = "0010";
    }

    $count     =substr($str,($TIME_LEN+$BSN_LEN)*2,$COUNT_LEN*2);//2为解包后的倍数
    $count	   =hexdec($count);//从十六进制转十进制
    $data      =substr($str,($TIME_LEN+$BSN_LEN+$COUNT_LEN)*2,$count*$DATA_LEN*2);//取出data
    $env_temp = 0;
    $snint = 0;
    $battery = 0;
    var_dump($count);
    for($i=0 ; $i < $count ; $i++){
    	$snstr   =substr($data, $i*$DATA_LEN*2,$CSN_LEN*2);
    	var_dump($snstr);
    	$snint = hexdec($snstr);	//从十六进制转十进制
    	$stastr = substr($data, $i*$DATA_LEN*2+$CSN_LEN*2,$STATE_LEN*2);
    	$destr = substr($data, $i*$DATA_LEN*2+$CSN_LEN*2+$STATE_LEN*2,$DELAY_LEN*2);
    	$state =  hexdec($stastr);
    	$delay =  hexdec($destr);
    	var_dump($state);
    	var_dump($delay);
    	$stmp = 0x7f;
    	$stmp2 = 0x80;
    	if(($state & $stmp2) == $stmp2){
    		$battery=1;
    	}
    	else{
    		$battery=0;
    	}
    	$state=$state & $stmp;
    	//var_dump($state);
    	$snint=$snint+100;
    	$info    =D('device')->where(array('devid'=>$snint))->find();//查询devce是否存在
    	//var_dump($info);
    	if(!$info){
    		continue;
    	}
    	
    	$temp1str=substr($data, $i*$DATA_LEN*2+$CSN_LEN*2+$STATE_LEN*2+$DELAY_LEN*2,$VALUE_LEN*2);//temp1十六进制字符
    	$temp1int=hexdec($temp1str);								//temp1转成十进制
    	$temp2str=substr($data, $i*$DATA_LEN*2+$CSN_LEN*2+$VALUE_LEN*2+$STATE_LEN*2+$DELAY_LEN*2,$VALUE_LEN*2);
    	$temp2int=hexdec($temp2str);
    	
    	if($snint>3){
	    	$temp1 = gettemp3($temp1int);
	    	$temp2 = gettemp3($temp2int);
    	}else{
    		$temp1 = gettemp($temp1int);
	    	$temp2 = gettemp($temp2int);
    	}
    	
    	if($snint==1){
    		$env_temp = 0;
    		//$env_temp = $temp1;
    		//echo "env_temp:";
	    	//var_dump($env_temp);
    	}
  		$buf_sn[]=$snint;
  		$buf_temp1[]=$temp1;
  		$buf_temp2[]=$temp2;
  		$buf_bat[]=$battery;
  		$buf_state[]=$state;
  		$buf_delay[]=$delay;
  		//echo "normal_temp:";
    	//var_dump($snint);
    	//var_dump($delay);
    	
    }
    
    for($i=0;$i<count($buf_temp1);$i++){
    	 //var_dump($buf_sn[$i]);
    	 //var_dump($buf_temp1[$i]);
    	 //var_dump($buf_temp2[$i]);
    	 //if($buf_sn[$i]!=1){
	    	 $access=D('access')->add(array(
		  		'devid'=>$buf_sn[$i],
		  		'temp1'=>$buf_temp1[$i],
		  		'temp2'=>$buf_temp2[$i],
		  		'delay'=>$buf_delay[$i],
		  		'env_temp'=>$env_temp,
		  		'time' =>time(),
		  	));
	 		 //}
	 		 //if($buf_bat[$i]==1)
	 		 {
	  	 	$saveSql=M('device')->where(array('devid'=>$buf_sn[$i]))->save(array('battery'=>$buf_bat[$i],'dev_state'=>$buf_state[$i]));
	  	 }
    }
    //未解包比对
    
    $len=strlen($str);
    $crc=substr($str,$len-$CRC_LEN*2);//收到发来的crc
    //var_dump($crc);
    $crc=hexdec($crc);
    //var_dump($crc);

    $sum=0;
    $len = strlen($str);
		for($i=0 ; $i < $len/2-$CRC_LEN;$i++)
		{
			$value = hexdec(substr($str, $i*2,2));
			//var_dump($value);
			$sum+=$value;
		}
		//var_dump($sum);
		if($crc==$sum){
			echo "OK1".date('YmdHis').$delay;
		}else{
			echo "OK2".date('YmdHis').$delay;
		}
		exit;
	}
	
}