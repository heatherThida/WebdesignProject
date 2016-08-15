 <!DOCTYPE html>
    <html>

    <head>
    <title> Thida's Assignment2 for COEN60 </title>
    <link rel="stylesheet" type="text/css" href="formstyle.css">
    <script src="galleryjava_later.js"> </script> 
   </head>

    <body>

    <div class ="form">

    <!-- html part to show the boxes and buttons -->
    <form name ="formgallery" enctype="multipart/form-data" method="post" action="upload.php" onSubmit = "return validate()">

    <h1> Direct Upload Gallery </h1>
    <legend> Please upload up to 3 image files, make sure you fill all 3 tags. <br /> </legend>

    <input type="file" name="image1"  /> <br />
    Tag1: <input type ="text" name="image1_firsttag"  />  <br />
    Tag2: <input type ="text" name="image1_secondtag"  />  <br />
    Tag3: <input type ="text" name="image1_thirdtag" />  <br />


    <input type="file" name="image2"  />  <br />

    Tag1: <input type ="text" name="image2_firsttag" >  <br />
    Tag2: <input type ="text" name="image2_secondtag"  />  <br />
    Tag3: <input type ="text" name="image2_thirdtag"  />  <br />

    <input type="file" name="image3"  />   <br />
    Tag1: <input type ="text" name="image3_firsttag" />  <br />
    Tag2: <input type ="text" name="image3_secondtag"  />  <br />
    Tag3: <input type ="text" name="image3_thirdtag"  />  <br />
    
	<br /> Password <input type = "password" name = "password" value ="" />
	
    <input type = "submit" name = "submit" value= "Submit"  />
	<br /> <br />
	<a class="button" href="http://students.engr.scu.edu/~taung/uploadgallery.php"> Uploaded Gallery </a>  
    </form>
    <br />
    	
    	<div id="error_status"> <!-- id for javascript --> 
    	</div>
	<div id="php_status"> <!-- id for javascript --> 

    <?php
    	//Writing files and showing gallery 
        function validateAndWrite($file_post_var_name) {
        	$foldername ="./uploads/";
        	$php_file = $_FILES[$file_post_var_name];
        	
            //restricting image type
            $imageFileType = array("image/jpeg", "image/gif", "image/png");
            
            if ( !in_array($php_file["type"], $imageFileType)){
                
                echo "<br><br>Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
                return false;
            }
            echo "<br>".$php_file['name']."<br>";
            
                  
        	// Checking 3 tags.
        	$tag1 = "";
        	$tag2 = "";
        	$tag3 = "";
        	if(!(isset($_POST[$file_post_var_name."_firsttag"]) && isset($_POST[$file_post_var_name."_secondtag"]) && 
        		 isset($_POST[$file_post_var_name."_thirdtag"]))) {
        		echo "<br>"."Please enter all 3 tags for ".$file_post_var_name ;
        		return false;
            } else {
                $tag1 = $_POST[$file_post_var_name.'_firsttag'];
        		$tag2 = $_POST[$file_post_var_name.'_secondtag'];
        		$tag3= $_POST[$file_post_var_name.'_thirdtag'];
        		if ($tag1 == "" || $tag2 == "" || $tag3 == "") {
        		    echo "<br>"."Please enter all 3 tags for ".$php_file["name"]."<br>";
        			return false;
        		}
            }
            
            $tag_filename = substr($_FILES[$file_post_var_name]["name"], 0, 
            					   strlen($_FILES[$file_post_var_name]["name"])).".txt";
            					   
            //using explode to slide the file name into array by "." so it can be used for jpeg as well as jpg,png,gif
        	$delimiter = '.';
        	$extractedfilename = explode($delimiter, $tag_filename);
        	
        	file_put_contents($foldername.$extractedfilename[0].".txt", $tag1.",". $tag2.",". $tag3);
            
            $file = $php_file['tmp_name'];
            $destination = "./uploads/" . $php_file["name"];
            
            //Writing file1, file2, file3
            if (move_uploaded_file($file, $destination)) {
                return true;
            }
            else {
                return false;
            }
        }// end of validateAndWrite
        
        //Submit only when the correct password is entered
        if (isset($_POST["password"])) {
        	$password = $_POST["password"];
        	if($password != "awesome")
    		{
    			echo "<br><br>"."Password cannot be empty or is incorrect. Nothing uploaded. Try again or ask Thida!";
    			return false;
    		}
        }
        
        if(isset($_FILES["image1"]) && $_FILES["image1"]["name"] == "" && 
        	isset($_FILES["image2"]) && $_FILES["image2"]["name"] == "" &&
        	isset($_FILES["image3"]) && $_FILES["image3"]["name"] == "") {
        	echo "<br>No files uploaded<br>";
        	return;
    	}
        
       
        //Uploading file1
        
        if(isset($_FILES['image1']) && $_FILES["image1"]["name"] != ""){
        	$status = validateAndWrite("image1");
			if (!$status) {
				echo "Sorry, there was an error uploading your file.";  
           	} else {
           		echo "The file ". $_FILES["image1"]["name"] . " has been uploaded.";
           	} 	
            
        }
            
        //file2
        if(isset($_FILES['image2']) && $_FILES["image2"]["name"] != ""){
            
        	$status = validateAndWrite("image2");
			if (!$status) {
				echo "Sorry, there was an error uploading your file.";  
           	} else {
           		echo "The file ". $_FILES["image2"]["name"] . " has been uploaded.";
           	} 	    
            
        }
        
        
        //file3
        
        if(isset($_FILES['image3']) && $_FILES["image3"]["name"] != ""){
            
        	$status = validateAndWrite("image3");
			if (!$status) {
				echo "Sorry, there was an error uploading your file.";  
           	} else {
           		echo "The file ". $_FILES["image3"]["name"] . " has been uploaded.";
           	} 	
            
        }
        
        ?>
    
   	 </div> <!-- end of div "php_status" --> 
    </div>  <!-- end of div "form" --> 

    <?php
        //This PHP snippet is for PHP versions lower than 5 (e.g. on the DC servers)
        if(!function_exists('file_put_contents')) {
            function file_put_contents($filename, $data, $file_append = false) {
                $fp = fopen($filename, (!$file_append ? 'w+' : 'a+'));
                if(!$fp) {
                    trigger_error('file_put_contents cannot write in file.', E_USER_ERROR);
                    return;
                }
                fputs($fp, $data);
                fclose($fp);
            }
        }
    ?>

	</body>
</html>
