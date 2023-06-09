<!-- 网页头部 -->
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="Style.css" />
	<script src="js/jQuery3.4.1.js"></script>
	<script src="js/bootstrap.bundle.js"></script>
  </head>
  <header></header>
<!-- 导航区 -->

<nav>
	<ul>
		<li><a href="Index.php" >主 页</a></li>
		<li><a href="Search.php"  >搜索</a></li>
		<li><a href="ShoppingCart.php"  >购物车</a></li>
		<li><a href="Register.php"  >用户注册</a></li>
		<li><a href="UserProfile.php"  >用户信息</a></li>
		<?
		session_start();
			if(!isset($_SESSION['user'])){
			echo "<li><a href='Login.php' '>用户登录</a></li></div>";	 
		}
		?>
	<li><a href='Logout.php' >注销</a></li>
</ul>
<span id='welcome'>
	<?php
			if(isset($_SESSION['user'])){
			echo $_SESSION['user'].",";  
			}
	?>
	 欢迎访问网上书城系统！
</span>
</nav>

<!-- 内容区的开始 -->
<main> 
