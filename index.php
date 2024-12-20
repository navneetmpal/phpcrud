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
</style>
</head>
<body>
	<div class="navbar">
		<ul>
		  <li><h2>List of students</h2></li>
		  <li><a href="add-student.php">Click here for add new student</a></li>
		</ul>
	</div>
	<table border="1px" cellpadding="10" cellspacing="0" style="margin: auto;">
	  <tr>
	    <th>Name</th>
	    <th>Email</th>
	    <th>Phone</th>
	    <th>College Name</th>
	    <th>Total</th>
	    <th>Percentage</th>
	    <th>Grade</th>
	    <th>Action</th>
	  </tr>
	  <?php
        $query="SELECT * FROM student";
        $data=mysqli_query($con,$query);
        $result=mysqli_num_rows($data);
        if($result)
        {
            while($row=mysqli_fetch_array($data))
            {
               ?>
               <tr>
                    <td>
                        <?php echo $row['name'];?>
                    </td>
                    <td>
                        <?php echo $row['email'];?>
                    </td>
                    <td>
                        <?php echo $row['phone'];?>
                    </td>
                    <td>
                        <?php echo $row['collage_name'];?>
                    </td>
                    <td>
                        <?php echo $row['total'];?>
                    </td>
                    <td>
                        <?php echo $row['percentage'];?>
                    </td>
                    <td>
                        <?php echo $row['grade'];?>
                    </td>
                    <td>
                        <a onclick="return confirm('Sure??')" href="delete.php?id=<?php echo $row['id'];?>">Delete</a>
                    </td>
               </tr>
               <?php
            }
        }
        else
        {
            ?>
            <tr>
                <td>no Record found</td>
            </tr>
            <?php
        }
    ?>
	</table>
</body>
</html>