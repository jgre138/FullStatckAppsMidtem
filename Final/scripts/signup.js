function validateMemberId(field) {
    return field === "" ? "Member ID is required.\n" : "";
  }
  
  function validateFirstName(field) {
    return field === "" ? "First Name is required.\n" : "";
  }
  
  function validateLastName(field) {
    return field === "" ? "Last Name is required.\n" : "";
  }
  
  function validateAddress(field) {
    return field === "" ? "Address is required.\n" : "";
  }
  
  function validatePhone(field) {
    return field === "" ? "Phone number is required. \n" : "";
  }
  
  function validateEmail(field) {
    if (field == "") {
        return "Enter Email\n"
    }
    else {
        const dot = field.indexOf(".") > 0
        const att = field.indexOf("@") > 0
        const pattern = /[a-zA-Z0-9._]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}/.test(field)
        return (dot && att && pattern) ? "" : "Invalid Email Format\n"
    }
}

function validatePassword (field) {
    return (field == "" || field.length < 6) ? "Password should be at least 6 characters\n" : ""
}
  
  function validateSignup(form) {
    let result = "";
    result += validateMemberId(form.members_id.value.trim());
    result += validateFirstName(form.first_name.value.trim());
    result += validateLastName(form.last_name.value.trim());
    result += validateAddress(form.address.value.trim());
    result += validatePhone(form.phonenumber.value.trim());
    result += validateEmail(form.email.value.trim());
    result += validatePassword(form.password.value);
  
    if (result === "") {
      return true;
    } else {
      alert("Error in Sign Up:\n" + result);
      return false;
    }
  }