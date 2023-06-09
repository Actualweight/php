<?
//链接数据库
require_once 'conn.php';
if(isset($_GET['bookName'])){
	$bookName=$_GET['bookName'];
}
$result=$db->query("select * from product where `Name` like '%$bookName%'");//模糊查询

if($result->num_rows < 1)
exit('没有找到图书');

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
		<td ><a href="<?=$row['ProductId']?>">加入购物车</a></td>
	</tr>
	<tbody>
	<?}?>
</table>
</div>


	

