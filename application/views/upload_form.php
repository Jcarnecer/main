<html>
<head>
<title>Change Avatar </title>
</head>
<body>

<?php echo $error;?>

<?php echo form_open_multipart('upload_controller/do_upload');?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>

</body>
</html>