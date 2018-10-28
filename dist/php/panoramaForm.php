<!DOCTYPE html>
<html>
<head>
    <title>Add Panorama</title>
    <!-- use bootswatch-->
</head>

<body>
    <form id="add-panorama" action="panoramaUpload.php" method="POST" enctype="multipart/form-data">
        Location Name: <input type="text" name="locationName">
        <br>
        Panorama: <input type="file" name="pan" id="pan">  
        <br>
        <input type="submit" value="Submit" id="submit-button">
    </form>

    <!-- php logic (put in panoramaUpload.php): image is added to db, we retrieve image from db and create 
    a panorama. we show this panorama to the user and ask them to add markers -->

    <!-- once this form has been submitted, user should be directed to markerForm.php -->

</body>


</html>