<html>
    <head>
        <title>Outpass System</title>
        <link rel="stylesheet" href="header.css">
	<link rel="stylesheet" href="homecs.css">
	<link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    </head>
    <script language="JavaScript">javascript:window.history.forward(1);</script>
    <body>
        <div class="header">
            <p>Online Outpass System</p>
        </div>
        <div class="hero">
            <div class="form-box">
                <div class="button-box">
                    <div id="btn"></div>
                    <button type="button" class="toggle-btn" onclick="student()"><strong>Student</strong></button>
                    <button type="button" class="toggle-btn" onclick="warden()"><strong>Warden</strong></button>
                </div>
                <form  id="student" class="input-group"action ="" method ="POST">
                    <input type="text" class="input-field" placeholder="Student Id" required name="user">
                    <input type="password" class="input-field" placeholder="Enter Password" id="id_password2" required name="password">
                    <i class="far fa-eye" id="togglePassword2" style="margin-left: -30px; cursor: pointer;"></i>
                    <button type="submit" class="submit-btn" name="Submit"><strong>Log In</strong></button>
                </form>
                

                <form id="warden" class="input-group" method="POST">
                    <input type="text" class="input-field" placeholder="Warden Id" required name='user'>
                    <input type="password" class="input-field" placeholder="Enter Password" id="id_password1" required name='password'>
                    <i class="far fa-eye" id="togglePassword1" style="margin-left: -30px; cursor: pointer;"></i>
                    <button type="submit" class="submit-btn" name='sub'><strong>Log In</strong></button>
                </form>
<!-- php for student validation-->
        <?php
    session_start();
    $_SESSION['id']='';
    $_SESSION['login']=false;
    if(isset($_POST['Submit'])){
    $user=$_POST['user'];
    $password=$_POST['password']; 
    $con=new mysqli("localhost","root","","outpass");
  
                if(!$con)
                {
                    echo "There is an error while connecting";
                }
                
                $query="SELECT * FROM student_login where id='$user' and password='$password'";
                $data=mysqli_query($con,$query);
                $total=mysqli_num_rows($data);
                $row=mysqli_fetch_assoc($data);
                
                if($total==1)
                {
                       $_SESSION['login']=true;
                        $_SESSION['id']=$user;
                        
                        
                       
                        
                        echo "<font color='green'> Login Successfull";
                        header("location:student.php");
                }
                else
                         echo "<h3><center><font color='red'> Login Failed</center><h3>";
            }
?>
<!-- php for warden validation-->
<?php
    if(isset($_POST['sub'])){
        session_start();
        $_SESSION['empid']='';
        $_SESSION['login']=false;
        $user=$_POST['user'];
         $password=$_POST['password']; 
         $con=new mysqli("localhost","root","","outpass");

                if(!$con)
                {
                    echo "There is an error while connecting";
                }
                
                $query="SELECT * FROM warden_login where empid='$user' and password='$password'";
                $data=mysqli_query($con,$query);
                $total=mysqli_num_rows($data);
                if($total==1)
                {
                       $_SESSION['login']=true;
                        $_SESSION['empid']=$user;
                        echo "<font color='green'> Login Successfull";
                        if(isset($_SESSION['id']))
                        {
                        header("location:warden.php");
                        }
                }
                else
                         echo "<h3><center><font color='red'> Login Failed</center><h3>";
            }
?>
                </div>
                <div><a href="team.html" id="team" style="color:white; font-weight;bold;">Development Team</a></div>
                
        </div>
        
        <script>
            var x=document.getElementById("student");
            var y=document.getElementById("warden");
            var z=document.getElementById("btn");
            x.style.left="50px";
            y.style.left="450px";
            z.style.left="0px";
            function warden()
            {
                x.style.left="-400px";
                y.style.left="50px";
                z.style.left="110px";
            }
	    function student()
            {
                x.style.left="50px";
                y.style.left="450px";
                z.style.left="0px";
            }
            const togglePassword2 = document.querySelector('#togglePassword2');
            const password2 = document.querySelector('#id_password2');
	    togglePassword2.addEventListener('click', function (e) {
            const type2 = password2.getAttribute('type') === 'password' ? 'text' : 'password';
            password2.setAttribute('type', type2);
            this.classList.toggle('fa-eye-slash');
            });
            const togglePassword1 = document.querySelector('#togglePassword1');
            const password1 = document.querySelector('#id_password1');
 	    togglePassword1.addEventListener('click', function (e) {
            const type1 = password1.getAttribute('type') === 'password' ? 'text' : 'password';
            password1.setAttribute('type', type1);
            this.classList.toggle('fa-eye-slash');
            });
        </script>
    </body>
</html>
