<?php
/*
This script populates column names in the drop down using ajax call from syncForm.php
*/
include('../../../../wp-blog-header.php'); //included to get wp inbuilt functions
include('../functions.php');
include('options.php');

if(isset($_GET['table']))
{
    $tableName = $_GET['table'];

    if ($tableName == '')
    {
        $val = "<option value=''>Select A Column Name</option>";
    }
    else
    {								
        $columns = listColumnHeadings($dbhost, $dbuser, $dbpwd, $dbname, $tableName);

        foreach($columns as $column)
        {
            $val .= "<option value='$column'>$column</option>";
        }
    }
	
	echo $val;
}
?>
