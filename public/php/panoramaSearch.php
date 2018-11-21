  <?php
  /**
   * Created by PhpStorm.
   * User: Gavin
   * Date: 2018-10-30
   * Time: 12:06 AM
   */

        if (isset($_GET['location'])){
                 $connString = "mysql:host=localhost;dbname=sfview";
                 $user = "sfview_user";
                 $pass = "pass";
                 $pdo = new PDO($connString,$user,$pass);

                 $sql = "SELECT * FROM locations WHERE location = :location";
                 $stmt = $pdo->prepare($sql);
                 $stmt->bindValue(":location", $_GET['location']);
                 $stmt->execute();
                 $row = $stmt->fetch();
                 if(!$row['id']){
                     echo "This location's name does not exist";
                 }else{
                   $fileData = $row['filename'];
                   // The next line will show the panoramas

                   echo '<img src="/panoramas/'.$fileData.'" />';
                if (isset($_SESSION["username"])){
                  $username = $_SESSION["username"];
                  $New_User = new Users($username, "000");
                  $New_User->searchUsername($username, $pdo);
                  if ($New_User->admin == 1){
                    echo '<form action="./panoramaDelete.php" method="POST" enctype="multipart/form-data">
                            <input id = "delete" class="delete" type="hidden" name="delete" value='.$row['location'].'>
                            <button type="submit" class="btn btn-primary">Delete</button>
                          </form>';
                  }
                }

                 }
            }else {
                 echo "Please input the name of the location!";
               }

?>

</div>
</body>
</html>
