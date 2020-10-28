//20190612 - Created clientsideUserFormValidation.js - Banele

// clientside form form_validation
function validation() {
    var reg_number = document.getElementById("companyNumber");
    var compName = document.getElementById("companyName");
    var compType = document.getElementById("companyType");
    var compEmail = document.getElementById("companyEmail");
    var yrFounded = document.getElementById("yearFounded");
    var compCEO = document.getElementById("ceo");
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var numericExpression = /^[0-9]+$/;
    var alphaExp = /^[a-zA-Z]+$/;
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