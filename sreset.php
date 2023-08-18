<html>
    <head>
        <title>Outpass System</title>
        <link rel="stylesheet" href="studentresetcs.css">
	<link rel="stylesheet" href="header.css">
	 <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
	<link rel="stylesheet" href="navbar.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <script type="text/javascript">
        	function validate(){
        		var paswd=  /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;
        		let pass1 = document.forms['myForm']['npass1'].value;
        		let pass2 = document.forms['myForm']['npass2'].value;
        		if(pass1 === pass2) {
        			if(!(pass1.match(paswd))) {
        				alert('Password contains 6 to 20 characters having at least one numeric digit, one uppercase and one lowercase letter');
        				return false;
        			}
        			return true;
        		}
        		alert('New Password and Confirm password are not matched!');
        		return false;
        		
        	}
        </script>
    </head>
    <body>
        <div class="header">
            <p>Online Outpass System</p>
        </div>
        <div id="user">
            <div class="navbar">
                <a href="student.php"><i class="fa fa-fw fa-home"></i> Home</a>
                <a href="apply.php"><i class="fa fa-fw fa-envelope"></i> Apply</a>
                <a href="check.php" ><i class="fa fa-fw fa-search"></i> Check Status</a>
                <a href="sreset.php"  class="active"><i class="fa fa-fw fa-user"></i> Reset Password</a>
                <a href="logout.php" id="logout"><i class="fa fa-sign-in"></i>  Logout</a>
              </div>
              <div class="resetpass">
                <h2>Reset Password</h2>
                <?php
                session_start();
                if($_SESSION['id']!='' && $_SESSION['login']!=false)
                {

                }
                else
                {
                    header("Location:home.php");
                }
                ?>
                <form name="myForm" action="" onsubmit="return validate()" method="POST">
                    <table>
                        <tr>
                            <td><b>Current Password :</b></td>
                            <td><input type="password" name="cpass" required></td>
                        </tr>
                        <tr>
                            <td><b>New Password :</b></td>
                            <td><input type="password" name="npass1" required></td>
                        </tr>
                        <tr>
                            <td><b>Confirm New Password :</b></td>
                            <td><input type="password" name="npass2" required></td>
                        </tr>
                        <tr>
                            <td><b><input type="submit" name="sub" value="Update" id="btn1"></b></td>
                            <td><b><input type="reset" name="" value="Clear" id="btn2"></b></td>
                        </tr>
                        
                    </table>
                    <?php
                            if(isset($_POST['sub']))
                            {
                                session_start();
                                $pass=$_POST['cpass'];
                                $newpass1=$_POST['npass1'];
                                $newpass2=$_POST['npass2'];
                                $id=$_SESSION['id'];
                                $con=new mysqli("localhost","root","","outpass");
                                if(!$con)
                                {
                                    echo "There is  an error while connecting";
                                }
                                $que="SELECT password from student_login where id='$id'";
                                $data=mysqli_query($con,$que);
                                $total=mysqli_fetch_assoc($data);
                                if($total['password']==$pass)
                                {
                                    if($newpass1==$newpass2)
                                    {
                                        $upd="UPDATE student_login set password='$newpass1' where id='$id'";
                                       
                                        $update=mysqli_query($con,$upd);
                                        echo "<center><strong><font color=green>Successfully Updated</font></strong></center>";
                                    }
                                    else
                                    echo "<center><strong><font color=red>New Passwords does not match</font></strong></center>";
                                }
                                else
                                {
                                    echo "<center><strong><font color=red>Invalid Current Password</font></strong></center>	";
                                }
                            }
                        ?>
                </form>
              </div>
        </div>
    </body>
</html>
