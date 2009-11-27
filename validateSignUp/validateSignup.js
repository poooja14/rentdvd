function validateReqd(field){
	with (field){
		  if (value==null||value==""){
				alert("Enter your email!");
				return false;
		  }
		  else if (!isValidEmail(value)){
			  alert("Enter a valid email!");
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

function validatePwd(pwd,cPwd){
	with (pwd){
		  if (value==null||value==""){
				alert("Enter the password!");
				return false;
		  }
		  else{
			    if(value.length<6 || value.length>15){
					alert("Password must be between 5-15 characters long!");
					return false;
				}
			    with(cPwd){
				   if(value!=pwd.value){
					   alert("Passwords do not match!");
					   return false;
				   }
			   }
			   return true;
		  }		   
	  }
}

function validateName(name,msg){
	with(name){
		if (value==null||value==""){
				alert("Enter your Name!");
				return false;
		}
		var reg = /^[A-Za-z]+$/;
		if(reg.test(value) == false) {
		   alert(msg);
		   return false;
		}
		else{
			return true;
		}
	}
}

function validateDate(field){
	with (field){
		  if (value==null||value==""){
				alert("Enter your date of birth!");
				return false;
		  }
		  else if (!isValidDate(value)){
			  return false;
		  }
		  else{
			  return true;
		  }
	  }
}

function isValidDate(dateStr){
	var slash1 =  dateStr.indexOf("-");
    // if no dashes, invalid date
    if (slash1 == -1){
		alert("Invalid date-format: Must be MM-DD-YYYY");
		return false; 
	}
    var dateMonth = dateStr.substring(0, slash1)
    var dateMonthAndYear = dateStr.substring(slash1+1, dateStr.length);
    var slash2 = dateMonthAndYear.indexOf("-");
    // if not a second dash, invalid date
    if (slash2 == -1){ 
		alert("Invalid date-format: Must be MM-DD-YYYY");
		return false; 
	}
    var dateDay = dateMonthAndYear.substring(0, slash2);
    var dateYear = dateMonthAndYear.substring(slash2+1, dateMonthAndYear.length);
    if ((dateMonth == "") || (dateDay == "") || (dateYear == "")){ 
		alert("Invalid date-format: Must be MM-DD-YYYY");
		return false; 
	}
    // if any non-digits in the month, invalid date
    for (var x=0; x < dateMonth.length; x++) {
        var digit = dateMonth.substring(x, x+1);
        if ((digit < "0") || (digit > "9")){ 
			alert("Invalid date-format: Must be digits only");
			return false; 
		}
    }
    // convert the text month to a number
    var numMonth = 0;
    for (var x=0; x < dateMonth.length; x++){
        digit = dateMonth.substring(x, x+1);
        numMonth *= 10;
        numMonth += parseInt(digit);
    }
    if ((numMonth <= 0) || (numMonth > 12)){
		alert("Invalid date-format: Not a valid month");
		return false; 
	}
    // if any non-digits in the day, invalid date
    for (var x=0; x < dateDay.length; x++) {
        digit = dateDay.substring(x, x+1);
        if ((digit < "0") || (digit > "9")){
			alert("Invalid date-format: Must be digits only");
			return false; 
		}
    }
    // convert the text day to a number
    var numDay = 0;
    for (var x=0; x < dateDay.length; x++) {
        digit = dateDay.substring(x, x+1);
        numDay *= 10;
        numDay += parseInt(digit);
    }
    if ((numDay <= 0) || (numDay > 31)) {
		alert("Invalid date-format: Not a valid day");
		return false; 
	}
    // February can't be greater than 29 (leap year calculation comes later)
    if ((numMonth == 2) && (numDay > 29)) { 
		alert("Invalid date-format: Not a valid day");
		return false; 
	}
    // check for months with only 30 days
    if ((numMonth == 4) || (numMonth == 6) || (numMonth == 9) || (numMonth == 11)) {
        if (numDay > 30) { 
			alert("Invalid date-format: Not a valid day");
			return false; 
		}
    }
    // if any non-digits in the year, invalid date
    for (var x=0; x < dateYear.length; x++) {
        digit = dateYear.substring(x, x+1);
        if ((digit < "0") || (digit > "9")) { 
			alert("Invalid date-format: Not a valid year");
			return false; 
		}
    }
    // convert the text year to a number
    var numYear = 0;
    for (var x=0; x < dateYear.length; x++) {
        digit = dateYear.substring(x, x+1);
        numYear *= 10;
        numYear += parseInt(digit);
    }
    // Year must be a 4-digit year
    if (dateYear.length != 4) { 
		alert("Invalid date-format: Year must be YYYY");
		return false; 
	}
    if ((numYear <= 0) || (numYear > 9999)) { 
		alert("Invalid date-format: Invalid year");
		return false; 
	}
    // check for leap year if the month and day is Feb 29
    if ((numMonth == 2) && (numDay == 29)) {
        var div4 = numYear % 4;
        var div100 = numYear % 100;
        var div400 = numYear % 400;
        // if not divisible by 4, then not a leap year so Feb 29 is invalid
        if (div4 != 0) { 
			alert("Invalid date: Not a leap year");
			return false; 
		}
        // at this point, year is divisible by 4. So if year is divisible by
        // 100 and not 400, then it's not a leap year so Feb 29 is invalid
        if ((div100 == 0) && (div400 != 0)) { 
			alert("Invalid date: Not a leap year");
			return false; 
		}
    }

	var validAge=18*365;
	var today=new Date();
	var t_day=today.getDate();
	var t_month=today.getMonth();
	var t_year=today.getFullYear();
	var b_dt=new Date();
	b_dt.setFullYear(numYear,numMonth-1,numDay);
	var one_day=1000*60*60*24;
	var age=Math.round((today.getTime()-b_dt.getTime())/(one_day));
		
	//var age=Math.ceil((t_year*365+(t_month/12)*365+t_day)-(numYear*365+(numMonth/12)*365+numDay));
	if(age<=validAge){
			alert("You must be at least 18 years old to be a Member!");
			return false;
	}

    // date is valid
    return true;
}

function validateNotNull(field,msg){
	with (field){
		  if (value==null||value==""){
				alert(msg);
				return false;
		  }
		  else{
			  var ind = value.indexOf("'");
			  if(ind != -1){
				  alert(msg+": Must not contain \" ' \" character!");
			  }
			  return true;
		  }
	}
}

function validateZip(num,msg){
	with (num){
		  if (value==null||value==""){
				alert(msg);
				return false;
		  }		  
		  else{
			  var reg = /^([0-9]{5})$/;
			  
			  if(reg.test(value) == false) {
				    alert(msg);
					return false;
			  }
			  return true;
		  }
	}
}

function validatePhone(num,msg){
	with (num){
		  if (value==null||value==""){
				alert(msg);
				return false;
		  }		  
		  else{
			  var reg = /^([0-9]{10})$/;
			  
			  if(reg.test(value) == false) {
				    alert(msg);
					return false;
			  }
			  return true;
		  }
	}
}

function validateComboValue(field,msg){
	with(field){
		if(value.search("Select")!=-1){
			alert(msg);
			return false;
		}
		else{
			return true;
		}
	}
}

function validateForm(thisform){
	with (thisform){
		   if(validateName(firstname,"Enter a valid Firstname")==false){
			  firstname.focus();
			  return false;
		  }
		  if(validateName(lastname,"Enter a valid Lastname")==false){
			  lastname.focus();
			  return false;
		  }
		  if (validateReqd(email)==false){
			  email.focus();
			  return false;
		  }
		  if(validatePwd(password,confirmPassword)==false){
			  password.focus();
			  return false;
		  }		 
		  if(validateDate(dob)==false){
			  dob.focus();
			  return false;
		  }
		  if(validateComboValue(gender,"Select your Gender")==false){
			  gender.focus();
			  return false;
		  }
		  if(validateComboValue(serviceplan,"Select a Service-Plan")==false){
			  serviceplan.focus();
			  return false;
		  }
		  if(validateNotNull(address1,"Enter a valid Address")==false){
			  address1.focus();
			  return false;
		  }
		  if(validateNotNull(city,"Enter a valid City")==false){
			  city.focus();
			  return false;
		  }
		  if(validateNotNull(state,"Enter a valid State")==false){
			  state.focus();
			  return false;
		  }
		  if(validateZip(zip,"Enter a valid Zip-code")==false){
			  zip.focus();
			  return false;
		  }
		  if(validatePhone(phone,"Enter a valid Phone-number")==false){
			  phone.focus();
			  return false;
		  }
		  if(validateComboValue(sec_qs,"Select a Security-Question")==false){
			  sec_qs.focus();
			  return false;
		  }
		  if(validateNotNull(sec_ans,"Answer the Security-Question")==false){
			  sec_ans.focus();
			  return false;
		  }
	  }
}