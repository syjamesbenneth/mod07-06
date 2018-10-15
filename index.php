<?php 
	$tasklist = file_get_contents('./assets/tasklist.json');
	//reads the content of the file indicated AND transforms it into a string
	// var_dump($tasklist);
	$tasklist_array = json_decode($tasklist, true);
	//converts the json string to a php assoc array
	//true -> makes sure that the json is converted to an assoc array
	// var_dump($tasklist_array);
	//$tasklist_array [["task"=>"task 1", "done"=>true],] 
	//indexed array with assoc arrays inside
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Task list</title>
 	<script
	  src="https://code.jquery.com/jquery-3.3.1.min.js"
	  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	  crossorigin="anonymous"></script>
 </head>
 <body>
 	<h1>To-do List</h1>
 	New Task:<input type="text" name="newTask" id="newTask">
 	<span id="result"></span>
 	<ul id="tasklist">
 		<?php 
 		foreach ($tasklist_array as $index => $task_set) {
 			//index is just there if we need the index
 			// echo "<li>";
 			echo "<li id = '" . $index . "'>";
 			echo $task_set["task"];
 			echo "</li>";
 		}	// why $task_set["task"] A: $task_set is also an assoc array with keys being task and done
 		 ?>
 	</ul>
 	<script type="text/javascript">
 		$("input[type='text']").keypress((keyboard)=>{
 			if(keyboard.which ==13) {
 				let newTask = $("#newTask").val();
 				// alert(newTask);
 				// $("#tasklist").append("<li>" + newTask + "</li>");
 				$.ajax ({
 					"url" : "./create.php",
 					"data": {"newTask":newTask},
 					"type": "GET",
					"success": (datafromPHP) => {
		 			$("#result").html(datafromPHP);
		 			$("ul").append("<li>"+newTask+"</li>");
		 			}
 				});
 			}
 		});
 		 

 	</script>
 
 </body>
 </html>