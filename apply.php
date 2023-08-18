<html>
    <head>
        <title>Outpass System</title>
        <link rel="stylesheet" href="applycs.css">
	<link rel="stylesheet" href="header.css">
	<link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
	<link rel="stylesheet" href="navbar.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <script type = "text/javascript">
        	function validate() {
        		var fromdate=document.getElementById("from").value;
        		var todate=document.getElementById("to").value;
        		if(Date.parse(fromdate) > Date.parse(todate))
        		{
        			alert("Start date should be less than end date");
				return false;
			}
        		var letters = /^[A-Za-z]+$/;
        		var phoneRGEX = /^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/;
        		let gname = document.forms["myForm"]["gname"].value;
        		let gphone = document.forms["myForm"]["gnumber"].value;
        		let sphone = document.forms["myForm"]["snumber"].value;
        		console.log(gname, gphone, sphone);
        		let gn = false;
        		let gp = false;
        		let sp = false;
        		if(letters.test(gname) == false) {
        			gn = true;
        			
        		}
        		if(phoneRGEX.test(gphone) == false || gphone.length != 10) {
        			gp = true;
        		}
        		if(phoneRGEX.test(sphone) == false || sphone.length != 10) {
        			sp = true;
        		}
        		if(!gn && !gp && !sp){
        			return true;
        		}
        		if(gn){
        			if(gp){
        				if(sp){
        					alert('Enter GuardianName,Guardian PhoneNumber,Student PhoneNumber Correctly');
        				}
        				else{
        					alert('Enter GuardianName, Guardian PhoneNumber Correctly');
        				}
        			}
        			else{
        				alert('Enter GuardianName Correctly');
        			}
        		}
        		else if(gp){
				if(sp){
					alert('Enter Guardian PhoneNumber,Student PhoneNumber Correctly');
				} 
				else{
					alert('Enter Guardian PhoneNumber Correctly');
				}       		
        		}
        		else{
        			alert('Enter Student PhoneNumber Correctly');
        		}
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
                <a  href="student.php"><i class="fa fa-fw fa-home"></i> Home</a>
                <a class="active" href="apply.php"><i class="fa fa-fw fa-envelope"></i> Apply</a>
                <a href="check.php"><i class="fa fa-fw fa-search"></i> Check Status</a>
                <a href="sreset.php"><i class="fa fa-fw fa-user"></i> Reset Password</a>
                <a href="logout.php" id="logout"><i class="fa fa-sign-in"></i>  Logout</a>
              </div>
             
              <div class="register">
                  <?php
                  session_start();
                  if($_SESSION['id']=='')
                  {
                      header("Location:home.php");
                  }
                  ?>
                    <?php
                    if(isset($_POST['sub']))
                    {
                        session_start();
                        $id=$_SESSION['id'];
                        $guardianName=$_POST['gname'];
                        $guardianNumber=$_POST['gnumber'];
                        $studentNumber=$_POST['snumber'];
                        $fromDate=$_POST['fromdate'];
                        $toDate=$_POST['todate'];
                        $reason=$_POST['reason'];
                        
                        
                        $a=is_numeric($guardianNumber);
                        $b=is_numeric($studentNumber);
                        if($a!=1 or $b!=1 )
                        {
                            echo "<h3><font color = red><center>Registration Failed!!</center></font></h3>";
                        }
                        
                        
                       
                        else
                        {
                            
                            $con=new mysqli("localhost","root","","outpass");
                            if(!$con)
                            {
                                echo "there is a problem in connecting";
                            }
                            $ins="INSERT INTO `reg`(`id`, `gname`, `gnumber`, `snumber`, `fromdate`, `todate`, `reason`) VALUES ('$id','$guardianName',$guardianNumber,$studentNumber,'$fromDate','$toDate','$reason')";
                            $quer=mysqli_query($con,$ins);
                            if($quer){
                                echo "<h3><font color = green><center>Sucessfully registered</center></font></h3>";
                                
                            }
                        }
                        
                    }

                    ?>
                <h2>Application Form</h2>
                <form name="myForm" action="" onsubmit="return validate()" method="POST">
					
                    <table>
                        <tr>
                            <td><b>Guardian Name: </b></td>
                            <td><input type="text" name="gname" placeholder="Guardian Name" required></td>
                        </tr>
                        <tr>
                            <td><b>Guardian Ph.No.: </b></td>
                            <td><input type="phone" name="gnumber" placeholder="Guardian Ph.No."required></td>
                        </tr>
                        <tr>
                            <td><b>Student Ph.No.: </b></td>
                            <td><input type="phone" name="snumber" placeholder="Student Ph.No."required></td>
                        </tr>
                        <tr>
                            <td><b>From Date: </b></td>
                            <td><input type="date" name="fromdate"required></td>
                        </tr>
                        <tr>
                            <td><b>To Date: </b></td>
                            <td><input type="date" name="todate"required></td>
                        </tr>
                        <tr>
                            <td><b>Reason for Outpass: </b></td>
                        </tr>
                        <tr>
                            <td colspan="2"><textarea placeholder="Type here..." rows="5" cols="50" required name="reason"></textarea></td>
                        </tr>
                        <tr style="text-align: center;">
                            <td>
                                <input type="submit" value="Submit" name="sub" id="btn1" onclick="submitAlert()">
                            </td>
                            <td>
                                <input type="reset" value="Reset" name="" id="btn2">
                            </td>
                        </tr>
                    </table>
                </form>
	   </div>
        </div>
   </body>
</html>
