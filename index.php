<? include("HeaderNav.php"); ?>
<?
	//链接数据库
	require_once 'conn.php';
	$result=$db->query("select CategoryId,Name,Descn,Image from Category");
	if($result->num_rows>=1){
?>
<body class="container">
<ul class="books">
	<? while($row=$result->fetch_assoc()){ ?>
		<li class="books">
			<a href="Products.php?cateid=<?=$row['CategoryId']?>">
			<img src="Images/<?=$row['Image']?>">
			<div class="media-body">
			<h class="mt-0"><?=$row['Name']?></h>
			</a>
		</li>
	<? } ?>
</ul>            
<?
}else{
	echo "<div style='color:red;margin-top: 50px;'>没有查到书籍内容</div>";
}
?>
<? include("Footer.html"); ?>  


 