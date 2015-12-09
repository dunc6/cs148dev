<?php

    include "top.php";
    
    $file = fopen("sql/skihard.sql","r") or die("Error");
    
    //now print out each record
    $query = fread($file, filesize("sql/skihard.sql"));
    $info2 = $thisDatabaseReader->select($query, "", 0, 0, 8, 0, false, false);
    $span = count($info2);
    
    print "<table class = 'skiHard'>";
    print "<caption>All Skiing Hardgoods</caption>";
    print "<thead><tr><th>Hardgood</th><th>Brand</th>"
        . "<th>Model</th><th>Color</th><th>Size</th><th>Gender</th><th>Year</th></tr></thead>";
    
    $columns = 7;    
    
    $highlight = 0; // used to highlight alternate rows
    foreach ($info2 as $rec) {
        $highlight++;
        if ($highlight % 2 != 0) {
            $style = ' odd ';
        } else {
            $style = ' even ';
        }
        print '<tr class="' . $style . '">';
        for ($i = 0; $i < $columns; $i++) {
            print '<td>' . $rec[$i] . '</td>';
        }
        print '</tr>';
    }
    // all done
    print '</table>';
    //print '<p> Query: ' . $query;
    print '<p class = "record"> Record Total: ' . $span;
include "footer.php";
?>