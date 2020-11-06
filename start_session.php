<?php
session_start();
$_SESSION["Email"] = "intern@cipher.com";
$_SESSION["userType"] = "Intern";
$_SESSION["Name"] = "intern";
$_SESSION["Surname"] = "intern";
$_SESSION["Password"] = "827ccb0eea8a706c4c34a168";

$email = "youremail@example.com";
$ex = ucwords(explode('.', $email)[0]);
echo ucwords(explode('@', explode('.', $email)[0])[1]);

$randomMentors = array("James Cutter", "Looney Tunes", "Siphosethu Mhlanga", "Cipher Breaker", "Tania Mlamleli", "Caroline Mokhoathi", "Michael Booty", "Last Born");
echo $randomMentors[rand(0,7)];

?>