<?php
	if(!isset($_GET['content']))
	{
		if(isset($_SESSION['scrname']) && ($_SESSION['scrname'] != 'admin'))
		{
			header("Location:playerprofile.php");
		}
		if(isset($_SESSION['scrname']) && ($_SESSION['scrname'] == 'admin'))
		{
			header("Location:admin.php");
		}
		if(!isset($_SESSION['scrname']))
		{
			header("Location:log-in.php");
		}
	}
	require("connection.php");
	require("admin_query.php");
	$content = $_GET['content'] ; 
	$error = null;
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if( (isset($_POST['add'])) && ($content == 'categories') && (!empty($_POST['category'])))
		{
		    $item = $_POST['category'];
		    
		    for($i = 0 ; $i < $num_categories; $i++ )
		    {
		    	if($categories[$i]['category_name'] == $item)
		    	{
		    		$error = '*already exists';
		        }
		    }
		    if(!isset($error))
		    {
				$query = "INSERT INTO `categories`(`category_name`) VALUES ('$item')";
				$result = $conn->query($query);
				if($result)
				{
					header("Location:adminpage.php");
				}
				
			}
		}

		else if((isset($_POST['add'])) && ($content == 'topics') )
		{
			if( (!empty($_POST['category_select'])) && (!empty($_POST['topic'])) )
			{
				$categoryname = $_POST['category_select'];
				$topicname = $_POST['topic'];
				for($i = 0 ; $i < $num_topics; $i++)
				{
					if($topics[$i]['topic_name'] == $topicname)
		    		{
		    			$error = '*already exists';
		        	}
				}
				$query = "SELECT `category_id` FROM `categories` WHERE `category_name` = '$categoryname'";
				$row= run_query($query); $categoryid = $row['category_id']; 
				if(!isset($error))
				{
					$query = "INSERT INTO `topics`(`category_id`, `topic_name`) VALUES ('$categoryid','$topicname')";
					$result = $conn->query($query);
					if($result)
					{
						header("Location:adminpage.php");
					}
				}

			}
			else
			{
				$error = '*all fields are required';
			}

		}

		else if((isset($_POST['add'])) && ($content == 'questions'))
		{
			echo htmlspecialchars($_POST['question']);
			if( (!empty($_POST['topic-select'])) && (!empty($_POST['question'])) && (!empty($_POST['option1'])) && (!empty($_POST['option2'])) && (!empty($_POST['option3'])) && (!empty($_POST['option4'])) && (!empty($_POST['answer'])))
			{
				$topicname = $_POST['topic-select'];
				$question =  $_POST['question'] ;
				$option1 = $_POST['option1'];
				$option2 = $_POST['option2'];
				$option3 = $_POST['option3'];
				$option4 = $_POST['option4'];
				$ans = $_POST['answer'];
				for($i = 0 ; $i < $num_questions ; $i++)
				{
					if($questions[$i]['question'] == $question)
					{
						$error = "*already exists";
					}
				}
				$query = "SELECT `topic_id` FROM `topics` WHERE `topic_name` = '$topicname'";
				$row = run_query($query); $topicid = $row['topic_id'];
				if(!isset($error))
				{
					$query = "INSERT INTO `questions`(`topic_id`, `question`, `option_1`, `option_2`, `option_3`, `option_4`, `answer`) VALUES ('$topicid','$question','$option1','$option2','$option3','$option4','$ans')";
					$result = $conn->query($query);
					if($result)
					{
						header("Location:adminpage.php");
					}
				}

			}
			else
			{
				$error = '*all fields are required';
			}
		}
		else
		{
			$error =  "*please fill the field";

		} 

    }

	

?>

<!DOCTYPE html>
<html>
<head>
	<script>

		window.addEventListener("DOMContentLoaded", function() {
        
        if( <?php if($content == 'categories'){echo true;} else{echo 0;}?> )
        {
        	showcategories();
        }

        if(<?php if($content == 'topics'){echo true;} else{echo 0;}?> )
        {
        	showtopics();
        }

        if(<?php if($content == 'questions'){echo true;} else{echo 0;}?> )
        {
        	showquestions();
        }

        }, false);

		function showcategories()
		{
			document.getElementById('add-topic').style.display = 'none';
			document.getElementById('add-question').style.display = 'none';
		}
		function showtopics()
		{
			document.getElementById('add-category').style.display = 'none';
			document.getElementById('add-question').style.display = 'none';
		}
		function showquestions()
		{
			document.getElementById('add-topic').style.display = 'none';
			document.getElementById('add-category').style.display = 'none';
		}
	</script>
	<title></title>
	<link rel="stylesheet" type="text/css" href="addnewcontent1.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Kalam" rel="stylesheet">
	<style type="text/css">
		button{
			float :right;
		}
	</style>
</head>
<body class="background">
	<div><i class="fa fa-arrow-left back" onclick = "window.location.href = 'adminpage.php'"></i><div>
	<div id = 'error' style="color: #f75b52;position: absolute;margin-left:40%;margin-top:25%;font-size: 4vh;"><?php echo $error ;?></div>
	<form action = "addnewcontent.php?content=<?php echo $content; ?>" method = 'post' name = 'myform'>
		
		<div id = 'add-category'>

			<label >Category Name:</label>
           <input type = "text" name = "category" >
			
			
		</div>

		<div id = 'add-topic'>

			<select name = 'category_select'>

			<?php

				for($i = 0 ; $i < $num_categories ; $i++ )
				{
					echo "<option value = '".$categories[$i]['category_name']."'>".$categories[$i]['category_name']."</option>";

				}

			?>

			</select>
			<label >Topic Name:</label>
			<input type = "text" name = "topic" >

			
		</div>

		<div id = 'add-question'>

			<select name = 'topic-select'>

			<?php

				for($i = 0 ; $i < $num_topics ; $i++ )
				{
					echo "<option>".$topics[$i]['topic_name']."</option>";

				}

			?>

			</select>
			<textarea  name = 'question' placeholder = 'add question here' style="width:600px;margin-top: 1%;margin-left: .5%; font-family:'Kalam', cursive;letter-spacing: 2px; "></textarea>
			<input type="text" name="option1" placeholder = 'option1' style="width: 600px;margin: 5px;">
			<input type="text" name="option2" placeholder = 'option2' style="width: 600px;margin: 5px;">
			<input type="text" name="option3" placeholder = 'option3' style="width: 600px;margin: 5px;">
			<input type="text" name="option4" placeholder = 'option4' style="width: 600px;margin: 5px;">
			<label style="text-align: center;">select answer</label> 
			<select name = 'answer' class="optionSelect">
				<option value = 'option1'>option1</option>
				<option value = 'option2'>option2</option>
				<option value = 'option3'>option3</option>
				<option value = 'option4'>option4</option>
			</select>

			
		</div>


		<input type = 'submit' name = 'add' value = 'ADD' class="add">
		
	</form>

</body>
</html>