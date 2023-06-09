<?
    //如果未接受到数据，退出
    if(empty($_POST['user']) || empty($_POST['password'])){
        exit("用户名密码为空，请重新输入");
    }
    //链接数据库
    require("conn.php");
    $user = checkInput($_POST['user']);
    $pwd = checkInput($_POST['password']);
    $cname = checkInput($_POST['cname']);
    $country = checkInput($_POST['country']);
    //定义校验函数
    function checkInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //书写sql语句
    $sql = "insert into account(Username,Password,Cname,Country) values('$user','$pwd','$cname','$country')";
    var_dump($sql);
    $result = $db->query($sql);
    if($db->affected_rows >=1) {
        //注册成功
        echo "<script>alert('注册成功');location='Index.php'</script>";
    }else{
        echo "<script>alert('注册失败');</script>";
    }

    
?>