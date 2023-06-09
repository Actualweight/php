<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <script src="js/jQuery3.4.1.js"></script>
  <script src="js/bootstrap.bundle.js"></script>
</head>
<?
    session_start();
    if(!isset($_SESSION['user']))
{
    echo "<script>alert('请先登录');location='login.php'</script>";
}
?>
<meta charset="UTF-8">
<title>购物车</title>

<script type="text/javascript">
    function update(productid)
    {
        var proNumber = document.getElementById("txt_p"+productid);
        var count = proNumber.value.replace(/[^0-9-]+/,'');//剔除非法字符
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status==200) {
                if(xhr.responseText==1){
                    computeSum();
                }else{
                    alert('更新失败');
                }
            }
        }
        xhr.open("GET","ShoppingCart_update.php?count="+count+"&productid="+productid);
        xhr.send();
    }
    function computeSum(){
        var table = document.getElemebrsByClassName("tb")[0];
        var rowCount = table.rows.length;
        var sum = 0;
        //遍历所有数据行
        for(i=1;i<rowCount-1;i++){
            var row = table.rows[i];
            var count = row.cells[1].firstElementChild.value;
            var price = parseFloat(row.cells[2].innerText);
            sum += count * price;

        }
        //更新价格
        table.rows[rowCount-1].cells[2].innerHTML = sum.toFixed(2);
    }

</script> 
<? include("HeaderNav.php"); ?>
<!-- <body class="container mt-3">
  <div class="card text-center">
    <div class="card-header"> -->
<div class="container">
<table  class="table table-hover">
<thead class="thead-light">
	<tr>
		<th scope="col" class="text-center">书籍名称</th>
		<th scope="col" class="text-center">数量</th>
		<th scope="col" class="text-center">价格</th>
		<th scope="col" class="text-center">删除</th>
	</tr>
	</thead>
</div>
<?
    require_once 'conn.php';
    $user=$_SESSION['user'];
    $sum=0;
    $sql = "SELECT ProductId,Name,Quantity,ListPrice from cart where Username = '$user'";
    $result = $db->query($sql);
    if($result->num_rows < 1)
    exit("未查到数据");
    while ($row = $result->fetch_assoc()){
        $sum+=$row['Quantity']*$row['ListPrice'];//总价
    
?>
<div>
<tr>
    <td class="text-center"><?=$row["Name"]?></td>
    <td class="text-center"><input type="number" id="<?='txt_p'.$row['ProductId']?>" value="<?=$row['Quantity']?>" onchange="update(<?=$row['ProductId']?>)"></td>
    <td class="text-center"><?=$row['ListPrice']?></td>
    <td class="text-center"><a href="ShoppingCart_del.php?del=1&productid=<?=$row['ProductId']?>">删除</a></td>
</tr>
</div>
<?}?>
     <div class="card-body"> 
        <tr class="text-center">
        <td ><a class="btn btn-primary" href="index.php">继续选购</a></td>
        <td>总价:</td><td><?=number_format($sum,2)?></td>
       
            <td><a class="btn btn-primary" href='CheckOut.php'>结算</a></td>
    
</tr>
</div>
</table> 
<!-- </body>
    </div>
    </div>  -->
<? include("Footer.html"); ?>  