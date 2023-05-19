<!DOCTYPE html>
<html>
<head> 
<style>
	@import url('https://fonts.googleapis.com/css2?family=Jua&display=swap');
	body {
		background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url("./img/free.jpg");
    	background-size: cover;
		}
</style>
<meta charset="utf-8">
<title>Free Opinion of Lovers</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/style.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
</head>
<body> 
<header>
    <?php include "header.php";?>
</header>  
<section>
   	<div id="board_box">
	    <h3 style="border-bottom: solid 2px #02731E">
	    <ul>
			<li  style="font-family: 'Jua', sans-serif; color: blanchedalmond; text-shadow: -1px 0 #02731E, 0 1px #02731E, 1px 0 #02731E, 0 -1px #02731E;">
			자유게시판	
	    		<span class="col0" style="float:right;width:100px;">
					<select name="board" onchange="if(this.value) location.href=(this.value);">
						<option value="board_free.php" selected>자유게시판</option>
						<option value="board_recommend.php">추천게시판</option>
						<option value="board_debate.php">비판과비평</option>
						<option value="board_talk.php">잡담</option>
					</select>
	    	</li>
		</ul>

		</h3>
	    <ul id="board_free">
				<li>
					<span class="col1"style="font-family: 'Jua', sans-serif; color: blanchedalmond; text-shadow: -1px 0 #02731E, 0 1px #02731E, 1px 0 #02731E, 0 -1px #02731E;">번호</span>
					<span class="col2"style="font-family: 'Jua', sans-serif;color: blanchedalmond; text-shadow: -1px 0 #02731E, 0 1px #02731E, 1px 0 #02731E, 0 -1px #02731E;">제목</span>
					<span class="col3"style="font-family: 'Jua', sans-serif;color: blanchedalmond; text-shadow: -1px 0 #02731E, 0 1px #02731E, 1px 0 #02731E, 0 -1px #02731E;">글쓴이</span>
					<span class="col4"style="font-family: 'Jua', sans-serif;color: blanchedalmond; text-shadow: -1px 0 #02731E, 0 1px #02731E, 1px 0 #02731E, 0 -1px #02731E;">첨부</span>
					<span class="col5"style="font-family: 'Jua', sans-serif;color: blanchedalmond; text-shadow: -1px 0 #02731E, 0 1px #02731E, 1px 0 #02731E, 0 -1px #02731E;">등록일</span>
					<span class="col6"style="font-family: 'Jua', sans-serif;color: blanchedalmond; text-shadow: -1px 0 #02731E, 0 1px #02731E, 1px 0 #02731E, 0 -1px #02731E;">조회</span>
				</li>
<?php
	if (isset($_GET["page"]))
		$page = $_GET["page"];
	else
		$page = 1;

	$con = mysqli_connect("localhost", "root", "", "sample");
	$sql = "select * from board_free order by num desc";
	$result = mysqli_query($con, $sql);
	$total_record = mysqli_num_rows($result); // 전체 글 수

	$scale = 10;

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      

	$number = $total_record - $start;

   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)
   {
      mysqli_data_seek($result, $i);
      // 가져올 레코드로 위치(포인터) 이동
      $row = mysqli_fetch_array($result);
      // 하나의 레코드 가져오기
	  $num         = $row["num"];
	  $id          = $row["id"];
	  $name        = $row["name"];
	  $subject     = $row["subject"];
      $regist_day  = $row["regist_day"];
      $hit         = $row["hit"];
      if ($row["file_name"])
      	$file_image = "<img src='./img/file.gif'>";
      else
      	$file_image = " ";
?>
				<li>
					<span class="col1"><?=$number?></span>
					<span class="col2"><a href="board_view_free.php?num=<?=$num?>&page=<?=$page?>"><?=$subject?></a></span>
					<span class="col3"><?=$name?></span>
					<span class="col4"><?=$file_image?></span>
					<span class="col5"><?=$regist_day?></span>
					<span class="col6"><?=$hit?></span>
				</li>	
<?php
   	   $number--;
   }
   mysqli_close($con);

?>
	    	</ul>
			<ul id="page_num"> 	
<?php
	if ($total_page>=2 && $page >= 2)	
	{
		$new_page = $page-1;
		echo "<li><a href='board_free.php?page=$new_page'>◀ 이전</a> </li>";
	}		
	else 
		echo "<li>&nbsp;</li>";

   	// 게시판 목록 하단에 페이지 링크 번호 출력
   	for ($i=1; $i<=$total_page; $i++)
   	{
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<li><b> $i </b></li>";
		}
		else
		{
			echo "<li><a href='board_free.php?page=$i'> $i </a><li>";
		}
   	}
   	if ($total_page>=2 && $page != $total_page)		
   	{
		$new_page = $page+1;	
		echo "<li> <a href='board_free.php?page=$new_page'>다음 ▶</a> </li>";
	}
	else 
		echo "<li>&nbsp;</li>";
?>
			</ul> <!-- page -->	    	
			<ul class="buttons">
				<li><button onclick="location.href='board_free.php'">목록</button></li>
				<li>
<?php 
    if($userid) {
?>
					<button onclick="location.href='board_write.php'">글쓰기</button>
<?php
	} else {
?>
					<a href="javascript:alert('로그인 후 이용해 주세요!')"><button>글쓰기</button></a>
<?php
	}
?>
				</li>
			</ul>
	</div> <!-- board_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
