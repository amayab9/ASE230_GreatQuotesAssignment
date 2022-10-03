<?php
    if(count($_POST)>0){
        //make sure name is not already in the file
        $error ='';
        if(file_exists('../data/authors.csv')){
            $fh = fopen('../data/authors.csv','r'); //open authors page in read mode
            while ($line = fgets($fh)){
                if($_POST['name']==trim($line)){
                    $error='The author already exists';
                }
            }
            fclose($fh); //close file
        }

        if(strlen($error) > 0) echo $error;
        else{
            $fh = fopen('../data/authors.csv','a');
            fputs($fh,$_POST['name'].PHP_EOL);//php_eol = new line
            fclose($fh);
            echo 'Thanks for adding '.$_POST['name'].' to our amazing website!';
        }
        //add name to csv file
    }  

?>
<form method="POST">
    Enter the author's name<br />
    <input type="text" name="name" /><br />
    <button type="submit">Add Author</button>

</form>