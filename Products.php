<? include("HeaderNav.php")?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">

</head>
<?
//链接数据库
require_once 'conn.php';
if(isset($_GET['cateid'])){
	$cateid=$_GET['cateid'];
}
$result=$db->query("select * from product where `CategoryId`=$cateid");//查询该类别的图书

if($result->num_rows < 1)
exit('没有找到图书');
//分页
$page=1;
if(isset($_GET['page']) && $_GET['page']>0){
	$page=$_GET['page'];
}
$pageSize=6;
//分页计算
$recordCount=$result->num_rows;
$pageCount=ceil($recordCount/$pageSize);
$idx = ($page-1)*$pageSize;
$sql="select* from product where `CategoryId`=$cateid limit $idx,$pageSize";
//分页查询
$result=$db->query($sql);
?>
<div class="container">
<table  class="table table-hover">
<thead class="thead-light">
	<tr>
		<th scope="col" class="text-center">书名</th>
		<th scope="col" class="text-center">书籍介绍</th>
		<th scope="col" class="text-center">封面</th>
		<th scope="col" class="text-center">价格</th>
		<th scope="col" class="text-center" >加入</th>
	</tr>
	</thead>
<? while($row=$result->fetch_assoc()){ ?>
	<tbody>
	<tr>
		<td><?=$row['Name']?></td>
		<td><p class="text-center"><?=$row['Descn']?></p></td>
		<td  ><img src="Images/<?=$row['Image']?>" width="80px" height="100px"></td>
		<td ><?=$row['ListPrice']?></td>
		<td ><a href="ShoppingCart_add.php?productid=<?=$row['ProductId']?>">加入购物车</a></td>
	</tr>
	<tbody>
	<?}?>
</table>
</div>
	<?
	   echo "共有 $recordCount 条记录";
		echo "第 $page/$pageCount 页";
		
		// 显示分页链接的代码
		if($page == 1)	 			//如果是第1页，则不显示第1页的链接
			echo  "首页  上一页 ";
				
		else 
		    echo "<a href='?cateid={$cateid}&page=1'>首页</a> 
			      <a href='?cateid={$cateid}&page=".($page-1)."'>上一页</a>";
				  
		if($page == $pageCount)   		 // 设置“下一页”链接
			echo  " 下一页  末页 ";
		else 
		    echo "<a href='?cateid={$cateid}&page=".($page+1)."'> 下一页</a> 
			      <a href='?cateid={$cateid}&page=$pageCount'>末页</a>";
		?>
	<!-- <ul class="pagination pagination-sm">
    <li class="page-item"><a class="page-link" href="">首页</a></li>
    <li class="page-item"><a class="page-link" href="#">上一页</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">4</a></li>
    <li class="page-item"><a class="page-link" href="#">5</a></li>
    <li class="page-item"><a class="page-link" href="#">下一页</a></li>
    <li class="page-item"><a class="page-link" href="#">尾页</a></li>
  </ul> -->
	
<? include("Footer.html"); ?>
