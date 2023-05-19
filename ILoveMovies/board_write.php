<!DOCTYPE html>
<html>
<head>
<style>
	body {
		background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url("./img/write.jpg"); 
		background-size: cover;
		}
</style> 
<meta charset="utf-8">
<title>Write whatever you want</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/style.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
<script>
  function check_input() {
      if (!document.board_write.subject.value)
      {
          alert("제목을 입력하세요!");
          document.board_write.subject.focus();
          return;
      }
      if (!document.board_write.content.value)
      {
          alert("내용을 입력하세요!");    
          document.board_write.content.focus();
          return;
      }
      document.board_write.submit();
   }
</script>
</head>
<body>
<header>
    <?php include "header.php";?>
</header>  
<section>
   	<div id="board_box">
	    <h3 id="board_title">
	    		글쓰기
		</h3>
	    <form  name="board_write" method="post" action="board_insert.php" enctype="multipart/form-data">
	    	 <ul id="board_write">
				<li>
					<span class="col1">이름 : </span>
					<span class="col2"><?=$username?></span>
				</li>
				<li>
	    			<span class="col1">게시판 종류 : </span>
	    			<span class="col2">
						<select name="boa_loc">
							<option value="free">자유게시판</option>
							<option value="recommend">추천게시판</option>
							<option value="debate">비판과비평</option>
							<option value="talk">잡담</option>
						</select>
	    		</li>			
	    		<li>
	    			<span class="col1">제목 : </span>
	    			<span class="col2"><input name="subject" type="text"></span>
	    		</li>	    	
	    		<li id="text_area">	
	    			<span class="col1">내용 : </span>
	    			<span class="col2">
	    				<textarea name="content"></textarea>
	    			</span>
	    		</li>
	    		<li>
			        <span class="col1"> 첨부 파일</span>
			        <span class="col2"><input type="file" name="upfile"></span>
			    </li>
	    	    </ul>
	    	<ul class="buttons">
				<li><button type="button" onclick="check_input()">완료</button></li>
				<li><button type="button" onclick="history.go(-1)">목록</button></li>
			</ul>
	    </form>
	</div> <!-- board_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
