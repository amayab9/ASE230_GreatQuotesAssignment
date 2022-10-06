<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Great Quotes</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>

    <body>
      <a href="index.php">Go back to index </a>
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
      (<a href="modify.php?index=<?= $_GET['index'] ?>">modify</a>)
      (<a href="delete.php?index=<?= $_GET['index'] ?>">delete</a>)
    </body>

</html>