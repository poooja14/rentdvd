function validateReqd(field){
	with (field){
		  if (value==null||value==""){
				alert("Enter your username!");
				return false;
		  }
		  else if (!isValidEmail(value)){
			  alert("Enter a valid username/email!");
			  return false;
		  }
		  else{
			return true;
		   }
	  }
}

function isValidEmail(emailId){
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})+$/;
    if(reg.test(emailId) == false) {
       return false;
    }
	var strArray = new Array();
	strArray = emailId.split('@');
	var username = strArray[0];
	var mailServer = new Array();
	mailServer = strArray[1].split('.');
	var server = mailServer[0];
	var domain = mailServer[1];	
	if(username.length<3 || server.length<3 || domain.length<2){
		return false;
	}	
	return true;
}

function validatePwd(pwd){
	with (pwd){
		  if (value==null||value==""){
				alert("Enter the password!");
				return false;
		  }
		  else{
			return true;
		   }
	  }
}

function validateEmailPwd(thisform){
	with (thisform){
		  if (validateReqd(email)==false){
			  email.focus();
			  return false;
		  }
		  if(validatePwd(password)==false){
			  password.focus();
			  return false;
		  }
	  }
}

