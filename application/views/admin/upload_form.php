<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>

<?php echo form_open_multipart('admin/upload/do_upload');?>

<!-- <form action="http://localhost/AdCivil/admin/upload/do_upload" method="post" accept-charset="utf-8" enctype="multipart/form-data">
<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" /> -->


<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>

</body>
</html>