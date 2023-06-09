<?
	$db = new MYSQLi("localhost","root","root","bookshop");
		if($db->connect_error){
			echo "链接失败:".$db->connect_error;
		}
		$db->query("set names utf8");
	//链接第二个数据库
	// $db2 = new MYSQLi("localhost","root","root","bookshop");
	// 	if($db2->connect_error){
	// 		echo "链接失败:".$db2->connect_error;
	// 	}
	
	//$db2->query("set names 'utf8'");//设置字符集编码格式。也可以在数据库配
?>