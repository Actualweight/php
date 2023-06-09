<?
session_start();//开始使用该程序之前必须开启的SESSION函数。这在每次访问一个页面
require_once("conn.php");
if(isset($_GET['del'])){
    $productid = $_GET['productid'];
    $sql = "delete from cart where Username = '". $_SESSION['user']."'and productid ='". $productid."'";
    $result = $db->query($sql);
    
        echo "<script>alert('删除成功');location='ShoppingCart.php'</script>";
  
}
?>