function validate(){

	if(document.formgallery.image1.value.length == 0 && document.formgallery.image2.value.length == 0 && document.formgallery.image3.value.length == 0)
	{        
        document.getElementById("error_status").innerHTML = "No photos selected";
        document.getElementById("php_status").innerHTML = "";
        return false;
    }
	if(document.formgallery.image1.value.length > 0 && 
	   (document.formgallery.image1_firsttag.value.length == 0 || document.formgallery.image1_secondtag.value.length == 0
        || document.formgallery.image1_thirdtag.value.length == 0))
    {
    	document.getElementById("error_status").innerHTML = "Please enter all 3 tags for Image1";
    	document.getElementById("php_status").innerHTML = "";
		return false;
    }
    
    if(document.formgallery.image2.value.length > 0 && 
    	(document.formgallery.image2_firsttag.value.length == 0 || document.formgallery.image2_secondtag.value.length == 0
       || document.formgallery.image2_thirdtag.value.length == 0))
    {
        document.getElementById("error_status").innerHTML = "Please enter all 3 tags for Image2";
        document.getElementById("php_status").innerHTML = "";
        return false;
    }
    if(document.formgallery.image3.value.length > 0 && 
    	(document.formgallery.image3_firsttag.value.length == 0 || document.formgallery.image3_secondtag.value.length == 0
       || document.formgallery.image3_thirdtag.value.length == 0))
    {
        document.getElementById("error_status").innerHTML = "Please enter all 3 tags for Image3";
        document.getElementById("php_status").innerHTML = "";
        return false;
    }
    else 
    {
    return true;
    }
}
