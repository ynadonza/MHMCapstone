
// SELECTING ALL TEXT ELEMENTS
var supplier = getElementById('supplier').value();
var email = getElementById('email').value();
var contact = getElementById('contact').value();
var street = getElementById('street').value();
var brgy = getElementById('brgy').value();
var city = getElementById('city').value();
var province = getElementById('province').value();
var zip = getElementById('zip').value();

/*// SELECTING ALL ERROR DISPLAY ELEMENTS
var name_error = document.getElementById('name_error');
var email_error = document.getElementById('email_error');
var password_error = document.getElementById('password_error');
var contact_error = document.getElementById('contact_error');*/
/*// SETTING ALL EVENT LISTENERS
supplier.addEventListener('blur', supplierVerify, true);
email.addEventListener('blur', emailVerify, true);
password.addEventListener('blur', passwordVerify, true);
contact.addEventListener('blur', contactVerify, true);
// validation function*/
function Validate() {
  // validate username
  if (supplier.value == "") {
    supplier.style.border = "1px solid red";
    document.getElementById('supplier_error').innerHTML = "** Supplier name is required";
    return false;
  }
  if (/^[a-zA-Z.& ]*$/.test(supplier.value) == false) {
    supplier.style.border = "1px solid red";
    supplier_error.textContent = " *Supplier name must not contain numeric characters";
    supplier.focus();
    return false;
  }
  if (supplier.value.trim().length==0) {
    supplier.style.border = "1px solid red";
    supplier_error.textContent = "*Supplier name should not consist of spaces only";
    supplier.focus();
    return false;
  }
  if (supplier.value.length < 3) {
    supplier.style.border = "1px solid red";
    supplier_error.textContent = "*Supplier name must be at least 3 characters";
    supplier.focus();
    return false;
  }

  // validate email
  if (email.value == "") {
    email.style.border = "1px solid red";
    email_error.textContent = "*Email is required!!!!";
    email.focus();
    return false;
  }
  if (email.value.indexOf('@') <= 0) {
    email.style.border = "1px solid red";
    email_error.textContent = "*Invalid email address format";
    email.focus();
    return false;
  }
  // validate password
  if (password.value == "") {
    password.style.border = "1px solid red";
    password_confirm.style.border = "1px solid red";
    password_error.textContent = "Password is required";
    password.focus();
    return false;
  }
  // check if the two passwords match
  if (password.value != password_confirm.value) {
    password.style.border = "1px solid red";
    password_confirm.style.border = "1px solid red";
    password_error.innerHTML = "The two passwords do not match";
    return false;
  }
  // check contact number
  if (isNaN(contact.value)) {
    contact.style.border = "1px solid red";
    contact_error.textContent = "You have entered an invalid contact number!";
    contact.focus();
    return false;
  }
  if (!contact.value.match(/^\d{11}$/)) {
    contact.style.border = "1px solid red";
    contact_error.textContent = "11 digits only";
    contact.focus();
    return false;
  }

}

/*// event handler functions
function supplierVerify() {
    
    if (supplier.value != "") {
      supplier.style.border = "1px solid #5e6e66";
      supplier_error.innerHTML = "";
      return true;
    }
    if (/^[a-zA-Z]*$/.test(supplier.value) == true) {
      supplier.style.border = "1px solid #5e6e66";
      supplier_error.innerHTML = "";
      return true;
    }
}
function emailVerify() {
  if (email.value != "") {
    email.style.border = "1px solid #5e6e66";
    email_error.innerHTML = "";
    return true;
  }
}
function passwordVerify() {
  if (password.value != "") {
    password.style.border = "1px solid #5e6e66";
    password_error.innerHTML = "";
    return true;
  }
  if (password.value === password_confirm.value) {
    password.style.border = "1px solid #5e6e66";
    password_error.innerHTML = "";
    return true;
  }
}
function contactVerify() {
  if (contact.value != "") {
    contact.style.border = "1px solid #5e6e66";
    contact_error.innerHTML = "";
    return true;
  }
   if (contact.value.match(/^\d{11}$/)) {
    contact.style.border = "1px solid red";
    contact_error.textContent = "";
    contact.focus();
    return true;
  }*/

  
}