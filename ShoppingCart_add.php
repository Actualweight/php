<?
session_start();//开始使用该程序之前必须开启的SESSION函数。这在每次访问一个页面
if(!isset($_SESSION['user']))
{
    echo "<script>alert('请先登录');location='login.php'</script>";
}
require_once("conn.php");
if(isset($_GET['productid'])){
    $pid = $_GET['productid'];
    $user = $_SESSION['user'];
    
    $sql = "insert into cart (select '$user','$pid',Name,ListPrice,1 from product where ProductId = '$pid')";
    $result = $db->query($sql);
    if($db->affected_rows>0){
        echo "<script>alert('添加成功');history.back();</script>";
    }else{
        echo "<script>alert('添加失败！购物车中已经存在');history.back();</script>";
    }
}
?>