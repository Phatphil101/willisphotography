<?php

$where_form_is="http://".$_SERVER['SERVER_NAME'].strrev(strstr(strrev($_SERVER['PHP_SELF']),"/"));

// Checkbox handling
$field_4_opts = $_POST['field_4'][0].",". $_POST['field_4'][1];

mail("willisshots@gmail.com","phpFormGenerator - Form submission","Form data:

Name: " . $_POST['field_1'] . " 
Location for Pictures to be taken: " . $_POST['field_2'] . " 
Your Phone Number: " . $_POST['field_3'] . " 
May we text your Reminder?: $field_4_opts
Session Length: " . $_POST['field_5'] . " 
Date : " . $_POST['field_6'] . " 
Disk Desired: " . $_POST['field_7'] . " 
Extra Disks: " . $_POST['field_8'] . " 
Size of Party: " . $_POST['field_9'] . " 


 powered by phpFormGenerator.
");

include("confirm.html");

?>