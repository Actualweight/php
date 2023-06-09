<?
//修改用户信息
require("conn.php");
if (isset($_POST['submit'])){
    $user = trim($_POST['user']);
    $cname = trim($_POST['cname']);
    $country = trim($_POST['country']);
    //书写sql更新语句
    $sql = "update account set Cname='$cname',Country='$country' where Username='$user'";
    $result = $db->query($sql);
    if($db->affected_rows>=1){
        echo "<script>alert('更新成功');location='UserProfile.php'</script>";
    }else {
        echo "<script>alert('更新失败')</script>";
    }
}


?>