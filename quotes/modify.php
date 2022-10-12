<?php
/// modify quote
/// at first glance, this would modify the text of the quote only
/// do we want a way to change the author associated with quote?

// first if statement closes on line 27
if (count($_POST)>0){
  // check that the quote is in the file
  if(!isset($_GET['index'])){
    die('Please enter the quote you want to modify');
  }

  // wrap in file_exists
  if (file_exists('../data/quotes.csv')){
    $line_counter = 0;
    $new_file_content = '';
    $fh= fopen('../data/quotes.csv','r');
    while($line=fgets($fh)){
      if($line_counter==$_GET['index']) $new_file_content.=$_POST['quote'].PHP_EOL;
      else $new_file_content.=$line;
      $line_counter++;
    }
    fclose($fh);

  file_put_contents('../data/quotes.csv', $new_file_content);
  echo 'You have successfully modified the quote
  <hr />
  <a href="index.php">Go back to quotes index </a>';
  }

} // if the first if wasn't satisfied
else {
  $quote_ID='';
  $fh = fopen('../data/quotes.csv', 'r');
  $line_counter=0;
  while($line=fgets($fh)){
    if($line_counter == $_GET['index']){
      //display the author
      $quote_ID=trim($line);

    }
    $line_counter++;
  }
?>
<a href="index.php">Go back to quotes index </a>
<hr />
<form method="post">
 Enter the quote text <br />
 <input type="text" name="quote" value="<?= $quote_ID ?>"/><br />
 <button type="submit" >Modify quote</button>

</form>
<?php
}  // closes else statement
?>
