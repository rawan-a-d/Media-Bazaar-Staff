<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style/main.css">
        <title>Forum</title>
        
    </head>
    <body>
        <?php 
            if(isset($_GET['submit'])){
                $uid = $_GET["uid"];
            }
        ?>
        <form action="info.php" method="GET" >
            <input type="text" name="uid">
            <input type="submit" value="submit" name="submit">
        </form>
    </body>
</html>