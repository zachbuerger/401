// I guess we should just make a function and then 
// create private functions for all the validations
// we want to implement


// return 1 or 0 based on result
function isEmail(formName, formQuery) {
    var x=document.forms[formName][formQuery].value;
    var atpos=x.indexOf("@");
    var dotpos=x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
      return false;
    }
 }

// function used to check field requirements
function checkRequired() {
    var t= isEmail("new", "Email");
    
    if (t==false) {
        document.getElementById('EMAIL_REQUIRED').innerHTML = "<span style='color:red'> wrong format </span>";
        alert("The email you provided is invalid. Please fix this field and submit the form again.");
       //document.getElementById('EMAIL_REQUIRED').style.visibility='visible'; 
       return false;
     }
}

