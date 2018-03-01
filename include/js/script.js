

// function to validate signin form
function validateName(){
	var name =document.getElementById("userName").value;

	if (name.length==0) {

		printError("username required","nameError","red");
		textboxBorder("userName");
		return false;
	
	}

	printSuccess("userName","green","nameError");
	return true;


}

function validatePassword(){
var password =document.getElementById("userPassword").value;

	if (password.length==0) {

		printError("password required at least 6 char","passwordError","red");
		textboxBorder("userPassword");
		return false;
	
	}


printSuccess("userPassword","green","passwordError");
return true;

}







// functions to validate registration form
 function validateRegistrationName(){


 	var name=document.getElementById("name").value;

 	if(name.length==0){

 			printError("name required","registationNameError","red");
		textboxBorder("name");
		return false;

 	}
 	if(!name.match(/^[a-zA-Z]*\s?[a-zA-Z]*$/)){
 			printError("name must be character only","registationNameError","red");
		textboxBorder("name");
		return false;
 	}

 	printSuccess("name","green","registationNameError");
return true;
 	}


// function to validate email


 	function validateEmail(){

 		var email=document.getElementById("email").value;


 	if(email.length==0){

 			printError("email required","emailError","red");
		textboxBorder("email");
		return false;

 	}
 	if(!email.match(/^[a-z0-9](\.?[a-z0-9_-]){0,}@[a-z0-9-]+\.([a-z]{1,6}\.)?[a-z]{2,6}$/)){
 		printError("enter Valid email","emailError","red");
		textboxBorder("email");
		return false;

 	}


	printSuccess("email","green","emailError");
return true;


 	}


// function to validate phone

function validatePhone(){


 		var phone=document.getElementById("phone").value;


 	if(phone.length==0){

 			printError("Phone no required","phoneError","red");
		textboxBorder("phone");
		return false;

 	}
 	if(!phone.match(/^[+977]?[0-9]{13}$/)){
 		printError("enter valid phone no","phoneError","blue");
		textboxBorder("phone");
		return false;

 	}

 		printSuccess("phone","green","phoneError");
return true;



}




//function to validate date of birth

function validateDate(){

		var date=document.getElementById("date").value;


 	if(date==""){

 		printError("date of birth is required","dateError","red");
		textboxBorder("date");
		return false;

 	}

 


 printSuccess("date","green","dateError");
 return true;





}



//function to validate visa card number
function validateVisa(){
	var creditNumber=document.getElementById("creditNumber").value;

	if(creditNumber.length==0){
		printError("creditNumber required","creditError","red");
		textboxBorder("creditNumber");
		return false;

	}

	if(!creditNumber.match(/^[0-9]{16}$/)){

		printError("enter  16 digit credit card number","creditError","blue");
		textboxBorder("creditNumber");
		return false;
	}

	printSuccess("creditNumber","green","creditError");
	return true;


}

//validPass

function validatePass(){

	var password=document.getElementById("password").value;

	if(creditNumber.length==0){
		printError("password required","passError","red");
		textboxBorder("password");
		return false;

	}


	printSuccess("password","green","passError");
	return true;

	
}

 


//error display function


function printError(message,id,color){
	document.getElementById(id).innerHTML=message;
	document.getElementById(id).style.color=color;
	
}

function printSuccess(text_box_id,color,id){
	document.getElementById(text_box_id).style.borderColor=color;
	document.getElementById(id).innerHTML="";

}

function textboxBorder(text_box_id ){

document.getElementById(text_box_id).style.borderColor="red";
document.getElementById(text_box_id).focus();

}





//function to check the data field in submission 

function registrationSubmit(){

	if (validateRegistrationName()&&validateEmail()&&validatePhone()&&validateDate()&&validateVisa()&&validatePass()) {

		alert("validation sucessful ");
		return true;

	}
	alert("validation unsucessful");
	return false;
}












