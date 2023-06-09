<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>付款</title>
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
require_once("conn.php");
    $user=$_SESSION['user'];
    $sum=0;
    $sql = "SELECT ProductId,Name,Quantity,ListPrice from cart where Username = '$user'";
    $result = $db->query($sql);
    if($result->num_rows < 1)
    exit("未查到数据");
    while ($row = $result->fetch_assoc()){
        $sum+=$row['Quantity']*$row['ListPrice'];//总价
?>
<?}?>
<body class="container mt-3">
  <div class="card text-center">
    <div class="card-header">
      请扫码支付
    </div>
    <div class="card-body">
    <div class="container">
    <img src="Images/收款.jpg" class="img-thumbnail" width="300" height="auto">
  </div>
      <p class="card-text">您一共需要支付<?=number_format($sum,2)?>元</p>
      <a href="index.php" class="btn btn-primary">还想看看其他的</a>
    </div>
    <div class="card-footer text-muted">
      本次购物很满意吧
    </div>
  </div>
</body>

