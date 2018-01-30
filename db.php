<?php
$connection = mysql_connect("localhost", "sirenko", "123");
$db = mysql_select_db ("weather");
mysql_query ("SET NAMES 'utf8' "); // mysql_set_charset | "utf8");
if(!$connection || !$db)
{
exit(mysql_error());
}
?>

