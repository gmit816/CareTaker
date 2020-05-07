<?php
$con=mysql_connect("localhost","root","");
if(!$con)
{
    echo "Something went Wrong. Please Check your network connection.";
}
mysql_select_db("caretaker",$con);