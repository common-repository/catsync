<?php
//Inititates source database connection
function dbConnect($dbhost, $dbuser, $dbpwd)
{
    $conn = mysql_connect($dbhost, $dbuser, $dbpwd);
    return $conn;
}

//List all the column headings for a table
function listColumnHeadings($dbhost, $dbuser, $dbpwd, $dbname, $tableName)
{
    $conn = dbConnect($dbhost, $dbuser, $dbpwd);
   
    $query = "SHOW COLUMNS FROM $dbname.$tableName";
    
    $result = mysql_query($query, $conn);

    while ($column = mysql_fetch_row($result))
    {
        $columns[] = $column[0];
    }

    return $columns;
}

//Lists all tables in the source database
function listTables($dbhost, $dbuser, $dbpwd, $dbname)
{
    $conn = dbConnect($dbhost, $dbuser, $dbpwd);
	
    $query = "SHOW TABLES FROM $dbname";
    
    $result = mysql_query($query, $conn);		
	
    while ($table = mysql_fetch_row($result))
    {
        $tables[] = $table[0];
    }
	
    return $tables;
}

//Lists all Categories
function listCategories()
{
    $args = array(
                    'type' => 'post',
                    'orderby' => 'name',
                    'order' => 'ASC',
                    'hide_empty' => false);
		
    $cats = get_terms('category', $args);
	
    return $cats;
}
	
//Adds a category
function addCategory ($category, $parent)
{
    wp_create_category($category, $parent);
}

/*  Deletes all posts under a selected category
WARNING: Will delete ALL posts under the selected category even if post
belongs to multiple categories  */
function clearPosts ($category)
{
    //This will allow the function to run indefinately, but its not exactly a good idea
    set_time_limit(0);
	
    $args = array('category' => $category, 'numberposts' => -1);
		
    $posts = get_posts($args);
	
    foreach ($posts as $value)
    {
        wp_delete_post($value->ID);
    }
}

//Creates a new post for each row in the source table.
//It uses the Source Column selected to populate the post_title and post_name
function insertPosts ($source, $column, $column2, $postCols, $dbname, $conn, $commentstatus, $pingStatus, $menuOrder, $category)
{
    //This will allow the function to run indefinitely, but its not exactly a good idea
    set_time_limit(0);
	
    get_currentuserinfo();
		
    //$postCols contains all the column names.
    //First column is the column heading and rest of the columns make up the post content
    $contentColArray = explode(' ', trim($postCols));
    $queryCols = implode(", ", $contentColArray);
	
	if ($column2 == "")
	{
		$col2 = "";
	}
	else
	{
		$col2 = ", $column2";
	}
		
    $query = "SELECT DISTINCT $queryCols" . $col2 . " 
	          FROM `$dbname`.`$source`
	          ORDER BY `$source`.`$column` DESC";
					
    $result = mysql_query($query, $conn) or die(mysql_error());
		
    while ($row = mysql_fetch_array($result))
    {
        $postContent = generatePostContent($row, $contentColArray);
		
		$post_title = ucwords($row["$column"]) . " " . ucwords($row["$column2"]);
				
        $args = array(
                       'post_author' => $current_user->ID,
                       'post_title' => $post_title,			  
                       'post_status' => 'publish',
                       'comment_status' => $commentStatus,
                       'ping_status' => $pingStatus,
                       'post_name' => $post_title,
                       'post_parent' => 0,
                       'menu_order' => $menuOrder,	
                       'post_category' => array($category),
                       'post_content' => $postContent);
	
        wp_insert_post($args);
    }
}

//Generates the content of a post. The current implementation generates a post like this:
/*
	Post heading
	Column1:ColumnData
	Column2:ColumnData
	Column3:ColumnData
*/
function generatePostContent($row, $contentColArray)
{
    $content = "";

    for ($i = 1; $i < count($contentColArray); $i++)
    {
        $content .= $contentColArray[$i] . ": " . $row[$i] . "<br/>";
    }
	
    return $content;	
}
?>
