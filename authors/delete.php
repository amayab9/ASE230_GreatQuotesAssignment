<?php

    if(!isset($_GET['index'])){
        die('Please enter the author you want to delete');
    }//if there is nothing in the query string then show message

    $author_to_be_deleted=$_GET['index'];

    if (file_exists('../data/authors.csv')){


    $line_counter = 0;
    $new_file_content='';
    $fh = fopen('../data/authors.csv','r'); //open authors page in read mode

    while ($line=fgets($fh)){
        if($line_counter== $_GET['index']) $new_file_content.=PHP_EOL;
        else $new_file_content.=$line;
        $line_counter++;
    }
    fclose($fh);

    file_put_contents('../data/authors.csv',$new_file_content);
    echo 'You have successfully deleted the author
    <hr />
    <a href="index.php">Go back to index </a>';
}
//http://localhost/ase230/greatQuotes/authors/delete.php?index=1
?>
