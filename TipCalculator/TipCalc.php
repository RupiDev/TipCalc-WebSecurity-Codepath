<html>
<head>
	<title>Tip Calculator Pre-Work Codepath</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<meta charset = "utf-8">
	<meta name = "description" content = "Codepath Pre Work">
	<meta name = "author" content = "Rupin Bhalla">
</head>

<body>

	<?php
		function isPostRequest()
		{
			return $_SERVER['REQUEST_METHOD'] == 'POST';
		}
		$percentage = $_POST['Percentage'] ?? '';
		$billTotal = $_POST['billTotal'] ?? '';
		$otherPercentage = $_POST['percentageOther'] ?? '';
	?>

	<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post">
		<h1>Tip Calculator:</h1><br>
		<p>Bill Total:</p>
		<input type= "text" name= "billTotal"><br>

		<p>Tip Percentage:</p>
		<?php 
			$percentages = array(10, 15, 20);
			for($i = 0; $i < count($percentages); $i++)
			{
				echo('<input type = "radio" name = "Percentage" value = "' . $percentages[$i] . '" >' . $percentages[$i] . '%');	
			}
			echo('<input type = "radio" name = "Percentage" id = "otherPercentage"');
			echo('<label for = "otherPercentage"> Other Percentage</label>');

			echo('<div class = "reveal-if-active">

			    <input type= "text" name= "percentageOther"><br>

			    </div>');

		?>

		<br>
		<br>

		<?php

		// This is a post request
		if(isPostRequest())
		{
			
			if(is_numeric($billTotal) && (is_numeric($percentage) || is_numeric($otherPercentage)))
			{
				if($billTotal > 0)
				{
					if(is_numeric($percentage))
					{
						$tip = ($percentage / 100) * $billTotal;
						$billTotal = $billTotal + $tip; 
						echo('<p>Tip: ' . '$' . $tip . '</p>');
						echo('Bill Total: ' . '$' . $billTotal);
					}
					else if(is_numeric($otherPercentage))
					{
						$tip = ($otherPercentage / 100) * $billTotal;
						$billTotal = $billTotal + $tip; 
						echo('<p>Tip: ' . '$' . $tip . '</p>');
						echo('Bill Total: ' . '$' . $billTotal);
					}
					
				}
				else
				{
					echo 'The bill total is negative';
				}
				
			}
			else
			{
				echo 'The numbers you entered are not numeric values';
			}
		}
		else // this is not a post request
		{

		}
		?>
		
		<br>
		<input type = "submit" value = "Submit">
	</form>
</body>
</html>