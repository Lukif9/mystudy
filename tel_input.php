<form action="./tel_input.php" method="get">
	<input name="name" type="text" tabindex="100" placeholder="이름 입력" required autofocus>
	<input name="telno" type="text" tabindex="110" placeholder="전화번호 입력" required>
	<input name="save" type="submit" tabindex="120" value="저장하기">
	<input type="reset" tabindex="130" value="초기화">
</form>
<?
	if(@$_GET['save']){
		$db_con=mysqli_connect("localhost", "c14st16", "oPQH4E2f5sg1Fjq8", "c14st16");
		if ( !$db_con ) { echo "DB 로그인오류".mysqli_error($db_con); exit; }
		if ( !mysqli_select_db($db_con, "c14st16") ) { echo "DB선택실패".mysqli_error($db_con); exit; }
		$sql_query = "insert into `tellist` (`name`, `telno`) values ('";
		$sql_query .= $_GET['name']."', '";
		$sql_query .= $_GET['telno']."')";
		mysqli_query($db_con, $sql_query);
		mysqli_close($db_con);
		echo '<script>alert("자료 입력 완료");</script>'; 
	}
?>