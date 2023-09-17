<!DOCTYPE html>

<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/styles.css" type="text/css">        <!-- Load CSS styles -->
		    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" /><!-- bootstrap core css -->
        <link href="index.css" rel="stylesheet">
		    <link href="../css/font-awesome.min.css" rel="stylesheet" /><!-- font awesome style -->

        <!-- Load external Javascript/JQuery scripts -->	
        <script src="../js/myjs.js"></script>
	</head>
  <body>
    
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
  
      <div id="Form1">
        <form action="add_to_list.php" method="POST">
        <div id="" style="position:absolute;left:150px;top:150px;width:358px;height:21px;z-index:1;">
        <span style="color:#000000;font-family:Arial;font-size:19px;">Create Batch/Installment Lists</span></div>

        <input type="text" id="listNumber" style="position:absolute;left:243px;top:200px;width:185px;height:36px;z-index:2;" name="listNumber" value="" spellcheck="false">
        <label for="" id="L" style="position:absolute;left:150px;top:200px;width:150px;height:24px;line-height:24px;z-index:3;">List #:</label>
        <input type="text" id="listName" style="position:absolute;left:243px;top:300px;width:185px;height:36px;z-index:4;" name="listName" value="" spellcheck="false">
        <label for="" id="" style="position:absolute;left:150px;top:300px;width:150px;height:24px;line-height:24px;z-index:5;">List Name:</label>
        <label for="" id="" style="position:absolute;left:150px;top:400px;width:150px;height:24px;line-height:24px;z-index:5;">Institution</label>
        <input type="text" id="institution" style="position:absolute;left:243px;top:400px;width:185px;height:36px;z-index:6;" name="institution" value="" spellcheck="false">

        <div id="wb" style="position:absolute;left:150px;top:480px;;width:401px;height:21px;z-index:9;">
        <span style="color:#000000;font-family:Arial;font-size:19px;">Proceed to Add Students to Installlment List.</span></div>
         <!-- Add a button to submit the form using JavaScript -->
         <input type="submit" style="position:absolute;left:150px;top:520px;width:185px;height:36px;z-index:6;"
         value="Create List">
        </form>
      </div>
 
 <!-- JavaScript to handle form submission -->
 <script>
    </script>


  </body>  

<script>

// Function to display filtered students in a modal (you can implement your modal)
function displayFilteredStudentsInModal(filteredStudents) {
    // Create and display a modal with the filtered students' information
    // You can use JavaScript and HTML/CSS to create the modal as you like
}

</script>
</html>