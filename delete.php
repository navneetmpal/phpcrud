<?php
include 'controller.php';
$id=$_GET['id'];
$query="DELETE FROM student WHERE id='$id'";
$data=mysqli_query($con,$query);
if($data)
{
    ?>
    <script type="text/javascript">
        alert("Deleted")
        window.open("http://localhost/navneet_pratical/index.php", "_self");
    </script>
        <?php
}
else
{
    ?>
    <script type="text/javascript">
        alert("NOT Deleted")
    </script>
    <?php
}
?>