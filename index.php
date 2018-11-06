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
  <div>
    <h1 style="padding-top: 20px;" class="text-center">College Finder</h1>
  <div>
<ion-view title="Login" id="page3">
  <ion-content padding="true" class="has-header">
    <form style="padding-top: 20px;" method="POST" action="sign_in.php" id="login-form1" class="list">
      <ion-list id="login-list1">
        <label class="item item-input" id="login-input1">
          <span class="input-label">Login As</span>
          <select name="login_as" style="width: 30%; border: none;">
            <option value="College Admin" selected>College Admin</option>
            <option value="Student">Student</option>
          </select>
        </label>
        <label class="item item-input" id="login-input1">
          <span class="input-label">ID/Username</span>
          <input type="text" name="id" placeholder ="" required>
        </label>
        <label class="item item-input" id="login-input2">
          <span class="input-label">Password</span>
          <input type="password" name="pwd" placeholder ="" required>
        </label>
      </ion-list>
      <div class="spacer" style="height: 40px;"></div>
      <button type="submit" value="login" id="login-button3" class="button button-stable button-block">Log in</button>
      </form>
          <a href="signup.php"><span style="min-width:100%;text-align: center;" class="input-label">SignUp?</span></a>
  </ion-content>
</ion-view>
  </div>
</div>
  </body>
</html>