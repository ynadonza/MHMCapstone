<?php
// Initialize variables to null.
$error();
// On submitting form below function will execute.
if(isset($_POST['submit'])){
if (empty($_POST["addSupplier"])) {
$error['addSupplier'] = "Supplier is required";
}/* else {
$supplier = test_input($_POST["addSupplier"]);
// check name only contains letters and whitespace
if (!preg_match("/^[a-zA-Z ]*$/",$supplier)) {
$addSupplier = "Only letters and white space allowed";
}
}*/
if (empty($_POST["productType"])) {
$error['productType'] = "Type of product is required";
} /*else {
$email = test_input($_POST["email"]);
// check if e-mail address syntax is valid or not
if (!preg_match("/([w-]+@[w-]+.[w-]+)/",$email)) {
$emailError = "Invalid email format";
}
}*/
if (empty($_POST["prod_name"])) {
$error['prod_name'] = "Product name is required";
} else {
$website = test_input($_POST["website"]);
// check address syntax is valid or not(this regular expression also allows dashes in the URL)
if (!preg_match("/b(?:(?:https?|ftp)://|www.)[-a-z0-9+&@#/%?=~_|!:,.;]*[-a-z0-9+&@#/%=~_|]/i",$website)) {
$websiteError = "Invalid URL";
}
}
if (empty($_POST["comment"])) {
$comment = "";
} else {
$comment = test_input($_POST["comment"]);
}
if (empty($_POST["gender"])) {
$genderError = "Gender is required";
} else {
$gender = test_input($_POST["gender"]);
}
}
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
//php code ends here
?>