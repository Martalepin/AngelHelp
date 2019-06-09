<?php
	/* Attempt MySQL server connection. Assuming you are running MySQL
	server with default setting (user 'root' with no password) */
	$link = mysqli_connect("localhost","root", " ","help");
	
	 
	// Check connection
	if($link === false){
	    die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	 
	// Attempt select query execution
	$sql = "SELECT * FROM donation";
	if($result = mysqli_query($link, $sql)){
	    if(mysqli_num_rows($result) > 0){
	        echo "<table style='text-align:right'>";
	            echo "<tr>";
					echo "<th style='padding:20px; text-align:center'>Date</th>";
					echo "<th style='padding:20px; text-align:center'>location</th>";
	                echo "<th style='padding:20px; text-align:center'>firstname</th>";
	                echo "<th style='padding:20px; text-align:center'>lastname</th>";
					echo "<th style='padding:20px; text-align:center'>item</th>";
	                
	            echo "</tr>";
	        while($row = mysqli_fetch_array($result)){
	            echo "<tr>";
					echo "<td style='padding:20px' >" . $row['date'] . "</td>";
					echo "<td>" . $row['location'] . "</td>";
	                echo "<td>" . $row['firstname'] . "</td>";
	                echo "<td>" . $row['lastname']."</td>";
					echo "<td>".$row['item']."</td>";
	            echo "</tr>";
	        }
	        echo "</table>";
	     
		 	// Close result set
			mysqli_free_result($result);
	    } else{
	        echo "No records matching your query were found.";
	    }
	} else{
	    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	
	// Close connection
	mysqli_close($link);
	?>
