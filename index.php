<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>PHP Project Automator</title>
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
    <div class="form" style="margin: 0 auto; max-width: 700px; border: 2px solid; padding: 20px; border-radius: 10px; margin-top: 100px;">
        <form method="post" action="create.php">
        <fieldset>
            <legend>Form</legend>
            <div class="mb-3">
            <label for=" TextInput" class="form-label">Project Name</label>
            <input type="text" id=" TextInput" class="form-control" placeholder="Project Name (Whitespaces are not allowed at the end)" name="project_name" autocomplete="off">
            </div>
            <div class="mb-3">
            <label for=" Select" class="form-label">Project Type</label>
            <select id=" Select" class="form-select" name="project_type">
                <option>Basic</option>
                <option>Basic + DB</option>
                <option>Laravel</option>
                <option>Advanced</option>
                <option>Website</option>
                <option>Web Application</option>
            </select>
            </div>
            <button type="submit" class="btn btn-success">Create</button>
            <button type="reset" class="btn btn-danger mx-3">Reset</button>
        </fieldset>
        </form>
    </div>
</body>
</html>