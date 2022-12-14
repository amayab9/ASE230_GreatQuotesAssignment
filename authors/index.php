<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Great Quotes - Index of Authors</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>

    <body>
      <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 fixed-top">
        <a href="#" class="navbar-brand">Great Quotes</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navmenu">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a href="../auth/signup.php" class="nav-link">Sign Up</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Sign In</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Sign Out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container" style ="padding-top: 100px">
      <h2><a class="btn btn-success" href="create.php">Add a new author</a><hr /></h2>
        <?php
            $fh = fopen('../data/authors.csv', 'r'); //open authors page in read mode
            $index=0;
            while($line=fgets($fh)){
              if(strlen(trim($line))>0) {
                echo '<h1><a href="detail.php?index='.$index.'">'.trim($line).'</a>
                <a class="btn btn-primary" href="detail.php?index='.$index.'">view author</a>
                <a class="btn btn-secondary" href="modify.php?index='.$index.'">modify author</a>
                <a class="btn btn-danger" href="delete.php?index='.$index.'">delete author</a></h1>';
                $index++;
              }

            } //read line by line
            fclose($fh); //close file
        ?>
    </div>
      <!-- JavaScript Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>

</html>
