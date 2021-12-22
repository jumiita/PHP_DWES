<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        img{
            width: 500px;
            height: 500px;
        }
    </style>
</head>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="image"/>
    <input type="submit" name="submit" value="UPLOAD"/>
    <img src="/img/eternals.jpeg">
</form>
</body>
</html>