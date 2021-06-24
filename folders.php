<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.4/tailwind.min.css" integrity="sha512-ifsLB5FigXH07aADF1bmVX8B66KrNLZGT6RY9HPN3hTn9eaP+t16azYMAuULHZJyR8zC4O5Vt/76YZG6jNktIA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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


<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-20">
      <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Folders</h1>
    </div>
    <div class="lg:w-2/3 w-full mx-auto overflow-auto">
      <table class="table-auto w-full text-left whitespace-no-wrap">
        <thead>
          <tr>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">Sl.</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Name</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Items</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Version</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Type</th>
          </tr>
        </thead>
        <tbody>
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
            echo "<a href=\"./$dir\" class=\"w-10 text-center text-gray-900 text-lg\">";
            echo $dir;
            echo "</a>";
            echo "</td>";
            echo "<td name=\"items\">";
            foreach ($scanFilesDir as $file) {
              $maxRuns = 0;
                if(substr($file, 0, 1) != ".") {
                    if(strpos($file, ".")) {
                      echo  "<a href=\"./$dir/$file\" class=\"px-4 py-3 text-lg text-gray-900\">" . ucwords($file). "</a>  ";
                    }
                }
                $maxRuns++;
                if($maxRuns === 7) {
                    echo "<a href=\"./all_files.php?dir=$dir\" class=\"px-4 py-3 text-lg text-gray-900\"> ...</a>";
                    break;
                    $maxRuns = 0;
                }
            }
            
            echo "</td>";
            echo "<td class=\"text-center\">";
            $jsonVersion = file_get_contents("$dir/version.json");
            $decodedJsonVersion = json_decode($jsonVersion, true);
            // var_dump($decodedJsonVersion);
            echo $decodedJsonVersion['info'][0][version];
            // echo $type;
            echo "</td>";
            echo "<td class=\"text-center\">";
            echo $decodedJsonVersion['info'][0][type];
            echo "</td>";
            echo "</tr>";
            $sl++;
    }
        
        
    }
    ?>
        </tbody>
      </table>
    </div>
    
  </div>
</section>

</body>
</html>