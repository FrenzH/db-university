<?php 
define("DB_SERVERNAME", "localhost:3306");
define("DB_USERNAME","root");
define("DB_PASSWORD", "root");
define("DB_NAME", "db_university");

$conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($conn && $conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
    die();
}

$sql = "SELECT AVG(`vote`) AS `vote_average` , `exam_id` AS `university_round`
        FROM `exam_student`
        GROUP BY `exam_id`";

$result = $conn->query($sql);







?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <?php
            if($result && $result->num_rows > 0){
                
                while( $resultRow = $result->fetch_assoc() ){
                    ?>
                    <div>
                        <?php foreach($resultRow as $avg=>$exam_id){
                            
                            echo  $avg  . '</br>'. $exam_id . '</br>';
                        } ?>
                    </div>
                    <?php
                }
            }

        ?>
    </div>
    
</body>
</html>