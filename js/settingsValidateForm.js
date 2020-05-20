function settingsValidateForm() {

	  // settings variables	
      var settingsFirstName = document.forms["settingsForm"]["firstname"].value;
      var settingsLastName = document.forms["settingsForm"]["lastname"].value;
      var settingsGender = document.forms["settingsForm"]["gender"].value;
      var settingsWeight = document.forms["settingsForm"]["goalweight"].value;

      // settings Regex
      const specialCharRegEx = /^[a-z0-9]+$/i;
      const numbersRegex = /^\d*\.?\d*$/

      // Settings Validation

      // if any of the input fields are empty , report error
      if (settingsFirstName == "" || settingsLastName == '' || settingsGender == '' || settingsWeight == '') {
        alert("Input Fields Must Be Filled Out !");
        return false;
      }

      // if firstname , lastname , gender or weight have special characters , report error
      if ( specialCharRegEx.test(settingsFirstName) == false || 
      	   specialCharRegEx.test(settingsLastName) == false || 
      	   specialCharRegEx.test(settingsGender) == false ){

      	alert("No Special Characters Allowed !");
      	return false;
      }

      // make sure weight is only numbers
      if ( numbersRegex.test(settingsWeight) == false ){
            alert("You must input your weight in terms of numbers !");
      }

}