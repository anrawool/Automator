<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <title>All Folders</title>
    <style>

h1 {
    margin: 20px;
    font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
      "Lucida Sans Unicode", Geneva, Verdana, sans-serif;;
    text-decoration: underline;
}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 50%;
  max-width: 800px;
  margin: 10px 20px;
  border-radius: 2px;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
<?php include'inc/header.php';?>

<h1>Files:</h1>


<table class="table table-dark table-striped">
  <tr>
    <th>Sl.</th>
    <th>Folder Name</th>
    <th>File Name</th>
    <th>Type</th>
  </tr>
  
  <?php
    $gdir = $_GET['dir'];
//   echo $filecount . "files ";
    
    $mydir = scandir("/Applications/MAMP/htdocs/PHP File Automator/$gdir");
    $sl = 1;
    
    foreach ($mydir as $dir) {
        $scanFilesDir = scandir("/Applications/MAMP/htdocs/PHP File Automator/$gdir/");
        
        if(substr($dir, 0, 1) != "." and is_dir($dir)) {
            foreach ($scanFilesDir as $file) {
                $ext = pathinfo($file, PATHINFO_EXTENSION);
                if(substr($file, 0, 1) != ".") {
                    if(strpos($file, ".")) {
                        echo "<tr>";
                        echo "<td>";
                        echo $sl;
                        echo "</td>";
                        echo "<td>";
                        echo $dir;
                        echo "</td>";
                        echo "<td>";
                        echo $file;
                        echo "</td>";
                        echo "<td>";
                        echo "." . $ext;
                        echo "</td>";
                        echo "</tr>";
                        $sl++;
                    }
                }
            }
    }
        
        
    }
    ?>
</table>


<h1>Folders:</h1>


<table class="table table-dark table-striped">
  <tr>
    <th>Sl.</th>
    <th>Folder Name</th>
  </tr>
  
  <?php
    $gdir = $_GET['dir'];
//   echo $filecount . "files ";
    
    $mydir = scandir("/Applications/MAMP/htdocs/PHP File Automator/$gdir");
    $sl = 1;
    
    foreach ($mydir as $dir) {
        $scanFilesDir = scandir("/Applications/MAMP/htdocs/PHP File Automator/$gdir/");
        
        if(substr($dir, 0, 1) != "." and is_dir($dir)) {
            foreach ($scanFilesDir as $folder) {
                if(substr($folder, 0, 1) != ".") {
                    if(!strpos($folder, ".")) {
                        echo "<tr>";
                        echo "<td>";
                        echo $sl;
                        echo "</td>";
                        echo "<td>";
                        echo $folder;
                        echo "</td>";
                        echo "</tr>";
                        $sl++;
                    }
                }
            }
    }
        
        
    }
    ?>
</table>


</body>
</html>