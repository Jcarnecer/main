<html>
<head>
<title>Change Avatar </title>
</head>
<body>

<hr>
<?php echo form_open_multipart('upload_controller/do_upload');?>
Upload Avatar
<br>
<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>
<hr>
<?php echo $error;?>
</body>
</html>