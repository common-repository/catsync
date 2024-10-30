<?php
$cats = listCategories();
?>

<form name="form1" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">

<h4>Add A Category</h4>
<p><?php _e("Enter Name of Category: " ); ?><input type="text" name="category" value="" size="20"></p>
<p>
<?php _e("Category Parent: " ); ?><select name='parent'><option value='0'>None</option>

<?php
foreach ($cats as $value)
{
    echo "<option value='$value->term_id'>$value->name</option>";
}
?>

</select></p>
<p class="submit">
<input type="submit" name="addCategory" value="Add Category" />
</p>
</form>