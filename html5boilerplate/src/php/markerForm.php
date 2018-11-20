<!DOCTYPE html>
<html>
<head>
    <title>Add Marker To Panorama</title>
    <!-- use bootswatch-->
    <script type='text/javascript'>
      function validateMarker() {
        var x = document.forms["MarkerForm"]["long"].value;
        var y = document.forms["MarkerForm"]["lat"].value;
        var z = document.forms["MarkerForm"]["tooltipStr"].value;
        var k = document.forms["MarkerForm"]["info"].value;
        if (x == "") {
            alert("Longitude must be filled out");
            return false;
        }
        if (y == "") {
            alert("Latitude must be filled out");
            return false;
        }
        if (z == "") {
            alert("Marker Name must be filled out");
            return false;
        }
        if (k == "") {
            alert("Marker Information name must be filled out");
            return false;
        }
      }
    </script>
</head>

<!-- This form should come up after panoramaForm has been submitted
and panorama has been added to db -->
<body>
    <form id="add-markers" method="POST" action="./panoramaInfo/MarkerUpload.php" name = "MarkerForm" onsubmit="return validateMarker()">
        Longitude (Spherical Coordinate): <input type='number' name='long'>
        <br>
        Latitude (Spherical Coordinate): <input type="number" name="lat">
        <br>
        Marker Name: <input type="text" name="tooltipStr">
        <br>
        Marker Information: <input type="text" name="info"> <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <!-- Inputs should be used to call addMarkerToPan() -->

</body>
</html>
