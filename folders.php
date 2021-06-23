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
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand active" href="index.php">Main</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link" aria-current="page" href="folders.php">Folders</a>
            <a class="nav-link" href="#">Files</a>
        </div>
        </div>
    </div>
</nav>

<h1>Folders:</h1>


<table class="table table-dark table-striped">
  <tr>
    <th>Sl.</th>
    <th>Name</th>
    <th>Items</th>
  </tr>
  
  <?php
    
//   echo $filecount . "files ";
    
    $mydir = scandir("/Applications/MAMP/htdocs/PHP File Automator");
    $sl = 1;
    
    foreach ($mydir as $dir) {
        $scanFilesDir = scandir("/Applications/MAMP/htdocs/PHP File Automator/$dir/");
        
        if(substr($dir, 0, 1) != "." and is_dir($dir)) {
            echo "<tr>";
            echo "<td>";
            echo $sl;
            echo "</td>";
            echo "<td>";
            echo "<a href=\"./$dir\" style=\"color: white;\">";
            echo $dir;
            echo "</a>";
            echo "</td>";
            echo "<td name=\"items\">";
            foreach ($scanFilesDir as $file) {
              $maxRuns = 0;
                if(substr($file, 0, 1) != ".") {
                    if(strpos($file, ".")) {
                      echo  "<a href=\"./$dir/$file\" style=\"color: rgb(105, 178, 247); text-decoration: none;\">" . ucwords($file). "</a>  ";
                    }
                }
                $maxRuns++;
                if($maxRuns === 7) {
                    echo "<a href=\"./all_files.php?dir=$dir\" style=\"color: grey; text-decoration: none;\"> ...</a>";
                    break;
                    $maxRuns = 0;
                }
            }
            
            echo "</td>";
            echo "</tr>";
            $sl++;
    }
        
        
    }
    ?>
</table>

</body>
</html>