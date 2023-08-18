<html>
    <head>
        <title>Outpass System</title>
        <link rel="stylesheet" href="resetcs.css">
	<link rel="stylesheet" href="header.css">
	 <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
	<link rel="stylesheet" href="wardennav.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    </head>
    <body>
        <div class="header">
            <p>Online Outpass System</p>
        </div>
        <div id="user">
            <div class="navbar">
                <a href="warden.php"><i class="fa fa-fw fa-home"></i> Home</a>
                <a href="pending.php"><i class="fa fa-book"></i> Pending List</a>
                <a href="accept.php"><i class="fa fa-fw fa-envelope"></i> Accepted List</a>
                <a href="reject.php"><i class="fa fa-ban"></i> Rejected List</a>
                <a href="freset.php"  class="active"><i class="fa fa-fw fa-user"></i> Reset Password</a>
                <a href="logout.php" id="logout"><i class="fa fa-sign-in"></i>  Logout</a>
              </div>
              
              <?php
                session_start();
                if($_SESSION['empid']!='' && $_SESSION['login']!=false)
                {

                }
                else
                {
                    header("Location:home.php");
                }
                
                ?>
              <div class="resetpass">
                <h2>Reset Password</h2>
                <form action="" method="POST">
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
                            <td><b>New Password :</b></td>
                            <td><input type="password" name="npass2" required></td>
                        </tr>
                        <tr>
                            <td><b><input type="submit" name="sub" value="Update" id="btn1"></b></td>
                            <td><b><input type="reset" name="" value="Clear" id="btn2"></b></td>
                        </tr>
                    </table>
                </form>
                <?php
                            if(isset($_POST['sub']))
                            {
                                session_start();
                                $pass=$_POST['cpass'];
                                $newpass1=$_POST['npass1'];
                                $newpass2=$_POST['npass2'];
                                $id=$_SESSION['empid'];
                                $con=new mysqli("localhost","root","","outpass");
                                if(!$con)
                                {
                                    echo "There is  an error while connecting";
                                }
                                $que="SELECT password from warden_login where empid='$id'";
                                $data=mysqli_query($con,$que);
                                $total=mysqli_fetch_assoc($data);
                                if($total['password']==$pass)
                                {
                                    if($newpass1==$newpass2)
                                    {
                                        $upd="UPDATE warden_login set password='$newpass1' where empid='$id'";
                                       
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
              </div>
        </div>
    </body>
</html>
