<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <?php
        $db = new PDO("mysql:dbname=simpsons;host=localhost",'root','root');
        $rows = $db->query("SELECT * from teachers;");
        foreach($rows as $row){
                foreach($row as $ele){
                    print $ele." ";
                }
                print "\n";
        }
         ?>
    </body>
</html>
