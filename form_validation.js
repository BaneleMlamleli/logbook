//20201028 - Created clientsideUserFormValidation.js - Banele
// clientside form form_validation

var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
var numericExpression = /^[0-9]+$/;
var alphaExp = /^[a-zA-Z]+$/;

function validation() {
    var reg_number = document.getElementById("companyNumber");
    var compName = document.getElementById("companyName");
    var compType = document.getElementById("companyType");
    var compEmail = document.getElementById("companyEmail");
    var yrFounded = document.getElementById("yearFounded");
    var compCEO = document.getElementById("ceo");
    // removing spaces and checking if the field is empty
    if (!(reg_number.value.trim() == "" || compName.value.trim() == "" || compType.value.trim() == "" ||
        compEmail.value.trim() == "" || yrFounded.value.trim() == "" || compCEO.value.trim() == "")) {
        // validating if it is numbers or not
        if (yrFounded.value.match(numericExpression)) {
            //checking for all letters
            if (compName.value.match(alphaExp) || compCEO.value.match(alphaExp)) {
                //checking length of the ID
                if (compEmail.value.match(mailformat)) {
                    return true;
                }
                alert("Incorrect email address format");
                return false;
            } else {
                alert("Field must only be letters!");
                return false;
            }
        } else {
            alert("Field expect numbers only!");
            return false;
        }
    } else {
        alert("Field cannot be left empty!");
        return false;
    }
}

function loginValidation(){
    var usrEmail = document.getElementById("email");
    var usrPassword = document.getElementById("password");

    if (!(usrEmail.value.trim() == "" || usrPassword.value.trim() == "")) {
        if (usrEmail.value.match(mailformat)) {
            return true;
        }
        alert("Incorrect email address format");
        return false;
    }else{
        alert("Field cannot be left empty!");
        return false;
    }
}

function registerUserValidation() {
    var name = document.getElementById("firstname");
    var surname = document.getElementById("lastname");
    var dateOfBirth = document.getElementById("dob");
    var emailAddress = document.getElementById("email");
    var pssword = document.getElementById("password");
    var confirmPssword = document.getElementById("confirmPassword");
    var genderMale = document.getElementById("gender_male").checked;
    var genderFemale = document.getElementById("gender_female").checked;
    // removing spaces and checking if the field is empty
    if (!(name.value.trim() == "" || surname.value.trim() == "" || dateOfBirth.value.trim() == "" ||
        emailAddress.value.trim() == "" || confirmPssword.value.trim() == "" || pssword.value.trim() == "")) {
        //checking for all letters
        if (name.value.match(alphaExp) || surname.value.match(alphaExp)) {
            //checking if there is a selection made on the radio buttons
            if (genderMale || genderFemale) {
                if (pssword.value === confirmPssword.value) {
                    if (pssword.value.length >= 4) {
                        if (emailAddress.value.match(mailformat)) {
                            return true;
                        }
                        alert("Incorrect email address format");
                        return false;
                    } else {
                        alert("Minimum password length is 4");
                        return false;
                    }
                } else {
                    alert("Password does not match!");
                    return false;
                }
            } else {
                alert("Gender field must be selected");
                return false;
            }
        } else {
            alert("Field must only be letters!");
            return false;
        }
    } else {
        alert("Field cannot be left empty!");
        return false;
    }
}

function disableFields(){
    var usrType = document.getElementById("user_type").value;
    if(usrType === "Mentor"){
        document.getElementById("studentNumber").value = "N/A";
        document.getElementById("yearOfStudy").value = "N/A";
        //diabling the fields if the selected user is a mentor
        document.getElementById("studentNumber").disabled = true;
        document.getElementById("yearOfStudy").disabled = true;
    }
}