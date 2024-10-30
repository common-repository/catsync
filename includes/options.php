<?php
//Grabs post data from dbSettings form and sets it equal to their
//respective variables.  Also, stores the values in the database
//for use later on.
if (isset($_POST['dbOptions']))
{
    $dbhost = $_POST['dbhost'];
    update_option('dbhost', $dbhost);

    $dbname = $_POST['dbname'];
    update_option('dbname', $dbname);

    $dbuser = $_POST['dbuser'];
    update_option('dbuser', $dbuser);
		
    $dbpwd = $_POST['dbpwd'];
    update_option('dbpwd', $dbpwd);
	
	if ($dbhost == "" || $dbname == "" || $dbuser == "" || $dbpwd == "")
	{
		echo "<div class='updated'><p><strong> Options not saved!  Please make sure all fields are complete</strong></p></div>";
	}
	else
	{
		echo "<div class='updated'><p><strong> Database Options Saved!</strong></p></div>";
	}
}
else
{
    $dbhost = get_option('dbhost');
    $dbname = get_option('dbname');
    $dbuser = get_option('dbuser');
    $dbpwd = get_option('dbpwd');
}

//Grabs post data from postDefaults form and sets it equal to their
//respective variables.  Also, stores the values in the database
//for use later on.
if (isset($_POST['postSettings']))
{
    $commentStatus = $_POST['commentStatus'];
    update_option('commentStatus', $commentStatus);
		
    $pingStatus = $_POST['pingStatus'];
    update_option('pingStatus', $pingStatus);
		
    $menuOrder = $_POST['menuOrder'];
    update_option('menuOrder', $menuOrder);
		
    echo "<div class='updated'><p><strong>Post Defaults Saved!</strong></p></div>";
}
else
{
    $commentStatus = get_option('commentStatus');
    $pingStatus = get_option('pingStatus');
    $menuOrder = get_option('menuOrder');
}

/*  This is the bulk of the code that is executed when
a user clicks the 'Sync' button.  First, we grab all the
data submitted in the form and save them to the database.
Next, we connect to the source database.  Then, we clear
any pre-existing posts under the currently selected category.
Finally, we import the new list of posts.  */
if (isset($_POST['Sync']))
{
    $source = $_POST['source'];
    update_option('source', $source);
		
    $column = $_POST['column'];
    update_option('column', $column);
	
	$column2 = $_POST['column2'];
    update_option('column2', $column2);
		
    $category = $_POST['category'];
    update_option('category', $category);
		
    $postCols = $_POST['selectColumns'];
    update_option('postCols', $postCols);
		
    $sourceInner = $_POST['sourceInner'];
    update_option('sourceInner', $sourceInner);
		
    $destInner = $_POST['destInner'];
    update_option('destInner', $destInner);
		
    //Initiates source database connection
    $conn = dbConnect($dbhost, $dbuser, $dbpwd);
		
    //Since this is a sync, clear pre-existing posts of the same category
    clearPosts ($category);
		
    //Insert the posts using the selected category and post options
    insertPosts ($source, $column, $column2, $postCols, $dbname, $conn, $commentStatus, $pingStatus, $menuOrder, $category);
		
    echo "<div class='updated'><p><strong>Sync Completed Successfully!</strong></p></div>";
}
elseif (isset($_POST['Append']))    //Appends post to the current Category
{
    $source = $_POST['source'];
    update_option('source', $source);
		
    $column = $_POST['column'];
    update_option('column', $column);
	
	$column2 = $_POST['column2'];
    update_option('column2', $column2);
	
    $category = $_POST['category'];
    update_option('category', $category);
		
    $postCols = $_POST['selectColumns'];
    update_option('postCols', $postCols);
		
    $sourceInner = $_POST['sourceInner'];
    update_option('sourceInner', $sourceInner);
		
    $destInner = $_POST['destInner'];
    update_option('destInner', $destInner);
		
    //Initiates source database connection
    $conn = dbConnect($dbhost, $dbuser, $dbpwd);
		
    //Inserts the posts using the selected category and post options
    insertPosts ($source, $column, $postCols, $dbname, $conn, $commentstatus, $pingStatus, $menuOrder, $category);
		
    echo "<div class='updated'><p><strong>Append Posts Completed Successfully!</strong></p></div>";
}
elseif (isset($_POST['Remove']))    //Remove all posts from the selected category
{
    $category = $_POST['category'];
    update_option('category', $category);
		
    //Initiates source database connection
    $conn = dbConnect($dbhost, $dbuser, $dbpwd);
		
    //Removes all posts under the selected category
    clearPosts ($category);
		
    echo "<div class='updated'><p><strong>Clear Posts Completed Successfully!</strong></p></div>";
}

//Allows the user to add a new category
if (isset($_POST['addCategory']))
{
    $category = $_POST['category'];
    $parent = $_POST['parent'];
		
    addCategory($category, $parent);
		
    echo "<div class='updated'><p><strong>Category Added!</strong></p></div>";
}
?>
