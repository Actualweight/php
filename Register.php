<?
    //添加页头
    require_once("HeaderNav.php");
?>
<!-- <form  method="post">
    <p>账号:<input type="text" name="user"></p>
    <p>密码:<input type="password" name="password"></p>
    <p>姓名:<input type="text" name="cname"></p>
    <p>国家:<input type="text" name="country"></p>
    <p><input type="submit" name="submit" value="注册"></p>

</form> -->
<form action="Register_ok.php" method="post" >
<div class="mt-auto p-4 ">
    <div class="form-group row container">
      <label for="user" class="col-sm-2 col-form-label text-primary" >账号:</label>
      <div class="col-sm-9">
      <input type="text" class="form-control" name="user" placeholder="user">
      </div>
    </div>
    <div class="form-group row container">
      <label for="password" class="col-sm-2 col-form-label text-primary">密码:</label>
      <div class="col-sm-9 ">
        <input type="password" class="form-control"  name="password" placeholder="Password">
      </div>
    </div>
    <div class="form-group row container">
      <label for="password" class="col-sm-2 col-form-label text-primary">姓名:</label>
      <div class="col-sm-9 ">
        <input type="text" class="form-control"  name="cname" placeholder="cname">
      </div>
    </div>
    <div class="form-group row container">
      <label for="password" class="col-sm-2 col-form-label text-primary">国家:</label>
      <div class="col-sm-9 ">
        <input type="text" class="form-control"  name="country" placeholder="country">
      </div>
    </div>
<div>
<button type="submit" class="btn btn-info" name="submit">注册</button>
  </form>
<? require_once("Footer.html"); ?>