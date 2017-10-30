<html>
<head>
<title>Update User</title>
</head>
<body>



<?php echo form_open_multipart('User_Controller/update_user');?>
First Name: 
<input type="text" name="first_name" size="20" />
Last Name: 
<input type="text" name="last_name" size="20" />

<br /><br />

<input type="submit" value="Update" />

</form>

<hr>

<?php echo form_open_multipart('User_Controller/update_password');?>

Password: 
<input type="password" name="password" size="20" />

<br /><br />

<input type="submit" value="Update" />

</form>

</body>
</html>