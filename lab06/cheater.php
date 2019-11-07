<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Grade Store</title>
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/gradestore.css" type="text/css" rel="stylesheet" />
	</head>

	<body>

		<?php
		# Ex 4 :
		# Check the existence of each parameter using the PHP function 'isset'.
		# Check the blankness of an element in $_POST by comparing it to the empty string.
		# (can also use the element itself as a Boolean test!)
	if (isset($_POST["name"])==FALSE or isset($_POST["id"])==FALSE or isset($_POST["course"])==FALSE or isset($_POST["grade"])==FALSE or isset($_POST["creditnum"])==FALSE or isset($_POST["cc"])==FALSE){
		print "1";
		?>
			Display the below error message :
			<h1>Sorry</h1>
			<p>You didn't fill out the form completely. Try again?</p>


		<?php
		# Ex 5 :
		# Check if the name is composed of alphabets, dash(-), ora single white space.
	} elseif (preg_match('/[a-zA-Z]*[\t-]?/', $_POST["name"])==FALSE) {
		print "2";
		?>

		<!-- Ex 5 : -->
			Display the below error message :
			<h1>Sorry</h1>
			<p>You didn't provide a valid name. Try again?</p>


		<?php
		# Ex 5 :
		# Check if the credit card number is composed of exactly 16 digits.
		# Check if the Visa card starts with 4 and MasterCard starts with 5.
	} elseif (((preg_match('/^5[0-9]{15}$/', $_POST["creditnum"])==TRUE and $_POST["cc"] == "master") or (preg_match('/^4[0-9]{15}$/', $_POST["creditnum"])==TRUE and $_POST["cc"] == "visa"))==FALSE) {
		print "3";
		?>

		<!-- Ex 5 : -->
			Display the below error message :
			<h1>Sorry</h1>
			<p>You didn't provide a valid credit card number. Try again?</p>


		<?php
		# if all the validation and check are passed
	} else {
		print "4";
		?>

		<h1>Thanks, looser!</h1>
		<p>Your information has been recorded.</p>

		<!-- Ex 2: display submitted data -->
		<form method="get">
			<ul>
				<li>Name: <?php print_r($_POST["name"]);?></li>
				<li>ID: <?php print_r($_POST["id"]);?></li>
				<!-- use the 'processCheckbox' function to display selected courses -->
				<li>Course: <?php processCheckbox($_POST["course"]);?></li>
				<li>Grade: <?php print_r($_POST["grade"]);?></li>
				<li>Credit: <?php print_r($_POST["creditnum"]);
				 				  ?>(<?php print_r($_POST["cc"]);
								  ?>)
							  </li>
			</ul>

		</form>
		<!-- Ex 3 : -->
		<p>Here are all the loosers who have submitted here:</p>
		<?php

			$filename = "loosers.txt";
			$info = "{$_POST["name"]};{$_POST["id"]};{$_POST["creditnum"]};{$_POST["cc"]}\n";
			file_put_contents($filename, $info, FILE_APPEND)
			// print $info;


			?><pre><?php
			print file_get_contents($filename);
			/* Ex 3:
			 * Save the submitted data to the file 'loosers.txt' in the format of : "name;id;cardnumber;cardtype".
			 * For example, "Scott Lee;20110115238;4300523877775238;visa"
			 */
		?></pre>

		<!-- Ex 3: Show the complete contents of "loosers.txt".
			 Place the file contents into an HTML <pre> element to preserve whitespace -->


		<?php
		}
		?>

		<?php
			/* Ex 2:
			 * Assume that the argument to this function is array of names for the checkboxes ("cse326", "cse107", "cse603", "cin870")
			 *
			 * The function checks whether the checkbox is selected or not and
			 * collects all the selected checkboxes into a single string with comma separation.
			 * For example, "cse326, cse603, cin870"
			 */
			 function processCheckbox($names){
 				// print_r($names);
 				$arrlen = count($names);
 				if($arrlen > 0){
 					for($i=0;$i<$arrlen;$i++){
 						print_r(strtoupper($names[$i]));
 						if($i!=$arrlen-1){
 							print_r(",");
 						}
 					}
 				}
 			}
		?>

	</body>
</html>
