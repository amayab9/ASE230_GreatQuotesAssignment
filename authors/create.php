<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Great Quotes - Add an Author</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>

    <body>
      <a href="index.php">Go back to index </a>
      <hr />
        <?php
          if(count($_POST)>0){
            //make sure name is not already in the file
              $error ='';
              if(file_exists('../data/authors.csv')){
                $fh = fopen('../data/authors.csv', 'r'); //open authors page in read mode
                while($line=fgets($fh)){
                  if($_POST['name'] == trim($line)){
                    //found the name already
                    $error='The author already exists';
                  }
                }
                fclose($fh); //close file
              }

              if(strlen($error)>0) echo $error;
              else{
                // Add the name to the csv file
                $fh = fopen('../data/authors.csv', 'a');
                fputs($fh,$_POST['name'].PHP_EOL);//php_eol = new line
                fclose($fh);

                echo 'Thanks for adding '.$_POST['name'].' to our amazing website!';
              }
            } // closes if statement for empty file

        ?>
        <!-- <a href="index.php">Go back to index </a>
        <hr /> -->
        <form method="post">
          Enter the author's name <br />
          <input type="text" name="name" /><br />
          <button type="submit" >Add author</button>
        </form>

    </body>

</html>
