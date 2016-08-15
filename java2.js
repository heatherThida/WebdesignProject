

function validate(){

    firstname = document.registration.firstname;
    lastname = document.registration.lastname;
    password = document.registration.password;
    message = document.registration.message;
    
    level = document.registration.level;
    quarter = document.registration.quarter;
    classes = document.registration.classes;
    mood = document.registration.mood;
    terms = document.registration.terms;
    
    //check each field is filled in, otherwise throw alert 
    //if firstname is not filled in, throw alert
    if(firstname.value.length == 0 ){
    	 alert ("Please enter first name");
    }
    if(lastname.value.length == 0){
    	 alert ("Please enter last name");
    }
    if(password.value.length == 0){
    	 alert ("Please enter password");
    }
    if (message.value.length == 0){
    	alert ("Please comment something");
    }
    
 	//check for each field selection   (not required per Ben)
    
	 for(var i=0; i< level.length;i++){
        if (level[i].checked)
                return true;
    	else
    		alert ("Please select your level");
    	
     }
     
     for(var i=0; i< terms.length;i++){
        if (terms[i].checked)
                return true;
        
    	else
    		alert ("Please select your terms");
    	
     }
    
    
     for(var i=0; i< classes.length;i++){
        if (classes[i].checked)
                return true;
        
    	else
    		alert ("Please select your classes");
    	
    }
    
    
    for(var i=0; i< mood.length;i++){
        if (mood[i].checked)
                return true;
        
    	else
    		alert ("Please select your mood");
    	
    }
    return false;
   
}
  


function checkSimilarity(){
	password = document.registration.password;
	repassword = document.registration.repassword;
    	if(password.value.length != NULL && password.value == repassword.value){
        alert("Password are ok!");
        return true;
    }
    
        else if (password.value.length == 0 || repassword.value.length == 0 ){
        alert("Please fill out the password. Password are not the same");
        return false;
    }
}

