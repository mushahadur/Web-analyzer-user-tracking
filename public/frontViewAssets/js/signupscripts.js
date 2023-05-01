var nameError 		= document.getElementById('name-error');
var emailError 		= document.getElementById('email-error');
var PassError 		= document.getElementById('Pass-error');
var conPassError 	= document.getElementById('conPass-error');
/**Start Name Validation */
function validateName(){
	var name = document.getElementById('name').value;
	if(name.length == 0){
		nameError.innerHTML = 'Name requred';
		return false;
	}
	else if(!isNaN(name)){  
		nameError.innerHTML = 'Firstly do not write the Number'; 
		return false;  
	  }
	else if(!name.match(/^([a-zA-Z ]){3,20}$/)){
		nameError.innerHTML = 'Write Valid Name';
		return false;
	}
	else{
	nameError.innerHTML = '<i class="fa fa-check-circle" aria-hidden="true"></i>';
	return true;
	}
}
/**End Name Validation */

/**Start Email Validation */

function validateEmail(){
	var email = document.getElementById('email').value;
	if(email.length == 0){
		emailError.innerHTML = 'Email requred';
		return false;
	}
	if(!email.match(/\S+@\S+\.\S+/)){
		emailError.innerHTML = 'Write Valid Email';
		return false;
	}
	else{
		emailError.innerHTML = '<i class="fa fa-check-circle" aria-hidden="true"></i>';
	return true;
	}
}
/**End Email Validation */

/**Start Password Validation */
function validatePass(){
	var password = document.getElementById('password').value;
	if(password.length == 0){
		PassError.innerHTML = 'Password requred';
		return false;
	}
	if(!password.match(/^([a-zA-Z@#$%^&*(){}.,0-9?/\+-;:'"|!=_ ]){6,32}$/)){
		PassError.innerHTML = 'Write Valid password';
		return false;
	}
	else{
		PassError.innerHTML = '<i class="fa fa-check-circle" aria-hidden="true"></i>';
	return true;
	}
}
/**End Password Validation */
const  password = document.getElementById('password').value;



/**Start Conform Password Validation */
function validateConPass(){
	const  password = document.getElementById('password').value;
	var conPassword = document.getElementById('conPassword').value;
	if(conPassword.length == 0){
		conPassError.innerHTML = 'Enter Con Pass';
		return false;
	}
	else if(!conPassword == password){
		conPassError.innerHTML = 'Password Not Match..!';
		return false;
	}
	else{
		conPassError.innerHTML = '<i class="fa fa-check-circle" aria-hidden="true"></i>';
	return true;
	}

}

/**End Conform Password Validation */

function validation(){
	if(!validateName() || !validateEmail() || !validatePass() || !validateConPass()){
		
	}
}