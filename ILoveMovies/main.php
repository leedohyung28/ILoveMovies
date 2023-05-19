<style>
    body {
		background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url("./img/main.jpg");
    	background-size: cover;
		}
</style>
<div class="section">
    <div class="mid">
        <input type="radio" name="slide" id="slide01" style="display:none" checked>
        <input type="radio" name="slide" id="slide02" style="display:none" checked>
        <input type="radio" name="slide" id="slide03" style="display:none" checked>

        <div class="slidewrap">
            <ul class="slidelist">
                <li>
                    <a href="https://www.google.com/search?q=%EC%A5%AC%EB%9D%BC%EA%B8%B0%EC%9B%94%EB%93%9C+%EB%8F%84%EB%AF%B8%EB%8B%88%EC%96%B8&ei=Vv6ZYpTZOazK2roPnZi2kAo&gs_ssp=eJwBLwDQ_woNL2cvMTFmNnkzcWR4eTABShzspazrnbzquLDsm5Trk5wg64-E66-464uI7Ja42rIYlA&oq=%EC%A5%AC%EB%9D%BC%EA%B8%B0%EC%9B%94%EB%93%9C+&gs_lcp=Cgdnd3Mtd2l6EAEYADILCC4QgAQQsQMQgwEyBAgAEAMyCwguEIAEELEDEIMBMgsIABCABBCxAxCDATIECAAQAzIECAAQAzIFCAAQgAQyBQguEIAEMgUIABCABDIFCAAQgAQ6BwgAEEcQsANKBAhBGABKBAhGGABQ4AFY4AFgtQhoAXABeACAAXiIAXiSAQMwLjGYAQCgAQHIAQrAAQE&sclient=gws-wiz">
                        <label for="slide03" class="left"></label>
                        <img src="./img/slide01.jpg" height="300" >
                        <label for="slide02" class="right"></label>
                    </a>
                </li>
                <li>
                    <a href="https://www.google.com/search?q=%EB%B2%94%EC%A3%84%EB%8F%84%EC%8B%9C2&ei=eP6ZYojhMezt2roPqKyV-Ag&ved=0ahUKEwiI_buZpJH4AhXstlYBHShWBY8Q4dUDCA4&uact=5&oq=%EB%B2%94%EC%A3%84%EB%8F%84%EC%8B%9C2&gs_lcp=Cgdnd3Mtd2l6EAMyBwgAEEcQsAMyBwgAEEcQsAMyBwgAEEcQsAMyBwgAEEcQsAMyBwgAEEcQsAMyBwgAEEcQsAMyBwgAEEcQsAMyBwgAEEcQsAMyBwgAEEcQsAMyBwgAEEcQsANKBAhBGABKBAhGGABQlghYlghgkQloAXABeACAAQCIAQCSAQCYAQCgAQHIAQrAAQE&sclient=gws-wiz">
                        <label for="slide01" class="left"></label>
                        <img src="./img/slide02.jpg" height="300" >
                        <label for="slide03" class="right"></label>
                    </a>
                </li>
                <li>
                    <a href="https://www.google.com/search?q=%EC%98%81%ED%99%94+%EB%B8%8C%EB%A1%9C%EC%BB%A4&oq=%EC%98%81%ED%99%94+%EB%B8%8C%EB%A1%9C%EC%BB%A4&aqs=chrome.0.0i131i355i433i512j46i131i433i512j0i131i433i512j0i512l2j46i512j0i512l4.2119j0j4&sourceid=chrome&ie=UTF-8">
                        <label for="slide02" class="left"></label>
                        <img src="./img/slide03.jpg" height="300" >
                        <label for="slide01" class="right"></label>
                    </a>
                </li>    
            </ul>
        </div>
        <div id="newsletter">
            <h4>영화계 소식 - (중앙 일보 제공)</h4>
            <ul>
            <?php
    ini_set("allow_url_fopen",1);
    include 'simple_html_dom.php';
    $data = file_get_html("https://www.joongang.co.kr/culture/movie");
    foreach($data->find("ul.story_list") as $ul){
        $i = 0;
        foreach($ul->find("h2.headline") as $li){
            if($i < 7){
                echo "<br>";
                echo $li;
                $i++;
            }
        }
    }
?>
            </ul>
</div>
</div>
        <div id="main_content">
        <div id="point_rank">
                <h4>영화 덕후 랭킹</h4>
                <ul>
<!-- 포인트 랭킹 표시하기 -->
<?php
    $con = mysqli_connect("localhost", "root", "", "sample");
    $sql = "select * from board_free union select * from board_talk union select * from board_recommend union select * from board_debate order by regist_day desc limit 5";
    $result = mysqli_query($con, $sql);
    $rank = 1;
    $sql = "select * from members order by point desc limit 5";
    $result = mysqli_query($con, $sql);

    if (!$result)
        echo "회원 DB 테이블(members)이 생성 전이거나 아직 가입된 회원이 없습니다!";
    else
    {
        while( $row = mysqli_fetch_array($result) )
        {
            $name  = $row["name"];        
            $id    = $row["id"];
            $point = $row["point"];
            $name = mb_substr($name, 0, 1)." * ".mb_substr($name, 2, 1);
?>
                <li>
                    <span><?=$rank?></span>
                    <span><?=$name?></span>
                    <span><?=$id?></span>
                    <span><?=$point?></span>
                </li>
<?php
            $rank++;
        }
    }

    mysqli_close($con);
?>
                </ul>
            </div>
            <div id="latest">
                <h4>최근 게시글</h4>
                <ul>
<!-- 최근 게시 글 DB에서 불러오기 -->
<?php
    $con = mysqli_connect("localhost", "root", "", "sample");
    $sql = "select * from board_free union select * from board_talk union select * from board_recommend union select * from board_debate order by regist_day desc limit 5";
    $result = mysqli_query($con, $sql);

    if (!$result)
        echo "게시판 DB 테이블(board)이 생성 전이거나 아직 게시글이 없습니다!";
    else
    {
        while( $row = mysqli_fetch_array($result) )
        {
            $regist_day = substr($row["regist_day"], 0, 10);
?>
                <li>
                    <span><?=$row["subject"]?></span>
                    <span><?=$row["name"]?></span>
                    <span><?=$regist_day?></span>
                </li>
<?php
        }
    }
?>            
            </div>
</ul>
            
        </div>
</div>