<?php
    $num = $_GET["num"];
    $page = $_GET["page"];

    $subject = $_POST["subject"];
    $content = $_POST["content"];
    $loc = $_POST["boa_loc"];
    $con = mysqli_connect("localhost", "root", "", "sample");
    $sql = "update board_".$loc." set subject='$subject', content='$content' ";
    $sql .= " where num=$num";
    mysqli_query($con, $sql);

    mysqli_close($con);     

    echo "
	      <script>
          location.href = 'board_".$loc.".php';
	      </script>
	  ";
?>

   
