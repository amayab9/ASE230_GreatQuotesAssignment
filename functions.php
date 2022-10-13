<?php
  function sourceCheck ($userData, $record){

    // receive user input
    // check if author/source is already in list
    // if not in list, assign unique ID and return to $_GET
    // if in list, retrieve source ID and return to $_GET
    ###### refer to this article for help parsing the csv data ######
    #### https://code.tutsplus.com/articles/read-a-csv-to-array-in-php--cms-39471
    $message ='';
    $sourceID = 0;
    if(file_exists('../data/authors.csv')){
      $fh = fopen('../data/authors.csv', 'r'); //open authors page in read mode
      while($line=fgets($fh)){
        if($userData['source'] == trim($line)){
          $messge = "The author is in our records. Let's check the quote."
          $sourceID =

  }




 ?>
