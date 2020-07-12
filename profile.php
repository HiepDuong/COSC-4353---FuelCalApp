<?php

session_start();
$dbhost = 'mylibrary.cn6fzragcwuf.us-west-1.rds.amazonaws.com';
$dbuser = 'root';
$dbpassword = 'Houston16';
$dbname = 'FuelDatabase';
$con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
//echo $_SESSION['UserID'];
if (mysqli_connect_error())
    {
        echo "It failed";
        die('Connection Failed: '.mysqli_connect_error());
    }
    $query = "SELECT * FROM `State`";
    $result2 = mysqli_query($con, $query);

$options = "";

while($row2 = mysqli_fetch_array($result2))
{
    $options = $options."<option>$row2[State]</option>";
}

$sessions = $_SESSION['$userid'];

if (isset($_POST['submit'])) {
    $password = $_POST['password'];
    $confirm_password = $_POST['password2'];
    $Fullname = $_POST['FullName'];
    $Address1 = $_POST['Address1'];
    $Address2 = $_POST['Address2'];
    $City = $_POST['City'];
    $State = $_POST['State'];
    $zip = $_POST['zip'];
    $v = 0;

if($password != $confirm_password){
    echo "Password did not match, Please try again";
}
else {
    

$up1 = "UPDATE Users SET Password =?, FullName= ?, Address1= ?, Address2=?, City=?, State=?, ZipCode=? WHERE (UserId = ? AND ID > ?)";
$stmt3=$con->prepare($up1);
$hashPassword = password_hash($password, PASSWORD_DEFAULT);
$stmt3->bind_param("ssssssssi", $hashPassword,$Fullname,$Address1,$Address2,$City,$State,$zip,$sessions,$v );
       $stmt3->execute();
       $stmt3->close();
	
            echo "execute";}
            }
 
   ?>



<!DOCTYPE html>
<html>

<header>
<div class="panel panel-default">
    <div class="panel-heading">  <h2 >User Profile</h2></div>
     <div class="panel-body">


        <div class="col-sm-6">
            <h4 style="color:sandybrown;">Welcome User: </h4></span>
            <?php echo $sessions ?>
            </div>
            <div class="clearfix"></div>
      <nav>
       <div class = "Navigation">     
      
            <a href ="index.html" ><tile><strong>Logout</strong></tile></a>
            <a href ="Home.php" ><tile><strong>Back To Home</strong></tile></a>
            
          </div>
      </nav>
            

</header>

 
<body>
<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a  href="Home.php">Home/Fuel Quote</a>
<a  href="Fuel_Quote_History.php">Fuel Quote History</a>
              <a href="profile.php">Profile</a>
           
  
</div>

<div id="main">
  <button class="openbtn" onclick="openNav()">☰ Side Bar</button>  
</div>
</body>

            <div>
            <h2> If you want to change your information, please fill out the form below and click update</h2>

            <form action = "profile.php" method = "POST" id="up" class="input-group">

                
<input type= "password"  name = "password" class="input-field" placeholder="Enter Password" required> <!-- Create a user pass  required-->
<br>
<input type= "password" name = "password2" class="input-field" placeholder="Confirm Password" required>
<br>
<input type= "text"   name = "FullName" class="input-field" placeholder="Full Name" required>
<br>
<input type= "text"   name = "Address1" class="input-field" placeholder="Primary Address" required>
<br>
<input type= "text"   name = "Address2" class="input-field" placeholder="Secondary Address (Optional)"> <!-- Optional so dont need required-->
<br>
<input type= "text"   name = "City" class="input-field" placeholder="City" required>
<br>
<input type="number" name="zip" pattern="[0-9]{5}" placeholder ="Zipcode"required>


    <br>
    <label for="State">States:</label>
    <select  type="text" name="State" id="State">
        
      <option value="AL">Alabama</option>
      <option value="AK">Alaska</option>
      <option value="AZ">Arizona</option>
      <option value="AR">Arkansas</option>
      <option value="CA">California</option>
      <option value="CO">Colorado</option>
      <option value="CT">Connecticut</option>
      <option value="DE">Delaware</option>
      <option value="FL">Florida</option>
      <option value="GA">Georgia</option>
      <option value="HI">Hawaii</option>
      <option value="IH">Idaho</option>
      <option value="IL">Illinois</option>
      <option value="IN">Indiana</option>
      <option value="IA">Iowa</option>
      <option value="KS">Kansas</option>
      <option value="KY">Kentucky</option>
      <option value="LA">Louisiana</option>
      <option value="ME">Maine</option>
      <option value="MD">Maryland</option>
      <option value="MA">Massachusetts</option>
      <option value="MI">Michigan</option>
      <option value="MN">Minnesota</option>
      <option value="MS">Mississippi</option>
      <option value="MO">Missouri</option>
      <option value="MT">Montana</option>
      <option value="NE">Nebraska</option>
      <option value="NV">Nevada</option>
      <option value="NH">New Hamsphire</option>
      <option value="NJ">New Jersey</option>
      <option value="NM">New Mexico</option>
      <option value="NY">New York</option>
      <option value="NC">North Carolina</option>
      <option value="ND">North Dakota</option>
      <option value="OH">Ohio</option>
      <option value="OK">Okaloma</option>
      <option value="OR">Oregon</option>
      <option value="PA">Pennsylvia</option>
      <option value="RI">Rhode Island</option>
      <option value="SC">South Carolina</option>
      <option value="SD">South Dakota</option>
      <option value="TN">Tennessee</option>
      <option value="TX">Texas</option>
      <option value="UT">Utah</option>
      <option value="VT">Vermont</option>
      <option value="VA">Virginia</option>
      <option value="WA">Washington</option>
      <option value="WV">West Virginia</option>
      <option value="WI">Wisconsin</option>
      <option value="WY">Wyoming</option>
      
<br>
<br>

<input type="submit" name = "submit" value = "Update">

            </p>
            

        </div>
       
    
</html>

<script>
     $(function() {
$('#profile-image1').on('click', function() {
  $('#profile-image-upload').click();
});
});       



function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script> 



<style>
   
                  input.hidden {
    position: absolute;
    left: -9999px;
}

  label
  {
    color: green;
  }
   body {
  background-image: url("Profile.jpg");
  margin: 100;
    
    height: 80%;
    background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
div{
  text-align: center;
}
   h2
   {
     color: red;
   }
   


button{
        background-color: orange;
      color: rgb(233, 19, 144);
      padding: 14px;
      margin: 8px 0;
      border: none;
         border-radius: 50px;
      border: none;
      cursor: pointer;
      width: 10%;
    }
    
    .containerAdmin{
        float: left;
     
    }
    .center{
        text-align: center;
        
        }
   
.Navigation
{
  background-color: #333;
    overflow: hidden;
}
.Navigation a {
  float: right;
  color: #f2f2f2;
  text-align: center;
  padding: 16px 16px;
  text-decoration: none;
  font-size: 17px;
}
.Navigation a:hover {
  background-color: #ddd;
  color: black;
}
.Navigation a.active {
  background-color: #4CAF50;
  color: white;
} 
   
.sidebar {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #111;
  color: white;
  padding: 10px 15px;
  border: none;
}

.openbtn:hover {
  background-color: #444;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}


</style>