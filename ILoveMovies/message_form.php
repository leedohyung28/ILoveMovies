<!DOCTYPE html>
<html>
<head>
<style>
	body {
		background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url("./img/letter01.jpg"); 
		background-size: cover;
		}
</style>  
<meta charset="utf-8">
<title>Send Message to Other Lovers</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/style.css">
<link rel="stylesheet" type="text/css" href="./css/message.css">
<script>
  function check_input() {
  	  if (!document.message_form.rv_id.value)
      {
          alert("수신 아이디를 입력하세요!");
          document.message_form.rv_id.focus();
          return;
      }
      if (!document.message_form.subject.value)
      {
          alert("제목을 입력하세요!");
          document.message_form.subject.focus();
          return;
      }
      if (!document.message_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.message_form.content.focus();
          return;
      }
      document.message_form.submit();
   }
</script>
</head>
<body> 
<header>
    <?php include "header.php";?>
</header>  
<?php
	if (!$userid )
	{
		echo("<script>
				alert('로그인 후 이용해주세요!');
				history.go(-1);
				</script>
			");
		exit;
	}
?>
<section>
   	<div id="message_box">
	    <h3 id="write_title" style="color:#f8b9c4;">
	    		쪽지
		</h3>
		<ul class="top_buttons">
				<li><span><a href="message_box.php?mode=rv">받은 쪽지 </a></span></li>
				<li><span><a href="message_box.php?mode=send">보낸 쪽지</a></span></li>
		</ul>
	    <form  name="message_form" method="post" action="message_insert.php?send_id=<?=$userid?>">
	    	<div id="write_msg">
	    	    <ul>
				<li>
					<span class="col1">To</span>
					<span class="col2"><input name="rv_id" type="text"></span>
				</li>	
	    		<li>
	    			<span class="col1">제목</span>
	    			<span class="col2"><input name="subject" type="text"></span>
	    		</li>	    	
	    		<li id="text_area">	
	    			<span class="col1">내용</span>
	    			<span class="col2">
	    				<textarea name="content"></textarea>
	    			</span>
	    		</li>
				<li>
					<span class="col1">From</span>
					<span class="col2"><?=$userid?></span>
				</li>	
	    	    </ul>
	    	    <button type="button" onclick="check_input()">보내기</button>
	    	</div>	    	
	    </form>
	</div> <!-- message_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
