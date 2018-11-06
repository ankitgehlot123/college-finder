<?php
include("conn.php");
$result = mysqli_query($con,'update login_detail set premium = 1 where id = "'.$_POST['id'].'"');
?>