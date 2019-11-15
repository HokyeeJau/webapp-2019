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
        echo "<ul>";
        foreach($rows as $row){
            echo "<li>";
            foreach($row as $ele){
                print $ele." ";
            }
            echo "</li>";
        }
        echo "</ul>";
         ?>
    </body>
</html>
