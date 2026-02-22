<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="kossi.php" method="post">
        <h2>Student marks analyzer</h2>
<label>Enter the number of students</label>
<input type="number" name="num_Students" min="1" required><br>
<input type="submit" value="Submit">

    </form>
    <?php
    if(isset($_POST["num_Students"])){
        $num=$_POST["num_Students"];
        echo "<h2> Enter Student marks</h2>";
        echo"<form method='POST'>";

        for($i=1; $i<=$num; $i++){
            echo"student $i Marks:";
            echo"<input type='number' name=marks[]' required><br><br>";
        }
        echo"<input type='submit' name='submit' value='Submit'>";
        echo"</form>";
    }
    ?>
    
</body>
</html>

<?php

if(isset($_POST['marks'])){
    $marks=$_POST['marks'];

    $total=0;
    $highest=$marks[0];
    $lowest=$marks[0];
    $count=0;

    $above50=0;
    $below50=0;

    foreach($marks as $mark){
        $mark=(int)$mark;

        $total+= $mark;

        if($mark>$highest) $highest=$mark;
        if($mark<$lowest)  $lowest=$mark;

        if($mark>50) $above50++;
        if($mark<50) $below50++;

        $count++;

    }

    $average=$total/ $count;

}
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
</head>
<body>
    <h2>Student results</h2>

    <?php
    $i=0;
    while($i < $count){
        echo"student" .($i + 1) .":" . $marks[$i]."<br>";
        $i++;

    }

    
    ?>

    <hr>
    Total Marks: <?php echo $total; ?> <br>
    Class Average: <?php echo $average; ?> <br>
    Highest Mark: <?php echo $highest; ?> <br>
    Lowest Mark: <?php echo $lowest; ?> <br>

    <hr>
    Students above 50: <?php echo $above50; ?> <br>
    Students below 50: <?php echo $below50; ?> <br>

    <?php 
    if($average>=75){
        echo"Excellent class";
    }
    else{
        echo"Needs improvement";
    }

    ?>

</body>
</html>