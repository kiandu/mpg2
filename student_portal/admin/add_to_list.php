<?php
	//start a session
	session_start();
	
	//connection string
	$server = "localhost";
	$dbname = "madgov";
	$username = "root";
	$password = "";


	//create connection to the database on the server
	$conn = mysqli_connect($server,$username,$password,$dbname);
	
	// Check connection
	if (mysqli_connect_errno()){
		die ("Failed to connect to MySQL: " . mysqli_connect_error());
	}

        // Retrieve the values from the POST request
        $listNumber = $_POST['listNumber'];
        $listName = $_POST['listName'];
        $institution = $_POST['institution'];
        
        $form1SQL = "INSERT INTO installment_list VALUES ('$listNumber', '$listName', '$institution');";
        $retrieveSQL = "SELECT student.*, app1_form.status
        FROM student
        INNER JOIN app1_form ON student.studentId = app1_form.studentId
        WHERE app1_form.status = 'Approved';";  

        $data = array();
        
            //execute the statement, if not successful, display the error message
            if ($conn->query($form1SQL,))
            {
                    $result = $conn->query($retrieveSQL);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $data[] = $row;
                        }
                    }
                    else
                    {
                        die("Error: " . mysqli_error($conn) . " <br /> <a href='addStudent.html'> Try again </a>");
                        
                    }
            }
            else
            {
                die("Error: " . mysqli_error($conn) . " <br /> <a href='addStudent.html'> Try again </a>");
                
            }
                           
        //close connection
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>Untitled Page</title>
        <meta name="generator" content="WYSIWYG Web Builder 18 - http://www.wysiwygwebbuilder.com">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
        <link href="css/digitalagency.css" rel="stylesheet">
        <link href="css/page2.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/styles.css" type="text/css">        <!-- Load CSS styles -->
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" /><!-- bootstrap core css -->
	     <link href="../css/responsive.css" rel="stylesheet" /> <!-- responsive style -->
        <link href="../css/style.css" rel="stylesheet" />  


    </head>
    <!-- form with two textboxes -->
		<div class="hero_area">
      <!-- header section strats -->
      <header class="header_section">
          <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="index.html">
            <span>
              <img src="../assets/icons/madgov.jpg" alt="Avatar" class="avatar">
            </span>
            </a>
            <a class="navbar-brand">
            <span >
            Portal Admin & Management  <br>
              </span>
            </a>
            
      
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
            </button>
      
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ml-auto">
              <li class="nav-item active">
              <a class="nav-link" href="index.html">Home</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="#"> About</a>
              </li>
              <li class="nav-item">icuuuu
              </li>
              <li class="nav-item">
              </li>
      
              <form class="form-inline">
              <button class="btn   nav_search-btn" type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
              </form>
            </ul>
            </div>
          </nav>
          </div>
      </header>
      <!-- MMAIN STYLES -->
      <style>
                /* HEADER */
          
          /* Float the link section to the right */
          body {font-family: Arial, Helvetica, sans-serif;
                  background-image: linear-gradient(to right, rgba(219, 240, 34, 0.9), rgba(238, 95, 39, 0.9));
          
                  }
          #Form1 {border: 3px solid #f1f1f1;
                  width:80%;
                  margin: auto;
                  top:200px;
                height:500px;
              }
              
                                
                
          .imgcontainer {
                  text-align: center;
                  margin: 15px 0 5px 0;
                  height: 50px;
                }
                
          img.avatar {
                  width: 80px;
                  height: 80px;
                  border-radius: 50%;
          }
                
          .container {
                  padding: 16px;
          }
                
          span.psw {
                  float: right;
                  padding-top: 16px;
          }
          
          
                /* Add media queries for responsiveness - when the screen is 500px wide or less, stack the links on top of each other */
          
          @media only screen and (max-width: 500px) {
            .header {
            overflow: hidden;
            background-color: #f1f1f1;
            padding: 3px 3px;
          }
          
          .header a {
            float: none;
            display:table-cell;
            text-align: left;
            height: 5px;
            font-size: 12px;
          }
          /* Style the logo link (notice that we set the same value of line-height and font-size to prevent the header to increase when the font gets bigger */
          
          .header a.logo {
            font-size: 15px;
            font-weight: bold;
            margin-left:40%;
          }
          img.avatar {
                  width: 40px;
                  height: 40px;
                  border-radius: 40%;
                }
          .header-right {
            float: none;
          }
          
          #Form1 {border: 3px solid #f1f1f1;
            width:98%;
            margin: auto;}
          /* Change styles for span and cancel button on extra small screens */
            span.psw {
             display: block;
             float: none;
            }
            .cancelbtn {
             width: 100%;
            }
          
            .container {
            padding: 16px;
            height: 50%;
            }
          
          }
          /* Add media queries for responsiveness - when the screen is 500px wide or less, stack the links on top of each other */
          
      </style>
          
  
    </div>
      <!-- end header section -->
  

    <body>
        <h2>Add Students to Installment List</h2><br><br>
        <p>List Number: <?php echo $listNumber; ?></p>
        <p>List Name: <?php echo $listName; ?></p>
        <p>Institution: <?php echo $institution; ?></p>

        <!-- Here, you can use the $institution value to filter and display students -->
        <table id="Table1">
                <thead>
                    <tr>
                    <td class="cell0" style="border: 1px solid black;"><p style="font-size:10px;line-height:16px;"><span style="font-size:16px;line-height:20px;font-weight:bold;">Student ID</span></p></td>
                    <td class="cell1" style="border: 1px solid black;"><p style="font-size:10px;line-height:40px;"><span style="font-size:16px;line-height:21px;font-weight:bold;">Given Name</span></p></td>
                    <td class="cell2" style="border: 1px solid black;"><p style="font-size:10px;line-height:40px;"><span style="font-size:16px;line-height:21px;font-weight:bold;">Surname</span></p></td>
                    <td class="cell3" style="border: 1px solid black;"><p style="font-size:10px;line-height:40px;"><span style="font-size:16px;line-height:21px;font-weight:bold;"> Institution</span></p></td>
                    <td class="cell3" style="border: 1px solid black;"><p style="font-size:10px;line-height:40px;"><span style="font-size:16px;line-height:21px;font-weight:bold;"> Add to List</span></p></td>

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
                                <td style="border: 1px solid black;">
                                <button onclick="addStudentt(this)" data-studentId="<?php echo $row['studentId']; ?>">
                                Add Student
                                </button><br >           
                                </td>
                    
                            </tr>
                        <?php endforeach; $conn->close();?>      
                </tbody>
                    
        </table>

    </body>



</html>