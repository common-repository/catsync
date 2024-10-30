<form name="options" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">

<table align="center" cellpadding="5">
  <tr>
    <td colspan="2" align="center" valign="top" nowrap="nowrap"><h3>Source Database Settings</h3></td>
  </tr>
  <tr>
    <td align="left" valign="bottom" nowrap="nowrap"><?php _e("DB Host: " ); ?></td>
	<td align="left" valign="bottom" nowrap="nowrap">
	<input type="text" name="dbhost" value="<?php echo $dbhost; ?>" size="20"></td>
  </tr>
  <tr>
    <td align="left" valign="bottom" nowrap="nowrap"><?php _e("DB Name: " ); ?></td>
	<td align="left" valign="bottom" nowrap="nowrap">
	<input type="text" name="dbname" value="<?php echo $dbname; ?>" size="20"></td>
  </tr>
  <tr>
    <td align="left" valign="bottom" nowrap="nowrap"><?php _e("Username: " ); ?></td>
	<td align="left" valign="bottom" nowrap="nowrap">
	<input type="text" name="dbuser" value="<?php echo $dbuser; ?>" size="20"></td>
  </tr>
  <tr>
    <td align="left" valign="bottom" nowrap="nowrap"><?php _e("Password: " ); ?></td>
	<td align="left" valign="bottom" nowrap="nowrap">
    <input type="password" name="dbpwd" value="<?php echo $dbpwd; ?>" size="20"></td>
  </tr>
  <tr>
    <td class="submit"><input type="submit" name="dbOptions" value="Save Settings" /></td>
  </tr>
</table>
</form>
</br>