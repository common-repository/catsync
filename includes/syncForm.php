<script language="javascript" type="text/javascript">
jQuery(document).ready(function($)
{
	$.configureBoxes({ transferMode: 'move', useFilters: false, useCounters: false, useSorting: false });
});       
</script>

<?php
//Grabs a list of tables in the database
$tables = listTables($dbhost, $dbuser, $dbpwd, $dbname);

//Grabs a list of categories in the database
$cats = listCategories();

/*
//Load last used valued
$source = get_option('source');
$column = get_option('column');
$category = get_option('category');
$sourceInner = get_option('sourceInner');
$destInner = get_option('destInner');
$postCols = get_option('postCols'); */
?>

<form name="syncFrom" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>" >
<h4>Run CatSync</h4>
<p><?php _e("Source Table: " ); ?><select name='source' onchange="showColumn(this.value,'<?php echo WP_PLUGIN_URL;?>')"><option value=''>Select A Table</option>

<?php
foreach ($tables as $value)    //Loop displaying all tables in a drop-down menu
{
    echo "<option value='$value'>$value</option>";
}
?>

</select></p>
<p><?php _e("Source Column (Post Title): " ); ?><select name="column" id="sourceColumn">

<?php
echo "<option value=''>Select A Column Name</option></select></p><p>";

_e("Secondary Post Title: " );

echo '<select name="column2" id="sourceColumn2">';

echo "<option value=''>Select A Column Name</option></select></p>&nbsp;<p>";

_e("Source Columns (Post Content): ");

include('getPostContent.php'); //Dual list gets created here

echo '</p>&nbsp;<p>';

_e("Category: " );

echo "<select name='category'><option value=''>Select A Category</option>";

foreach ($cats as $value)    //Loop displaying all categories in a drop-down menu
{
    echo "<option value='$value->term_id'>$value->name</option>";
}
?>

</select></p>
<p class="submit">
<input type="submit" name="Sync" value="Execute" onClick="populateHiddenField();" />
<input type="submit" name="Append" value="Append Posts" onClick="populateHiddenField();" />
<input type="submit" name="Remove" value="Clear Posts" />
</p>
</form>
