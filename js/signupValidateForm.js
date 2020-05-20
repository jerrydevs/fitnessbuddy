function signupValidateForm() {

      // signup variables
      var signupFirstName = document.forms["signupForm"]["firstName"].value;
      var signupLastName = document.forms["signupForm"]["lastName"].value;
      var signupPassword = document.forms["signupForm"]["password"].value;
      var signupPasswordConfirm = document.forms["signupForm"]["passwordConfirm"].value;
      // signup Regex
      const specialCharRegEx = /^[a-z0-9]+$/i;

      // Signup Validation

      // if any of the input fields are empty , report error
      if (signupFirstName == "" || signupLastName == '' || signupPassword == '' || signupPasswordConfirm == '') {
        alert("Input Fields Must Be Filled Out !");
        return false;
      }

       // if firstname , lastname , password or passwordConfirm have special characters , report error
      if ( specialCharRegEx.test(signupFirstName) == false || 
      	   specialCharRegEx.test(signupLastName) == false || 
      	   specialCharRegEx.test(signupPassword) == false || 
      	   specialCharRegEx.test(signupPasswordConfirm) == false){

      	alert("No Special Characters Allowed !");
      	return false;
      }
    
      // if password isn't longer than 5 characters
      if ( signupPassword.length < 5 ){
      	alert("Password must be at least 5 characters !");
      	return false;
      }

      if ( signupPasswordConfirm != signupPassword ) {
      	alert("Passwords Don't Match !");
      	return false;
      }


}