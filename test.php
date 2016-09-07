<?php 
	$conn = new mysqli('localhost','root','root','test');
	mysqli_set_charset($conn, "utf8");
	$result = $conn -> query( 'select * from msg' );
	$num=mysqli_num_rows($result);
	if(empty($_POST['page'])){
		$page=1;
	}else{
		$page=$_POST['page'];
	}
	
	$pageSize=3;
	$total=ceil($num/$pageSize);
	// echo $total;
	$pageNum=($page-1)*$pageSize;
	/*echo $total;
	echo $page;
	echo $num;
	echo $pageNum;*/
	// echo $page;
	$result = $conn -> query("select * from `msg` limit ".$pageNum.",".$pageSize."");
	// echo $sqls;
	$array = array();
	$array['title']  = $result -> fetch_all(MYSQL_ASSOC);
	echo json_encode($array);