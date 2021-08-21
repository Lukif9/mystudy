<form action="./tel.php" method="get">
	<input name="name" type="text" tabindex="100" placeholder="이름 입력" required autofocus>
	<input name="telno" type="text" tabindex="110" placeholder="전화번호 입력" required>
	<input name="save" type="submit" tabindex="120" value="저장하기">
	<input type="reset" tabindex="130" value="초기화">
</form>

<form action="./tel.php" method="get">
	<input name="list" type="submit" tabindex="140" value="목록보기">
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
	if(@$_GET['list']) {
		$db_con=mysqli_connect("localhost", "c14st16", "oPQH4E2f5sg1Fjq8", "c14st16");
		if ( !$db_con ) { echo "DB 로그인오류".mysqli_error($db_con); exit; }
		if ( !mysqli_select_db($db_con, "c14st16") ) { echo "DB선택실패".mysqli_error($db_con); exit; }
		$sql_query = "select * from `tellist` order by `name` asc";
		$return_query = mysqli_query($db_con, $sql_query);
		if ( mysqli_sum_rows($return_query) == 0 ) { echo "데이터가 없습니다."; exit; }
		$rec_counter=1;
		while ( $query_row = mysqli_fetch_assoc($retrun_query) ){
			$display_string = "<p>".$rec_counter;
			$display_string .= " ".$query_row['name']." ".$query_row['telno'];
			$display_string .= ' <a href="./tel.php?del='.$query_row['no'].'>삭제</a>';
			$display_string .= "</P>";
			$rec_counter++;
			echo $display_string;
			$display_string="";
		}
		mysqli_free_result($return_query);
		mysqli_close($db_con);
	}
	if(@$_GET['del']){
		$db_con=mysqli_connect("localhost", "c14st16", "oPQH4E2f5sg1Fjq8", "c14st16");
		if( !$db_con ) { echo "DB 로그인오류".mysqli_error($db_con); exit; }
		if( !mysqli_select_db($db_con, "c14st16") ) { echo "DB선택실패".mysqli_error($db_con); exit; }
		$query_string = 'delete from `tellist` where `no`= '.$_GET['del'];
		mysqli_query($db_con, $query_string);
		echo '<script>alert("자료 삭제 완료");</script>';
		mysqli_close($db_con);
		echo '<script>location.href="./tel.php?list=1";</script>';
	}
?>