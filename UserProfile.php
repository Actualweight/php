<?
    //判断用户是否已登录
    session_start();
    if(!isset($_SESSION['user'])){
        echo "<script>alert('请先登录');location='login.php'</script>";
    }
    require_once("HeaderNav.php");
    //显示用户个人信息
    require("conn.php");
    $user = $_SESSION['user']; //获取用户名称
    $sql = "SELECT * FROM account WHERE Username='$user'"; //根据用户名查询用户数据库中的用
    $result = $db->query($sql); //执行查询操作。将结果集返回给前端。记得使用sql_query函数。
    if($result->num_rows<1)
    exit('未找到用户信息');
    //读取信息
    $row = $result->fetch_assoc();
?>
<!-- <form action="UserProfile_ok.php" method="post">
    <p>账号:<input type="text" name="user" value="//" readonly></p>
    <p>姓名:<input type="text" name="cname" value="//" ></p>
    <p>国家:<input type="text" name="country" value="" ></p>
    <p><input type="submit" name="submit" value="保存"></p>
</form> -->
<form action="UserProfile_ok.php" method="post">
<div class="mt-auto p-4 ">
    <div class="form-group row container">
      <label for="user" class="col-sm-2 col-form-label text-primary" >账号:</label>
      <div class="col-sm-9">
      <input type="text" class="form-control" name="user" placeholder="user" value="<?=$row['Username']?>" readonly>
      </div>
    </div>

    <div class="form-group row container">
      <label for="cname" class="col-sm-2 col-form-label text-primary">姓名:</label>
      <div class="col-sm-9 ">
      <input type="text" class="form-control" name="cname" placeholder="cname" value="<?=$row['Cname']?>" >
      </div>
    </div>

    <div class="form-group row container">
      <label for="Country" class="col-sm-2 col-form-label text-primary">国家:</label>
      <div class="col-sm-9 ">
      <input type="text" class="form-control" name="country" placeholder="country" value="<?=$row['Country']?>" >
      </div>
    </div>
<div>
<button type="submit" class="btn btn-info" name="submit">保存</button>
</form>
<?
    require_once("Footer.html");
?>