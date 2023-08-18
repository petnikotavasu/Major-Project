<?php
session_start();
$con=new mysqli("localhost","root","","outpass");
if(!$con)
{
	echo "There is an error while connecting";
}
$outpassId=$_GET['oi'];
$query="UPDATE reg SET Status='Approved' WHERE outpassId=$outpassId";
$data=mysqli_query($con,$query);
if($data)
{
    echo "<script>alert('Approved')</script>";
    ?>
    <META HTTP-EQUIV="Refresh" CONTENT="0; URL=/Out%20Pass%20System/pending.php">
    <?php
}

?>
