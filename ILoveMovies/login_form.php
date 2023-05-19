<!DOCTYPE html>
<html>
<head>
<style>
		body {
		background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url("./img/login.jpg");
    	 background-size: cover;
		}
</style> 
<meta charset="utf-8">
<title>Join to MovieLovers</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/login.css">
<link rel="stylesheet" type="text/css" href="./css/style.css">
<script type="text/javascript" src="./js/login.js"></script>
</head>
<body> 
	<header>
    	<?php include "header.php";?>
    </header>
	<section>
        <div id="main_content">
      		<div id="login_box">
	    		<div id="login_title">
		    		<span>LOGIN<a class="log" href="member_form.php"><button>회원가입</button></a></span>
	    		</div>
	    		<div id="login_form">
          		<form  name="login_form" method="post" action="login.php">		       	
                  	<ul>
                    <li><input type="text" name="id" placeholder="아이디" ></li>
                    <li><input type="password" id="pass" name="pass" placeholder="비밀번호" ></li> <!-- pass -->
                  	</ul>
                  	<div id="login_btn" style="display: flex; justify-content: center;">
                		<a class="log" href="login_form.php"><button>로그인</button></a>
                  	</div>		    	
           		</form>
        		</div> <!-- login_form -->
    		</div> <!-- login_box -->
        </div> <!-- main_content -->
	</section> 
	<footer>
    	<?php include "footer.php";?>
    </footer>
</body>
</html>

