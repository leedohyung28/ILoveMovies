<!DOCTYPE html>
<html>
    <head>
<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";
    if (isset($_SESSION["userpoint"])) $userpoint = $_SESSION["userpoint"];
    else $userpoint = "";
?>		
        <div id="top">
            <a href="index.php"><img src="./img/main_logo.png" height="80px" weight="160px" alt="Logo"></a> 
            <ul id="top_menu">
            <?php
    if(!$userid) {
?>                 
                <a class="log" href="login_form.php"><button>LOGIN</button></a>   
                <?php
    } else {
                $logged = $username."(".$userid.")님[레벨:".$userlevel.", 영화덕후력 :".$userpoint."]";
?>
                <li><?=$logged?> </li>
                <a class="log" href="logout.php"><button>로그아웃</button></a>
                <a class="log" href="member_modify_form.php"><button>정보 수정</button></a>
<?php
    }
?>
<?php
    if($userlevel=='관리자') {
?>
                <a class="log" href="admin_f.php"><button>관리자모드</button></a>
<?php
    }
?>  
       <ul id="bs">     
        <div class="dropdown">
            <button class="dropdown-button">쪽지</button>
            <div class="dropdown-content">
                <a href="message_form.php">쪽지 쓰기</a>
                <a href="message_box.php?mode=send">보낸 쪽지</a>
                <a href="message_box.php?mode=rv">받은 쪽지</a>
</div>
</div>
        <div class="dropdown">
            <button class="dropdown-button">게시판</button>
            <div class="dropdown-content">
                <a href="board_free.php">자유게시판</a>
                <a href="board_recommend.php">추천게시판</a>
                <a href="board_debate.php">비판과비평</a>
                <a href="board_talk.php">잡담</a>
</div>
</div>
        <div class="dropdown">
            <button class="dropdown-button">영화예매</button>
            <div class="dropdown-content">
                <a href="https://www.cgv.co.kr/"><img src="./img/cgv.png" height="25px"></a>
                <a href="https://www.megabox.co.kr/"><img src="./img/megabox.png" height="25px"></a>
                <a href="https://www.lottecinema.co.kr/"><img src="./img/lotte.png" height="25px"></a>
                <a href="https://www.dtryx.com/main.do"><img src="./img/ditrix.png" height="25px"></a>
</div>
</div>
        <div class="dropdown">
            <button class="dropdown-button">영화평점사이트</button>
            <div class="dropdown-content">
                <a href="https://www.imdb.com/"><img src="./img/imdb.png" height="30px"></a>
                <a href="https://www.metacritic.com/movie"><img src="./img/meta.png" height="25px"></a>
                <a href="https://www.rottentomatoes.com/"><img src="./img/roto.png" height="25px"></a>
                <a href="https://pedia.watcha.com/ko-KR/"><img src="./img/watcha.png" height="25px"></a>
</div>
</div>

            </ul>
</ul>
        </div>
</head>
</html>