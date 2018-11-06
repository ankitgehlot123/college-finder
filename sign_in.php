<html ng-app="crudApp">
<head>
<title>College Finder</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport"
      content="
          height = [pixel_value | "device-height"] ,
          width = [pixel_value | "device-width"] ,
          initial-scale = float_value ,
          minimum-scale = float_value ,
          maximum-scale = float_value ,
          user-scalable = ["yes" | "no"]
          " />
<!-- Include Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!-- Include main CSS -->
<link rel="stylesheet" type="text/css" href="css/style.css">

<!-- Include jQuery library -->
<script src="js/jquery.min.js"></script>
<style>
* {
  box-sizing: border-box;
}

header {
  box-shadow: 0px 5px 5px #999999;
  height: 50px;
  position: relative;
}  
</style>
</head>
<body>

  <header>
  <div><img onclick="goBack()" src="images/back.png" style="max-height: 30px;max-width: 30px;margin: 10px 10px;float: left;"><h1 style="float: right; padding-right: 20px; top: -7px;position: relative; font-size: 25px; ">College Finder</h1></div>
</header>
<script>
function goBack() {
    window.history.back();
}
</script>

<?php
    //open the database
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['login_as'] == "College Admin") {
    include("conn.php");
    $result = mysqli_query($con,'select * from login_detail where id = "'.$_POST['id'].'" and binary pwd = "'.$_POST['pwd'].'"');
    //Fetch_Rows
    
    if(($row = $result->fetch_array(MYSQLI_NUM)) > 0){
        if($row[2] == 0)
            $premium = "Not Available";
        else
            $premium = "Available";
        $result = mysqli_query($con,'select * from basic_detail where id = "'.$_POST['id'].'"');
        //Fetch_Rows
        if($result){
            $row = $result->fetch_array(MYSQLI_NUM);
            echo '
    <div>
  <img class="right-align img-circle img-responsive" style="margin:5% 35%;max-height:150px;max-width:150px;position:relative;" src="https://tempfiller.com/assets/images/user-post/default-logo.jpg">
  </div>
  <div STYLE="margin-bottom:5%;min-width:100%;">
    <label style="background-color:lightgrey;">
          <span class="input-label">'.$row[2].'</span>
    </label>
    </div>';

            echo '<table class="table table-hover">';
            //Header_of_Table
            echo "<tr class='table_row cursor'><th>Address</th><td>".$row[3]."</td></tr>
                  <tr class='table_row cursor'><th>City</th><td>".$row[5]."</td></tr>
                  <tr class='table_row cursor'><th>State</th><td>".$row[6]."</td></tr>
                  <tr class='table_row cursor'><th>Website</th><td>".$row[9]."</td></tr>
                  <tr class='table_row cursor'><th>University</th><td>".$row[17]."</td></tr>
                  <tr class='table_row cursor'><th>Staff Quarter</th><td>".$row[20]."</td></tr>
                  <tr class='table_row cursor'><th>Foreign Students</th><td>".$row[23]."</td></tr>
                  <tr class='table_row cursor'><th>Teaching Staff</th><td>".$row[24]."</td></tr>
                  <tr class='table_row cursor'><th>Non Teaching Staff</th><td>".$row[25]."</td></tr>
                  <tr class='table_row cursor'><th>Hostel Availability</th><td>".$row[27]."</td></tr>
                  <tr class='table_row cursor'><th>No. Of Hostels</th><td>".$row[28]."</td></tr>
                  <tr class='table_row cursor'><th>Premium</th><td>".$premium."</td></tr>";                  
            echo "</table>";

        echo '<form id="Update_form" action="update.php" method="post">
            <button type="submit" value="login" style="background-color:lightgrey;min-width:100%">Upgrade Premium</button>
            <input type="text" name="id" value="<?php echo $row[0]; ?>" style="display: none;">    
        </form>';
        }
    }
    else
    {
          echo "<script>location.href = 'index.php'</script>";
    echo "<script type='text/javascript'>alert('Either Wrong ID or Password');</script>";
         }
    }
else
{
    include("conn.php");
    $result = mysqli_query($con,'select * from login_student where username = "'.$_POST['id'].'" and binary password = "'.$_POST['pwd'].'"');
    //Fetch_Rows
    
    if(($row = $result->fetch_array(MYSQLI_NUM)) > 0){
        
          die("<script>location.href = 'college_detail.php'</script>");
        
    }
}
?>
<script type="text/javascript">
$(document).ready(function() {
      $('#Update_form').submit(function(e) {
    e.preventDefault();
    var url = $(this).attr('action');
    var data = $(this).serialize();
    
    $.post(url, data)
      .done( function(response) {
        $('#response').html(response);
        alert("Premium is Upgraded\nReload The Page to see effects");
      })
      .fail( function() {
        alert("FAILED to Upgrade!");
      });
  });
});
</script>
</body>
</html>