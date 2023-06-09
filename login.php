<head>
<link rel="stylesheet" href="css/bootstrap.min.css" />
  <script src="js/jQuery3.4.1.js"></script>
  <script src="js/bootstrap.bundle.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<?
    // 判断是否提交了表单
    if(isset($_POST['submit'])){
        //链接数据库
        require("conn.php");
        //获取用户名和密码
        $user=mysqli_real_escape_string($db, $_POST['user']);
        $pwd=mysqli_real_escape_string($db, $_POST['password']);
        //创建结果集
        $sql="SELECT * FROM account where Username='$user' and Password='$pwd'";
        $result=$db->query($sql);
        if($result->num_rows>0){
            //登陆成功
            //创建会话变量
            session_start();
            $_SESSION['user']=$user;
            //如何在主页中检查用户会话变量
           
            echo "<script>alert('登陆成功');location='index.php'</script>";
        }else{
            echo "<script>alert('用户名或者密码错误')</script>";
        }
    }

?>

<?  require_once("HeaderNav.php"); ?>
<!-- <form action="" method="post">
    <p>用户名:<input type="text" name="user"></p>
    <p>密&nbsp;&nbsp;&nbsp;码:<input type="password" name="password"></p>
    <p><input type="submit" name="submit" value="登录"></p> 
    <button type="submit" class="btn btn-info" name="submit">登录</button>
</form> -->
<form method="post" >
<div class="mt-auto p-4 ">
    <div class="form-group row container">
      <label for="user" class="col-sm-2 col-form-label text-primary" >用户名:</label>
      <div class="col-sm-9">
      <input type="user" class="form-control" name="user" placeholder="user">
      </div>
    </div>
    <div class="form-group row container">
      <label for="password" class="col-sm-2 col-form-label text-primary">密码:</label>
      <div class="col-sm-9 ">
        <input type="password" class="form-control"  name="password" placeholder="Password">
      </div>
    </div>
<div>
    <button type="submit" class="btn btn-info" name="submit">登录</button>
  </form>
<? require_once("Footer.html"); ?>
