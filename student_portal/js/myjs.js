$(document).ready(function() {
	var span=document.getElementsByClassName("close");
	var modal=document.getElementById("myModal");
	var votePress=document.getElementsByClassName("votePress");
	var voteFemaleVice=document.getElementsByClassName("voteFemalePress");
	var voteMaleVice=document.getElementsByClassName("voteMalePress");
	var cardDisplay=document.getElementsByClassName("candidateCardDisp");
	var votePref;

	$(modal).hide();

// Add event listener to capture user's selection											
// Vote President button clicks
	$(votePress).click(function() {

		// Get the clicked button's id
		votePref = $(this).attr("id");

		    // Make AJAX request to get candidate information
			$.ajax({
				url: "../php/fetchPress.php",
				dataType: "json",
				success: function(data) {

					// Loop through candidates and display information in modal cards accordingly!!
					$(cardDisplay).each(function(index) {
						var candidate = data[index];
						var candidateBox =candidate["boxNumber"]; 
						var candidateInfo = "<p>"+"Box "+ candidate["boxNumber"]+": "+ candidate["candidateName"]+ "</p>";
						$(this).html(candidateInfo);

						 // Set the same values in the data-content attribute
						 $(this).attr('data-boxNumber', candidateBox);
						 $(this).attr('data-candidateInfo', candidateInfo);

						$(modal).show();
				});
			}			
			});
			//AJAX loop Ends Here!



	});

// Vote Female Vice President button clicks
$(voteFemaleVice).click(function() {

	// Get the clicked button's id
	votePref = $(this).attr("id");

		// Make AJAX request to get candidate information
		$.ajax({
			url: "../php/fetchFmVice.php",
			dataType: "json",
			success: function(data) {

				// Loop through candidates and display information in modal cards accordingly!!
				$(cardDisplay).each(function(index) {
					var candidate = data[index];
					var candidateBox =candidate["boxNumber"]; 
					var candidateInfo = "<p>"+"Box "+ candidate["boxNumber"]+": "+ candidate["candidateName"]+ "</p>";
					$(this).html(candidateInfo);

					 // Set the same values in the data-content attribute
					 $(this).attr('data-boxNumber', candidateBox);
					 $(this).attr('data-candidateInfo', candidateInfo);

					$(modal).show();
			});
		}			
		});
		//AJAX loop Ends Here!



});

// Vote Male President button clicks
$(voteMaleVice).click(function() {

	// Get the clicked button's id
	votePref = $(this).attr("id");

		// Make AJAX request to get candidate information
		$.ajax({
			url: "../php/fetchMaleVice.php",
			dataType: "json",
			success: function(data) {

				// Loop through candidates and display information in modal cards accordingly!!
				$(cardDisplay).each(function(index) {
					var candidate = data[index];
					var candidateBox =candidate["boxNumber"]; 
					var candidateInfo = "<p>"+"Box "+ candidate["boxNumber"]+": "+ candidate["candidateName"]+ "</p>";
					$(this).html(candidateInfo);

					 // Set the same values in the data-content attribute
					 $(this).attr('data-boxNumber', candidateBox);
					 $(this).attr('data-candidateInfo', candidateInfo);

					$(modal).show();
			});
		}			
		});
		//AJAX loop Ends Here!



});
					// Add event listener to capture user's selection											
						// Button click function
						$(".button").click(function() {

					
							var cardDisplay = $(this).siblings(".candidateCardDisp");
							var dataContent = cardDisplay.attr("data-candidateInfo");
							var selectedBoxNumber = cardDisplay.attr("data-boxNumber");
	
							if(votePref=="vote1"){
							
							//Box number Prefered for 1st choice
							// Pass the dataContent value to Candidate1 element in the President.html
							$("#selectedCandidate1").html(dataContent);

							 // Pass the selectedBoxNumber value to the PHP script
							$.ajax({
								url: 'http://localhost/dwuPol/php/submitVotes.php',
								method: "POST",
								contenType: "application/x-www-form-urlencoded",
								data: { boxNumber1: selectedBoxNumber },
								success: function(response) {
									console.log("SUCCESS FUNCTION WORKING!");
									console.log(selectedBoxNumber);
								console.log(response);
								},
								error: function(xhr, status, error) {
								console.log(error);
								}
							});
							$(modal).hide();
	
							}
							 else if(votePref=="vote2"){
							// Pass the dataContent value to Candidate2 element
								$("#selectedCandidate2").html(dataContent);
							 // Pass the selectedBoxNumber value to the PHP script
							 $.ajax({
								url: 'http://localhost/dwuPol/php/submitVotes.php',
								method: "POST",
								contenType: "application/x-www-form-urlencoded",
								data: { boxNumber2: selectedBoxNumber },
								success: function(response) {
									console.log("SUCCESS FUNCTION WORKING!");
									console.log(selectedBoxNumber);
								console.log(response);
								},
								error: function(xhr, status, error) {
								console.log(error);
								}
							});
								
								$(modal).hide();
	
							}
	
							else if(votePref=="vote3"){
							// Pass the dataContent value to Candidate3 element
								$("#selectedCandidate3").html(dataContent);

								 // Pass the selectedBoxNumber value to the PHP script
								 $.ajax({
									url: 'http://localhost/dwuPol/php/submitVotes.php',
									method: "POST",
									contenType: "application/x-www-form-urlencoded",
									data: { boxNumber3: selectedBoxNumber },
									success: function(response) {
										console.log("SUCCESS FUNCTION WORKING!");
										console.log(selectedBoxNumber);
									console.log(response);
									},
									error: function(xhr, status, error) {
									console.log(error);
									}
								});
								$(modal).hide();
							}
	
							
					});

			$(span).click(function(){
			$(modal).hide();
			});
			
//Submit Votes and update count in sql table
$(span).click(function(){
	$(modal).hide();
	});




});

//Submit Votes and update count in sql table


