<?php

/**
 * Basic file upload example
 * @author Bramus Van Damme <bramus.vandamme@odisee.be> / Joris Maervoet <joris.maervoet@odisee.be>
 */

$uploaded = false;
$moved = false;
$errorMessage = '';

// a file has been POSTed (could be empty) and it has been uploaded correctly
if (isset($_FILES['avatar']) && ($_FILES['avatar']['error'] === UPLOAD_ERR_OK)) {

    $uploaded = true;

    // check file extension
    if (in_array((new SplFileInfo($_FILES['avatar']['name']))->getExtension(), ['jpeg', 'jpg', 'png', 'gif'])) {

        // store file in this folder
        $moved = @move_uploaded_file($_FILES['avatar']['tmp_name'], __DIR__ . DIRECTORY_SEPARATOR . $_FILES['avatar']['name']);

        if ($moved) {
            // do more things ...
        } else {
            $errorMessage = 'Error while saving file in the uploads folder';
        }
    } else {
        $errorMessage = 'Invalid file extension. Only .jpeg, .jpg, .png or .gif allowed';
    }
}

?>
<?php if ($uploaded) { ?>
    <p>Uploaded file: <?php echo $_FILES['avatar']['name']; ?></p>
    <p>Temp location: <?php echo $_FILES['avatar']['tmp_name']; ?></p>
    <p>Size: <?php echo $_FILES['avatar']['size']; ?></p>
    <?php if ($moved) { ?>
        <p><img src="<?php echo $_FILES['avatar']['name']; ?>" alt=""/><p>
    <?php } else { ?>
        <p><?php echo $errorMessage ?></p>
    <?php } ?>
<?php } ?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <label for="avatar">Avatar: </label>
    <input type="file" name="avatar" id="avatar"/><br/>
    <input type="submit"/>
</form>