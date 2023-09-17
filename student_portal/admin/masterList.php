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
    $sql = "SELECT * FROM student ;";
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
			<a href="#default" class="logo">Student Master List</a>
			<div class="header-right">
			  <a class="" href="adminIndex.html">Home</a>
			  <a href="#contact">Contact</a>
			  <a href="#about">About</a>
			</div>
		  </div>

<!-- student Master List Table .-->
<!-- oo-->
	<table style="border-collapse: collapse; width: 90%; border: 1px solid black;" id="status_Table" >
    <thead>
        <tr>
        <td class="cell0" style="border: 1px solid black;"><p style="font-size:10px;line-height:16px;"><span style="font-size:16px;line-height:20px;font-weight:bold;">Student ID</span></p></td>
        <td class="cell1" style="border: 1px solid black;"><p style="font-size:10px;line-height:40px;"><span style="font-size:16px;line-height:21px;font-weight:bold;">Given Name</span></p></td>
        <td class="cell2" style="border: 1px solid black;"><p style="font-size:10px;line-height:40px;"><span style="font-size:16px;line-height:21px;font-weight:bold;">Surname</span></p></td>
        <td class="cell3" style="border: 1px solid black;"><p style="font-size:10px;line-height:40px;"><span style="font-size:16px;line-height:21px;font-weight:bold;"> Institution</span></p></td>
        <td class="cell4" style="border: 1px solid black;"><p style="font-size:10px;line-height:40px;"><span style="font-size:16px;line-height:21px;font-weight:bold;"> Year</span></p></td>
        <td class="cell4" style="border: 1px solid black;"><p style="font-size:10px;line-height:16px;"><span style="font-size:16px;line-height:21px;font-weight:bold;"> Postal Address</span></p></td>
        <td class="cell4" style="border: 1px solid black;"><p style="font-size:10px;line-height:16px;"><span style="font-size:16px;line-height:21px;font-weight:bold;"> Email Address</span></p></td>
        <td class="cell4" style="border: 1px solid black;"><p style="font-size:10px;line-height:20px; width: 200px;">
        <span style="font-size:16px;line-height:20px;font-weight:bold;">Application 1 Details</span></p></td>
        </tr>
    </thead>
    <tbody> 
               
<!-- autogenerate table rows with data from mysql student table .-->
        <?php 
        foreach ($data as $row): ?>
        <tr>
            <td style="border: 1px solid black;line-height:60px">
            <?php echo $row['studentId']; ?></td>

            <td style="border: 1px solid black;"><?php echo $row['firstName']; ?></td>
            <td style="border: 1px solid black;"><?php echo $row['lastName']; ?></td>
            <td style="border: 1px solid black;"><?php echo $row['institution']; ?></td>
            <td style="border: 1px solid black;"><?php echo $row['tuition']; ?></td>
            <td style="border: 1px solid black;"><?php echo $row['address']; ?></td>
            <td style="border: 1px solid black;"><?php echo $row['email']; ?>]
            </td>
            <td style="border: 1px solid black;"><a href="#" onclick="viewApplication(this)" data-studentId="<? echo $row['studentId']; ?>">
            Review Application Forms</a><br >
            <button onclick="approveStudent(this)" data-studentId="<?php echo $row['studentId']; ?>">
            Approve
            </button>

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

    function viewApplication(element){
        
        event.preventDefault();  // Prevent default link behavior
        // Get the modal
        var modal = document.getElementById("myModal");
        // Get the modal

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        modal.style.display = "block";
    }


    // Function to handle "Approve" button click
    function approveStudent(button) {
    var studentId = button.getAttribute('data-studentId');

    // AJAX request to update the status
    // Replace 'updateStatus.php' with your actual server-side script
    fetch('update_status.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'studentId=' + studentId, // Send studentId to the server
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Student approved successfully.');
                // Optionally, you can update the status in the table without refreshing the page.
                // For example, change the status cell's content to "Approved" here.
            } else {
                alert('Error approving student.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
}


</script>


<!-- HTML for the modal -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <a href='#'>REVIEW APPLICATION 1</a><br>
        <a href='#'>ACCEPTANCE LETTER</a><br>
        <a href='#'>REFERENCE</a><br>
        <p>APP 1 STATUS:</p><br>
        <div id="statusContent"> </div>
    </div>

</div></body>

</html>