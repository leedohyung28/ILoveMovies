<!DOCTYPE html>
<html>
<head> 
<style>
	body {
		background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url("./img/admin.jpg"); 
		background-size: cover;
		}
</style>
<meta charset="utf-8">
<title>Admin Mode - The Movie Lovers</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/style.css">
<link rel="stylesheet" type="text/css" href="./css/admin.css">
</head>
<body> 
<header>
    <?php include "header.php";?>
</header>  
<section>
   	<div id="admin_box">
	    <h3 id="member_title">
	    	관리자 모드 > 회원 관리
		</h3>
	    <ul id="member_list">
				<li>
					<span class="col1">번호</span>
					<span class="col2">아이디</span>
					<span class="col3">이름</span>
					<span class="col4">레벨</span>
					<span class="col5">포인트</span>
					<span class="col6">가입일</span>
					<span class="col7">수정</span>
					<span class="col8">삭제</span>
				</li>
<?php
	$con = mysqli_connect("localhost", "root", "", "sample");
	$sql = "select * from members order by num desc";
	$result = mysqli_query($con, $sql);
	$total_record = mysqli_num_rows($result); // 전체 회원 수

	$number = $total_record;

   while ($row = mysqli_fetch_array($result))
   {
      $num         = $row["num"];
	  $id          = $row["id"];
	  $name        = $row["name"];
	  $level       = $row["level"];
      $point       = $row["point"];
      $regist_day  = $row["regist_day"];
?>
			
		<li>
		<form method="post" action="admin_member_update.php?num=<?=$num?>">
			<span class="col1"><?=$number?></span>
			<span class="col2"><?=$id?></a></span>
			<span class="col3"><?=$name?></span>
			<span class="col4">
			<select name="level">
<?php
		if ($level == "영린이") {
?>
						<option value="영린이" selected>영린이</option>
						<option value="영잘알">영잘알</option>
						<option value="시네필">시네필</option>
						<option value="관리자">관리자</option>	
<?php
		} elseif ($level == "영잘알") {
?>
						<option value="영린이">영린이</option>
						<option value="영잘알" selected>영잘알</option>
						<option value="시네필">시네필</option>
						<option value="관리자">관리자</option>	
<?php
		} elseif ($level == "시네필") {
?>
						<option value="영린이">영린이</option>
						<option value="영잘알">영잘알</option>
						<option value="시네필" selected>시네필</option>
						<option value="관리자">관리자</option>	
<?php
		} elseif ($level == "관리자") {
?>
						<option value="영린이">영린이</option>
						<option value="영잘알">영잘알</option>
						<option value="시네필">시네필</option>
						<option value="관리자" selected>관리자</option>
					
<?php
		}
?>
			</select>
			</span>
			<span class="col5"><input type="text" name="point" value="<?=$point?>"></span>
			<span class="col6"><?=$regist_day?></span>
			<span class="col7"><button type="submit">수정</button></span>
			<span class="col8"><button type="button" onclick="location.href='admin_member_delete.php?num=<?=$num?>'">삭제</button></span>
		</form>
		</li>	
			
<?php
   	   $number--;
   }
?>
	    </ul>
	    <h3 id="member_title">
	    	관리자 모드 > 게시판 관리
			<select name="board" onchange="if(this.value) location.href=(this.value);">
						<option value="admin_f.php">자유게시판</option>
						<option value="admin_r.php" selected>추천게시판</option>
						<option value="admin_d.php">비판과비평</option>
						<option value="admin_t.php">잡담</option>
			</select>
		</h3>
	    <ul id="board_list">
		<li class="title">
			<span class="col1">선택</span>
			<span class="col2">번호</span>
			<span class="col3">이름</span>
			<span class="col4">제목</span>
			<span class="col5">첨부파일명</span>
			<span class="col6">작성일</span>
		</li>
		<form method="post" action="admin_board_delete_r.php">
<?php
	$sql = "select * from board_recommend order by num desc";
	$result = mysqli_query($con, $sql);
	$total_record = mysqli_num_rows($result); // 전체 글의 수

	$number = $total_record;

   while ($row = mysqli_fetch_array($result))
   {
      $num         = $row["num"];
	  $name        = $row["name"];
	  $subject     = $row["subject"];
	  $file_name   = $row["file_name"];
      $regist_day  = $row["regist_day"];
      $regist_day  = substr($regist_day, 0, 10)
?>
		<li>
			<span class="col1"><input type="checkbox" name="item[]" value="<?=$num?>"></span>
			<span class="col2"><?=$number?></span>
			<span class="col3"><?=$name?></span>
			<span class="col4"><?=$subject?></span>
			<span class="col5"><?=$file_name?></span>
			<span class="col6"><?=$regist_day?></span>
		</li>	
<?php
   	   $number--;
   }
   mysqli_close($con);
?>
				<button type="submit">선택된 글 삭제</button>
			</form>
	    </ul>
	</div> <!-- admin_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
