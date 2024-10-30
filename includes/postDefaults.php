<?php
//load defaults
$commentStatus = get_option('commentStatus');
$pingStatus = get_option('pingStatus');
$menuOrder = get_option('menuOrder');

if ($menuOrder == "")
{
	$menuOrder = 0;
}
?>

<form name="form1" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
<h4>Post Defaults</h4>
<p><?php _e("Comment Status: " ); ?><select name='commentStatus'>

<?php
echo "<option value='$commentStatus'>$commentStatus</option>";

if ($commentStatus == "")
{
    echo "<option value='open'>open</option>";
    echo "<option value='closed'>closed</option>";
}		
elseif ($commentStatus == "closed")
{
    echo "<option value='open'>open</option>";
}
else
{
    echo "<option value='closed'>closed</option>";
}
?>

</select></p>
<p><?php _e("Ping Status: " ); ?><select name='pingStatus'>

<?php
echo "<option value='$pingStatus'>$pingStatus</option>";

if ($pingStatus == "")
{
    echo "<option value='open'>open</option>";
    echo "<option value='closed'>closed</option>";
}
elseif ($pingStatus == "closed")
{
    echo "<option value='open'>open</option>";
}
else
{
    echo "<option value='closed'>closed</option>";
}
?>

</select></p>
<p><?php _e("Menu Order: " ); ?><input type="text" name="menuOrder" value="<?php echo $menuOrder; ?>" size="10"></p>

<p class="submit">
<input type="submit" name="postSettings" value="Save Settings" />
</p>
</form>
