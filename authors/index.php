<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Great Quotes</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>

    <body>
        <?php
            $fh = fopen('../data/authors.csv','r'); //open authors page in read mode
            while ($line = fgets($fh)){
                echo '<h1>'.trim($line).'</h1>';
            } //read line by line
            fclose($fh); //close file
        ?>
    </body>

</html>