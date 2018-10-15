<?php 
// $.ajax({
// 					"url" : "index.php",
// 					"data": {"newTask":newTask},
// 					"type": "GET",
// 					"success": (data) => {});

	$newTask = $_GET["newTask"];

	$tasklist = file_get_contents("./assets/tasklist.json");
	$tasklist_array = json_decode("$tasklist", true);
	//opens the file and converts frmo JSON string to assocative array

	//why? we would want to push the newTask to the current assoc array
	array_push($tasklist_array, ["task" => $newTask, "done"=>false]);

	//open the file for writing/editing
	$file = fopen("./assets/tasklist.json", "w");
	//it creates a variable file and says we are going to write content there
	//syntax: fwrite (variable from fopen, what we want to write);

	//json_encode is from assoc array to JSON string
	fwrite($file, json_encode($tasklist_array, JSON_PRETTY_PRINT));
	//What is JSON_PRETTY_PRINT? for formatting

	//save and close the file
	fclose($file);
	echo "new task added";
 ?>