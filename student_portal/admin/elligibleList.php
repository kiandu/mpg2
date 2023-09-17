<?php
        // Establish a database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "madgov";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch data from the SQL table
    $sql = "SELECT student.*, app1_form.status
    FROM student
    INNER JOIN app1_form ON student.studentId = app1_form.studentId
    WHERE app1_form.status = 'Approved';";
    // INNER JOIN appform_1 on student.studentId=appform_1.studentId;";
    $result = $conn->query($sql);
    $data = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

?>
<!DOCTYPE html>

<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Load CSS styles -->
        <link rel="stylesheet" href="../css/styles.css" type="text/css">
		<link rel="stylesheet" href="../css/modals.css" type="text/css">


        <!-- Load external Javascript/JQuery scripts -->	

        <script src="../js/jquery.mobile-1.4.5.js"></script>
        <script src="../js/jquery.mobile-1.4.5.min.js"></script>
        <script src="../js/jquery-2.1.1.js"></script>
        <script src="../js/myjs.js"></script>
	</head>

	<body>
<!-- Header.-->
	<div class="header">
		<a class="imgcontainer">
			<img src="assets/icons/health.jpg" alt="Avatar" class="avatar">
		</a>
			<a href="#default" class="logo">Student Eligible List</a>
			<div class="header-right">
			  <a class="" href="#home">Home</a>
			  <a href="#contact">Contact</a>
			  <a href="#about">About</a>
			</div>
		  </div>

<!-- student Master List Table .-->
<!-- oo-->
	<table style="border-collapse: collapse; width: 80%; border: 1px solid black;" id="status_Table" >
    <thead>
        <tr>
        <td class="cell0" style="border: 1px solid black;"><p style="font-size:10px;line-height:16px;"><span style="font-size:16px;line-height:20px;font-weight:bold;">Student ID</span></p></td>
        <td class="cell1" style="border: 1px solid black;"><p style="font-size:10px;line-height:16px;"><span style="font-size:16px;line-height:21px;font-weight:bold;">Given Name</span></p></td>
        <td class="cell2" style="border: 1px solid black;"><p style="font-size:10px;line-height:16px;"><span style="font-size:16px;line-height:21px;font-weight:bold;">Surname</span></p></td>
        <td class="cell3" style="border: 1px solid black;"><p style="font-size:10px;line-height:16px;"><span style="font-size:16px;line-height:21px;font-weight:bold;"> Institution</span></p></td>
        <td class="cell4" style="border: 1px solid black;"><p style="font-size:10px;line-height:16px;"><span style="font-size:16px;line-height:21px;font-weight:bold;"> Year</span></p></td>
        <td class="cell4" style="border: 1px solid black;"><p style="font-size:10px;line-height:20px; width: 200px;"><span style="font-size:16px;line-height:20px;font-weight:bold;">Application Details</span></p></td>

        </tr>
    </thead>
    <tbody> 
               
<!-- autogenerate table rows with data from mysql student table .-->
        <?php 
        foreach ($data as $row): ?>
        <tr>
            <td data-studentId="<?php echo $row['studentId']; ?>" style="border: 1px solid black;">
            <?php echo $row['studentId']; ?></td>

            <td style="border: 1px solid black;"><?php echo $row['firstName']; ?></td>
            <td style="border: 1px solid black;"><?php echo $row['lastName']; ?></td>
            <td style="border: 1px solid black;"><?php echo $row['institution']; ?></td>
            <td style="border: 1px solid black;"><?php echo $row['tuition']; ?></td>
            <td style="border: 1px solid black; font-weight:bold;"><?php echo $row['status']; ?>
               
             </td>
        </tr>
    <?php endforeach; $conn->close();?>      
    </tbody>

	</table>
<!--table ends!!.-->

<input type="button" id="Button1" name="" value="Eligible List" onclick="navigateToPage('elligibleList.php')"
            style="position:absolute;right:20px;top:400px;width:161px;height:43px;z-index:54;">

<script>
    function navigateToPage(pageURL) {
      // Use window.location to navigate to the specified page
      window.location.href = pageURL;
    }

    function viewApplication(link){
        event.preventDefault();  // Prevent default link behavior


        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        modal.style.display = "block";
        

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
        modal.style.display = "none";
        }

        // Store the studentId in a variable accessible to the approveStudent() function
        approvedStudentId = studentId;
        }
    
    function approve(){

    }


</script>


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Application Form Details Here!!!..</p>
    <a href="#">Form 1</a> <br>
    <a href="#">Acceptance Letter</a><br>
    <a href="#">Letter of Interest</a><br>
    <a href="#">Councilor Confirmation</a>
    <p>Application status: <p style="font-weight:bold;" id="modal-status"> </p></p>
    <button onclick="approveStudent()">Approve</button>
  </div>

</div>
</body>

</html>