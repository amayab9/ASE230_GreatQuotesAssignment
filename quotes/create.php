<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Great Quotes - Add a Quote</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>

    <body>
      <a href="index.php">Go back to quote index </a>
      <hr />
        <?php
          if(count($_POST)>0){
            //make sure quote is not already in the file
            /// NEED TO THINK MORE ON THIS ONE
            /// Can't add quote without author, should we have links between
            /// create author and create quote to direct user to enter both?
            /// author check is for 'author exists' but author to quote is a 1 to many relationship
              $error ='';
              if(file_exists('../data/quotes.csv')){
                $fh = fopen('../data/quotes.csv', 'r'); //open quotes page in read mode
                while($line=fgets($fh)){
                  if($_POST['quote'] == trim($line)){
                    //found the text already
                    $error='The quote already exists';
                  }
                }
                fclose($fh); //close file
              }

              if(strlen($error)>0) echo $error;
              else{
                // Add the name to the csv file
                $fh = fopen('../data/quotes.csv', 'a');
                fputs($fh,$_POST['quote'].PHP_EOL);//php_eol = new line
                fclose($fh);

                echo 'Thanks for adding '.$_POST['quote'].' to our amazing website!';
              }
            } // closes if statement for empty file

        ?>
        <!-- <a href="index.php">Go back to index </a>
        <hr /> -->
        <form method="post">
          Enter the quote text <br />
          <input type="text" name="quote" /><br />
          <button type="submit" >Add quote</button>
        </form>

    </body>

</html>
