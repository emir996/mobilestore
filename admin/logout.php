<?php
//Simple logout page with user class and method for logout
require "../config.php";
User::logout();
header("location: index.html");