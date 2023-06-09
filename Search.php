<? include("HeaderNav.php") ?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
<style>
    .lbox{
      margin: 30px;
      padding: 10px;
    }
    .lbox .row {
      padding: 8px 0px;
    }
    .progress {
      margin-top: 5px;
    }
    .rbox {
      margin: 30px;
    }
    .rbox h4 {
      padding-bottom: 5px;
      color: #17a2b8;
      border-bottom: 1px solid #17a2b8;
    }
	.rbox h6{
		padding-bottom: 5px;
      color: #17a2b8;
     
	}
	.rbox input{
		padding-bottom: 5px;
      color: #17a2b8;
	}
  </style>
</head>

<div class="rbox">
<h4>搜索</h4>
</div> 
<div class="rbox">
<form action="" method="post" name="form1" onsubmit="return Search()">
	
  <div class="mt-auto p-4 ">
    <div class="form-group row container">
      <label for="user" class="col-sm-2 col-form-label text-primary" ><h6>书名:</h6></label>
      <div class="col-sm-9">
      <input type="user" class="form-control" name="bookName" placeholder="Search">
      </div>
    </div>
    <!-- <input type="text" name="bookName" > -->

	<input type="submit" name="btSubmit" value="搜索" class="cc" style="display:none">
</form>
</div>
<script>
function Search(){
	//获取关键字
	var key=form1.bookName.value;
	if(key==""){
		window.alert("请输入书籍名称");
		return false;
	}
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange=function(){
		if(xhr.readyState==4 && xhr.status==200){
			//查询成功
			document.getElementById("result").innerHTML=xhr.responseText;
		}
	}
	xhr.open("GET","Search_ok.php?bookName="+key);
	xhr.send();
	return false;
}
//获取页面内的cc元素
var search=document.querySelector(".form-control");
var cc=document.querySelector(".cc"); 

search.addEventListener("input",function(){
  if(search.value){
    cc.style.display="inline";
  }else{
    cc.style.display="none";
  }
})
  
cc.addEventListener("click",function(){
  cc.style.display="none";
})  

  


</script>
<div id='result'></div>
<? include("Footer.html") ?>
