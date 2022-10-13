<?php
// first if statement closes on line 27
if (count($_POST)>0){
  // check that the author's name is in the file
  if(!isset($_GET['index'])){
    die('Please enter the author you want to modify');
  }

  // wrap in file_exists
  if (file_exists('../data/authors.csv')){
    $line_counter = 0;
    $new_file_content = '';
    $fh= fopen('../data/authors.csv','r');
    while($line=fgets($fh)){
      if($line_counter==$_GET['index']) $new_file_content.=$_POST['name'].PHP_EOL;
      else $new_file_content.=$line;
      $line_counter++;
    }
    fclose($fh);

  file_put_contents('../data/authors.csv', $new_file_content);
  echo 'You have successfully modified the author
  <hr />
  <a href="index.php">Go back to index </a>';
  }

} // if the first if wasn't satisfied
else {
  $author_name='';
  $fh = fopen('../data/authors.csv', 'r');
  $line_counter=0;
  while($line=fgets($fh)){
    if($line_counter == $_GET['index']){
      //display the author
      $author_name=trim($line);

    }
    $line_counter++;
  }
?>

<!doctype HTML>
  <html>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Great Quotes - Modify Author</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>

    <body>
      <div class="container">
        <a  class="btn btn-dark" href="index.php">Go back to index </a>
        <hr />

        <form method="post">
          Enter the author's name <br />
          <input type="text" name="name" value="<?= $author_name ?>"/><br /><br />
          <button type="submit" >Modify author</button>
        </form>

      </div>
    </body>
  </html>

<?php
}  // closes else statement
?>
