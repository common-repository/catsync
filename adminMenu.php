<?php
include('functions.php');
include('includes/options.php');
?>

<div class="wrap">
<h2><a>CatSync</a></h2>

<?php
//Navigation Bar
include('includes/buttons.php');

echo "<hr />";

if (isset($_POST['dbSettings']))
{		
    include('includes/dbSettings.php');    //Show the database settings form
}
elseif (isset($_POST['syncForm']))                     //Show the sync form
{
    include('includes/syncForm.php');
}
elseif (isset($_POST['manageCat']))                    //Show the category management form
{
    include('includes/manageCat.php');
}
elseif (isset($_POST['postDefaults']))                 //Show the post settings form
{
    include('includes/postDefaults.php');
}
else
{
    echo "<p>1) Complete the database settings form.</p>
          <p>2) Add/manage any new categories to be used</p>
          <p>3) Setup your post defaults</p>
          <p>4) Use the sync form to sync, append, or remove posts</p>";
}

echo '<hr /></div>';
?>