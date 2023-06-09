<?
session_start();//开始使用该程序之前必须开启的SESSION函数。这在每次访问一个页面
require_once("conn.php");
if(isset($_GET['count']) && isset($_GET['productid'])){
    $count = $_GET['count'];
    $productid = $_GET['productid'];
    $user = $_SESSION['user'];
    $sql = "update cart set Quantity = '$count' where Username = '$user' and ProductId = '$productid'";
    // var_dump($sql);
    $result = $db->query($sql);
    if($db->affected_rows>=1){
        echo 1;
    }else{
        echo 0;
    }
}
?>