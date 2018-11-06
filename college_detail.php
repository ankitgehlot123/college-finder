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
<!-- Include AngularJS library -->
<script src="lib/angular/angular.min.js"></script>
<!-- Include Bootstrap Javascript -->
<script src="js/bootstrap.min.js"></script>
<script src="js/angular_sanitize.js"></script>
<script src="js/csv.js"></script>

<!-- Include controller -->
<script src="js/ui-bootstrap-tpls-0.10.0.min.js"></script>
<script src="js/angular-script.js"></script> 
<style>
/* The Modal (background) */
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  padding-top: 100px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: black;
  opacity: 0.95;
}

/* Modal Content */
.modal-content {
  position: relative;
  margin: auto;
  padding: 0;
  width: 90%;
  max-width: 1200px;
  background-color: transparent;
}

/* The Close Button */
.close {
  color: white;
  position: absolute;
  top: 10px;
  right: 25px;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #999;
  text-decoration: none;
  cursor: pointer;
}

.mySlides {
  display: none;
}    
#Name {
  color: white;
}
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

<div class="container wrapper" ng-controller="DbController">
<h1 style="padding-top: 20px;" class="text-center">College Details</h1>

<nav class="navbar navbar-default" style="max-height:90px">
<div class="navbar-header">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <select name="state" id="state" required style="background-color :transparent; width:100%;height:30px;"></select>
          <select name="city" id="city" required style="background-color :transparent;width:100%;height:30px;"></select>
      <button type="submit" value="login" style="background-color :transparent;width:100%;height:30px;">Filter</button>
      </form>
    <!--<select name="state" id="state" required></select>
    <select name="city" id="city" required></select>
    <input type="submit" value="Filter">-->
</nav>
<!-- Table to show employee detalis -->
<div class="table-responsive">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("conn.php");
    $result = mysqli_query($con,'select * from basic_detail where state = "'.$_POST['state'].'" and city = "'.$_POST['city'].'"');
    //Fetch_Rows
    if($result){
      echo '<table class="table table-hover">';
        //Header_of_Table
        echo '<tr>';
        echo "<tr><th>Name</th><th>City</th><th>Website</th><th>University</th></tr>";
        echo '</tr>';
        //Rows_of_Table
        $j=1;
          while($row = $result->fetch_array(MYSQLI_NUM)){
            echo '<tr class="table_row cursor" onclick="pop_detail('.$j.')">';
            for($i = 0; $i < count($row);$i++)
            {
                if( $i == 2 || $i == 5 || $i == 9 || $i == 17)
                    echo '<td>'.$row[$i].'</td>';
                else
                    echo "<td style='display:none'>".$row[$i]."</td>";
            }
            echo '</tr>';
            $j++;
          }
          echo "</table>";
    }
}
?>
</div>
</div>
</div>
</div>     

<!-- OTHERS MODEL -->
<div id="myModal" class="modal">
  <div class="modal" id="loader5">
    <div class="loader"></div>
  </div>
  <span class="close cursor" onclick="closeModal('myModal')">&times;</span>
  <div class="modal-content">
      <h3 style="color: white;" class="text-center">College Details</h3>
        <div class="form-group">
            <label id="Name">Name</label>
            <input id="p1" type="text" name="name" class="form-control"  value="" disabled/>
        </div>
        <div class="form-group">
            <label id="Name">Address</label>
            <input id="p2" type="text" name="address" class="form-control"  value="" disabled/>
        </div>
        <div class="form-group">
            <label id="Name">city</label>
            <input id="p3" type="text" name="city" class="form-control"  value="" disabled/>
        </div>
        <div class="form-group">
            <label id="Name">state</label>
            <input id="p4" type="text" name="state" class="form-control"  value="" disabled/>
        </div>
        <div class="form-group">
            <label id="Name">website</label>
            <input id="p5" type="text" name="website" class="form-control"  value="" disabled/>
        </div>
        <div class="form-group">
            <label id="Name">University</label>
            <input id="p6" type="text" name="university" class="form-control"  value="" disabled/>
        </div>
        <div class="form-group">
            <label id="Name">Staff Quarter</label>
            <input id="p7" type="text" name="name" class="form-control"  value="" disabled/>
        </div>
        <div class="form-group">
            <label id="Name">Foreign Students</label>
            <input id="p8" type="text" name="name" class="form-control"  value="" disabled/>
        </div>
        <div class="form-group">
            <label id="Name">Teaching Staff</label>
            <input id="p9" type="text" name="name" class="form-control"  value="" disabled/>
        </div>
        <div class="form-group">
            <label id="Name">Non Teaching Staff</label>
            <input id="p10" type="text" name="name" class="form-control"  value="" disabled/>
        </div>
        <div class="form-group">
            <label id="Name">Hostel Availability</label>
            <input id="p11" type="text" name="name" class="form-control"  value="" disabled/>
        </div>
        <div id="map" style="width:100%;height:500px"></div>
  </div>
</div>

    <script type="text/javascript">
  function openModal() {
    document.getElementById("myModal").style.display = "block";
    document.getElementById("login-input1").style.display = "none";
    document.getElementById("login-input2").style.display = "none";
    }

  function closeModal() {
    document.getElementById("myModal").style.display = "none";
    document.getElementById("login-input1").style.display = "block";
    document.getElementById("login-input2").style.display = "block";
  }
  
  function myMap(lat,log) {
  var mapCanvas = document.getElementById("map");
  var myCenter = new google.maps.LatLng(lat,log); 
  var mapOptions = {center: myCenter, zoom: 5};
  var map = new google.maps.Map(mapCanvas,mapOptions);
  var marker = new google.maps.Marker({
    position: myCenter,
    animation: google.maps.Animation.BOUNCE
  });
  marker.setMap(map);
}
  function pop_detail(n){

    //Header
    var table_header = document.getElementsByTagName("tr")[0];
    var ths = table_header.getElementsByTagName("th");

    //Row_Data
    var table_row = document.getElementsByTagName("tr")[n+1];
    var tds = table_row.getElementsByTagName("td");
    document.getElementById('p1').value = tds[2].innerHTML;
    document.getElementById('p2').value = tds[3].innerHTML;
    document.getElementById('p3').value = tds[5].innerHTML;
    document.getElementById('p4').value = tds[6].innerHTML;
    document.getElementById('p5').value = tds[9].innerHTML;
    document.getElementById('p6').value = tds[17].innerHTML;
    document.getElementById('p7').value = tds[20].innerHTML;
    document.getElementById('p8').value = tds[23].innerHTML;
    document.getElementById('p9').value = tds[24].innerHTML;
    document.getElementById('p10').value = tds[25].innerHTML;
    document.getElementById('p11').value = tds[27].innerHTML;
    var lat = tds[14].innerHTML;
    var log = tds[15].innerHTML;

    if(lat == "NA" && log == "NA"){
        document.getElementById("map").style.display = "none";
    }
    myMap(lat,log);
    openModal();
    }  
</script>
<script src="js/gis.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBmfoifUCosh2aKjbBm7B9rGGKY9np3R3M&callback=myMap"></script> 
</body>
</html>