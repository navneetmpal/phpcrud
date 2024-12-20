<?php
	include 'controller.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<style>
	ul {
	  	list-style-type: none;
	  	padding: 10px;
		display: flex;
  		justify-content: center;

	}

	li {
	  display: inline;
	  margin: 10px;
	}
	li a {
	  color: black;
	  text-decoration: none;
	  padding-bottom: 0;
	}
	.form{
		justify-content: center;
	}
</style>
</head>
<body>
	<div class="navbar">
		<ul>
		  <li><h2>Add student's data</h2></li>
		  <li><a href="index.php">Back</a></li>
		</ul>
	</div>
	<form method="POST" enctype="multipart/form-data">
		<input type="file" name="img" placeholder="Enter student's photo" accept="image/*" required><br><br>
        <input type="text" name="name" placeholder="Enter student's name" pattern="[A-Za-z]+"><br><br>
        <input type="email" name="email" placeholder="Enter student's email"><br><br>
        <input type="number" name="number" placeholder="Enter phone number" pattern="[0-9]{10,10}"><br><br>
        <input type="text" name="clgname" placeholder="Enter collage name" pattern="[A-Za-z]+"><br><br>
        <input type="number" name="enrollment " placeholder="Enter enrollment number" pattern="[0-9]{6,6}"><br><br>
        <input type="text" name="sub1" placeholder="Enter first subject name" pattern="[A-Za-z]+"><br>
        <input type="number" name="mark1" placeholder="Enter first subject marks"><br><br>
        <input type="text" name="sub2" placeholder="Enter secound subject name" pattern="[A-Za-z]+"><br>
        <input type="number" name="mark2" placeholder="Enter secound subject marks"><br><br>
        <input type="text" name="sub3" placeholder="Enter third subject name" pattern="[A-Za-z]+"><br>
        <input type="number" name="mark3" placeholder="Enter third subject marks"><br><br>
        <input type="text" name="sub4" placeholder="Enter fourth subject name" pattern="[A-Za-z]+"><br>
        <input type="number" name="mark4" placeholder="Enter fourth subject marks"><br><br>
        <input type="text" name="sub5" placeholder="Enter fifth subject name" pattern="[A-Za-z]+"><br>
        <input type="number" name="mark5" placeholder="Enter fifth subject marks"><br><br>

        <button type="submit" name="save_btn" value="Save">Save</button>
    </form>
		
    <?php
        if(isset($_POST['save_btn']))
        {

        	$image = $_FILES['img']['name'];
	        $target = "uploads/".basename($image);

	        move_uploaded_file($_FILES['img']['tmp_name'], $target);

            $name=$_POST['name'];
            $email=$_POST['email'];
            $pnumber=$_POST['number'];
            $clgname=$_POST['clgname'];
            $enrollnumber=$_POST['enrollment'];
            $sub1=$_POST['sub1'];
            $mark1=(int)$_POST['mark1'];
            $sub2=$_POST['sub2'];
            $mark2=(int)$_POST['mark2'];
            $sub3=$_POST['sub3'];
            $mark3=(int)$_POST['mark3'];
            $sub4=$_POST['sub4'];
            $mark4=(int)$_POST['mark4'];
            $sub5=$_POST['sub5'];
            $mark5=(int)$_POST['mark5'];

            $total = $mark1+$mark2+$mark3+$mark4+$mark5;
            $percentage = ($total/500)*100;
            if ($percentage > 90) {
	            $grade = 'A';
	        } elseif ($percentage > 80) {
	            $grade = 'B';
	        } elseif ($percentage > 70) {
	            $grade = 'C';
	        } elseif ($percentage > 60) {
	            $grade = 'D';
	        } elseif ($percentage > 50) {
	            $grade = 'E';
	        } else {
	            $grade = 'F';
	        }

            
            $query="INSERT INTO student (name,photo,email,phone,collage_name,enrollment_number,total,percentage,grade) VALUES('$name', '$target', '$email','$pnumber', '$clgname', '$enrollnumber', '$total', '$percentage',  '$grade')";

            $student_data=mysqli_query($con,$query);
            $student_id = mysqli_insert_id($con);

            $query="INSERT INTO subject (student_id,sub1,sub2,sub3,sub4,sub5) VALUES('$student_id','$sub1','$sub2', '$sub3', '$sub4', '$sub5')";

            $subject_data=mysqli_query($con,$query);
            if($student_data && $subject_data){
                ?>
                <script type="text/javascript">
                    alert("Data saved");
                </script>
                <?php
            }
            else
            {
                ?>
                <script type="text/javascript">
                   alert("again");
                </script>
                <?php
            }
        }
    ?>
</body>
</html>