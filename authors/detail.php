<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Great Quotes - Author Details</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>

    <body>
      <div class="container">
      <a class="btn btn-dark" href="index.php">Go back to author index </a>
      <hr />

      <?php
        $fh = fopen('../data/authors.csv', 'r');
        $line_counter=0;
        while($line=fgets($fh)){
          if($line_counter==$_GET['index']){
            //display the author
            echo $line;
          }
          $line_counter++;
        }
        fclose($fh);

      ?>
      <a class="btn btn-secondary" href="modify.php?index=<?= $_GET['index'] ?>">modify author</a>
      <a class="btn btn-danger" href="delete.php?index=<?= $_GET['index'] ?>">delete author</a>
      </div>
    </body>

</html>
