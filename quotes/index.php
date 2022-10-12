<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Great Quotes - Index of Quotes</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>

    <body>
      <h2><a href="create.php">Add a new quote</a><hr /></h2>
        <?php
            $fh = fopen('../data/quotes.csv', 'r'); //open authors page in read mode
            $index=0;
            while($line=fgets($fh)){
              if(strlen(trim($line))>0) {
                echo '<h1><a href="detail.php?index='.$index.'">'.trim($line).'</a>
                (<a href="detail.php?index='.$index.'">view quote</a>)
                (<a href="modify.php?index='.$index.'">modify quote</a>)
                (<a href="delete.php?index='.$index.'">delete quote</a>)</h1>';
                $index++;
              }

            } //read line by line
            fclose($fh); //close file
        ?>

    </body>

</html>
