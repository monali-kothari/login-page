<?php
 session_start(); 
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "monali";
 $dbpass = "rajniko";
 $db = "a_database";
 
 
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n"
 . $conn -> error);
 
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>