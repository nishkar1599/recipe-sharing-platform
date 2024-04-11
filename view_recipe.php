<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe List</title>
	    <style>
        body {
            font-family: Georgia, sans-serif;
            margin: 0;
            padding: 0;
			background-color: #60382E;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
        }
        h2 {
            color:  #FCFAE6;
        }
        p {
            color: #FCFAE6;
        }
		ul {
			color: #FCFAE6;
		}
    </style>
</head>
<body>
    <h2>Recipe List</h2>
    <ul id="recipes">
    <?php
    // Connect to MySQL database
    $mysqli = new mysqli("localhost:3306", "root", "Nishkar@1599", "recipe_platform");

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Query to fetch recipes
    $sql = "SELECT * FROM recipe";
    $result = $mysqli->query($sql);

    // Output data of each row
   while ($row = $result->fetch_assoc()) {
    echo "<li>";
    echo "<strong>Title:</strong> " . $row["title"] . "<br>";
    echo "<strong>Ingredients:</strong> " . $row["ingredients"] . "<br>";
    echo "<strong>Instructions:</strong> " . $row["instructions"] . "<br>";
    echo "</li>";
}

    // Close connection
    $mysqli->close();
    ?>
    </ul>

    <script>
            document.addEventListener("DOMContentLoaded", function() {
            const recipesList = document.getElementById('recipes');
            recipesList.addEventListener('click', function(event) {
                if (event.target.tagName === 'LI') {
                    alert("You clicked on: " + event.target.textContent);
                }
            });
        });
    </script>
</body>
</html>