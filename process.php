<html> 
    <head>
        <title>Processor php file</title>
    </head>
    <body> <table border = "1">
<?php
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password = $_POST['password'];
        $level = $_POST['level'];
        $quarter = $_POST ['quarter'];
        $classes = $_POST['classes'];
        $terms = $_POST['terms'];
        $message = $_POST['message'];
        $mood = $_POST['mood'];
            
        echo '<tr><td colspan ="2" align = "center"> Your Registration Information </td> </tr>';
        echo "<tr><td> Firstname </td><td>" .$firstname. " </td></tr>";
        echo "<tr><td> Lastname </td><td>" .$lastname. "</td></tr>";
        echo "<tr><td> Password </td><td>" .$password. "</td></tr>";
        echo "<tr><td> Level </td><td>" .$level."</td></tr>";  
        echo "<tr><td> Quarter </td><td>" .$quarter."</td></tr>"; 
        echo "<tr><td> Class registered </td><td>" .$classes."</td></tr>";
        echo "<tr><td> Terms </td><td>" .$terms."</td></tr>";      
        echo "<tr><td> Message </td><td>" .$message."</td></tr>"; 
        echo "<tr><td> Mood </td><td>" .$mood. "</td></tr>";
    
        /*if (empty($_POST["quarter"])) {
            $genderErr = "quarter is required";
        }
        else {
                $gender = test_input($_POST["quarter"]);
        }
    
    
        if (empty($_POST["mood"])) {
            $genderErr = "mood is required";
        }
        else {
            $gender = test_input($_POST["mood"]);
        }*/
        
    
?>
        </table>
    </body>
</html>