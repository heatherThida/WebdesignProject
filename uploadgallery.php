<!DOCTYPE html>
<html>
	<head>
	<title> Thida's Upload Gallery </title>
    <link rel="stylesheet" type="text/css" href="formstyle.css" />
   	<!--meta tag to respond in mobile devices -->
    <meta name = "viewport" content= "width = device-width" />
    </head>

 <body>
 
 	<form id ="title" enctype="multipart/form-data" action ="uploadgallery.php" method="get" >
 	<p> Search for specific tags: <input type='text' name='selectedTag' value=""/> <br /> </p>
 	</form>
 	
    <div class='main'>
    <?php
        $myfile = glob("./uploads/*.*");
        
        $selectedTag = NULL;
        //search function matching in array or not 
        if (isset($_GET["selectedTag"])) {
        
    		$selectedTag = $_GET["selectedTag"];
    		echo "<p style ='text-align: center'> You searched for: ".$selectedTag."<br>"."</p>";
        }  
      
        echo "<div class ='tag'>" ;
        echo "<h1> Tags </h1> <br> <a href=\"uploadgallery.php\"> Reset Tags </a> <br><br><br>";
        
		$seenTagSet = array();
		//print only the tags but linkable for the side bar
		for ($i=0; $i<count($myfile);$i++){
			$extractedFname = explode(".", basename($myfile[$i]));
			
			if ($extractedFname[1] == "txt"){
				continue;
			}
			$tag = readTagFile($extractedFname);
			for ($j = 0; $j < count($tag); $j++) {
			
				if (!array_key_exists($tag[$j], $seenTagSet)) {
					$seenTagSet[$tag[$j]] = true;
					echo "<a href='uploadgallery.php?selectedTag=$tag[$j]'> $tag[$j]</a><br>";
				}	
			}
		} 
		echo "<br><br><br>";
        echo "<a class='button' href='http://students.engr.scu.edu/~taung/upload.php'> Back </a>";
        echo "<br><br><br>";
        
        echo "</div>";
        
        echo "<div class ='gallery'>" ;
        
        //print only the pictures and their tags by space
        for ($i=0; $i<count($myfile);$i++){
            
            $extractedFname = explode(".", basename($myfile[$i]));
            if ($extractedFname[1] == "jpeg" || $extractedFname[1] == "jpg" || $extractedFname[1] == "png" || $extractedFname[1] == "gif"){
                $tag = readTagFile($extractedFname);
                if ($selectedTag != NULL && !in_array($selectedTag, $tag)) {
                  continue; // This image does not match the selected tag, skip...
                }
                echo "<figure id='figAndtag'>";
                //print the images
               	echo "<table><tr><td>";
						echo "<img class='photos' src ='".$myfile[$i]."'/> ";
				echo "</td></tr></table>";
               
               	//print tags with space underneath the images
                echo "<table><tr><td>";
                echo "<h4 style ='text-align: center'>";
                
            	for ($j = 0; $j < count($tag); $j++) {
                    
            	    echo $tag[$j]."  ";
                    
           		 }
                 echo "</h4>";
           		 echo "</td></tr></table>";
           		 echo "</figure>";
            }
        }
        
        echo "</div>";
        
        //recording Tags into an Array set  
        function tagsArray($extractedFname){
        
        	$get_textFile = "./uploads/".$extractedFname[0]. ".txt";
            $open_file = fopen($get_textFile, "r") or die ("Cannot open the file!");
            $file_contents = fread($open_file, filesize($get_textFile));
            $tag = explode(',',$file_contents);
        }
        
        //print the "," content inside text file line by line
        function readTagFile($extractedFname){
            $get_textFile = "./uploads/".$extractedFname[0]. ".txt";
            $open_file = fopen($get_textFile, "r") or die ("Cannot open the file!");
            $file_contents = fread($open_file, filesize($get_textFile));
            $tag = explode(',',$file_contents);
            
           	return $tag;
        }
        
    ?>
    
   </div>
</body>
</html>
