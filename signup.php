<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
    <meta name="viewport"
      content="
          height = [pixel_value | "device-height"] ,
          width = [pixel_value | "device-width"] ,
          initial-scale = float_value ,
          minimum-scale = float_value ,
          maximum-scale = float_value ,
          user-scalable = ["yes" | "no"]
          " />
    <title>College Details</title>

    
    
    <script src="lib/ionic/js/ionic.bundle.js"></script>

    <!-- cordova script (this will be a 404 during development) -->
    <script src="cordova.js"></script>

    <!-- IF using Sass (run gulp sass first), then uncomment below and remove the CSS includes above
    <link href="css/ionic.app.css" rel="stylesheet">
    -->

    <link href="css/ionic.css" rel="stylesheet">

    <style type="text/css">
      .platform-ios .manual-ios-statusbar-padding{
        padding-top:20px;
      }
      .manual-remove-top-padding{
        padding-top:0px; 
      }
      .manual-remove-top-padding .scroll{
        padding-top:0px !important;
      }
      ion-list.manual-list-fullwidth div.list, .list.card.manual-card-fullwidth {
        margin-left:-10px;
        margin-right:-10px;
      }
      ion-list.manual-list-fullwidth div.list > .item, .list.card.manual-card-fullwidth > .item {
        border-radius:0px;
        border-left:0px;
        border-right: 0px;
      }
      .show-list-numbers-and-dots ul{
        list-style-type: disc;
        padding-left:40px;
      }
      .show-list-numbers-and-dots ol{
        list-style-type: decimal;
        padding-left:40px;
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

    <script src="js/app.js"></script>
    <script src="js/controllers.js"></script>
    <script src="js/routes.js"></script>
    
    <script src="js/directives.js"></script>
    <script src="js/services.js"></script>

    <!-- Only required for Tab projects w/ pages in multiple tabs 
    <script src="lib/ionicuirouter/ionicUIRouter.js"></script>
    -->
   <body ng-app="app" animation="slide-left-right-ios7">

  <header>
  <div><img onclick="goBack()" src="images/back.png" style="max-height: 30px;max-width: 30px;margin: 10px 10px;float: left;"><h1 style="float: right; padding-right: 20px; top: -7px;position: relative; font-size: 25px; ">College Finder</h1></div>
</header>
<script>
function goBack() {
    window.history.back();
}
</script>
<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include("conn.php");
  $result = mysqli_query($con,'insert into login_student(username,email,password,class,field_of_interest) 
    values("'.$_POST['username'].'","'.$_POST['email'].'","'.$_POST['pwd'].'","'.$_POST['class'].'","'.$_POST['foi'].'")');
  if($result){
    header("Location:index.php");
  }
}
?>
  <div>
  <div>
<ion-view title="Login" id="page3">
  <ion-content padding="true" class="has-header">
    <form  style="margin-top: 30px;" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" id="login-form1" class="list">
      <ion-list id="login-list1">
        <label class="item item-input" id="login-input1">
          <span class="input-label">Username</span>
          <input type="text" name="username" placeholder ="" required>
        </label>
        <label class="item item-input" id="login-input1">
          <span class="input-label">E-mail</span>
          <input type="text" name="email" placeholder ="" required>
        </label>
        <label class="item item-input" id="login-input2">
          <span class="input-label">Password</span>
          <input type="password" name="pwd" placeholder ="" required>
        </label>
        <label class="item item-input" id="login-input2">
          <span class="input-label">Class</span>
          <input type="text" name="class" placeholder ="" required>
        </label>
        <label class="item item-input" id="login-input2">
          <span class="input-label">Field of Interest</span>
          <input type="text" name="foi" placeholder ="" required>
        </label>
      </ion-list>
      <div class="spacer" style="height: 40px;"></div>
      <button type="submit" value="login" id="login-button3" class="button button-stable button-block">SignUp</button>
      </form>
  </ion-content>
</ion-view>
  </div>
</div>
  </body>
</html>