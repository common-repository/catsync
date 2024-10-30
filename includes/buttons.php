<form name="options" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
  <p class="submit">
    <input type="submit" name="dbSettings" value="Configure Database" />
    <input type="submit" name="manageCat" value="Add Categories" />
    <input type="submit" name="postDefaults" value="Setup Post Defaults" />
    <input type="submit" name="syncForm" value="Sync Posts" />
  </p>
</form>