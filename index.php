<?
	include './db/loginDB.inc';
	
	if ( isset($_COOKIE['mId']) && isset($_COOKIE['mAlias'])  ) {
		$mId = $_COOKIE['mId'];
		$mAlias = $_COOKIE['mAlias'];
		echo "반갑습니다.".$mId." (".$mAlias.")님!";
		echo '<a href="./index.php?logout=true">로그아웃</a>';
		if(isset($_GET['logout'])) {
			setcookie("mId", "");
			setcookie("mAlias", "");
			echo "<meta http-equiv='refresh' content='0;url=index.php'>";
		}
	}
	else
	{
		if( !isset($_GET['mId']) || !isset($_GET['mPw']) ) {
			echo '<form action="index.php" method="get">';
			echo 'ID: <input type="text" name="mId">';
			echo 'PW: <input type="text" name="mPw">';
			echo '<input type="submit" value="로그인" name="login">';
			echo '</form>';
		} else {
			if( isset($_GET['login']) ) {
				$mId = $_GET['mId'];
				$mPw = $_GET['mPw'];
				$db_handler = mysqli_connect( $db_server, $db_user, $db_pw, $db_db );
				 ( !$db_handler ) && print '<script>alert("DB 로그인 실패");location.href="index.php";</script>';
				mysqli_select_db($db_handler, 'c14st16');

				$my_sql = 'select * from `members` where `mId`="'.$mId.'" && `mPw`="'.$mPw.'"';
				$sql_result = mysqli_query($db_handler, $my_sql);
				( mysqli_num_rows($sql_result) == 0 ) && mysqli_close($db_handler) &&print '<script>alert("사용자가 없습니다");location.href="index.php";</script>';
				$sql_row = mysqli_fetch_assoc($sql_result);
				setcookie("mId", $sql_row['mId']);
				setcookie("mAlias", $sql_row['mAlias']);
				mysqli_free_result($sql_result);
				mysqli_close($db_handler);
				echo "<meta http-equiv='refresh' content='0;url=index.php'>";
			}
			else {
				echo '<script>alert("부정확한 접근입니다.");location.href="./index.php"</script>';
			}
		}
	}
?>