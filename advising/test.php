<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'top.php';
 
$file = fopen("home.sql", "r") or die("Error");

//now print out each record
$query = fread($file, filesize("home.sql"));
$info2 = $thisDatabaseReader->select($query, "", 0, 1, 0, 0, false, false);
$span = count($info2);

print "<p> Query: " . $query;
print "<p> Number of Records: " . $span;

print '<table class = "one">';

//Columns
$columns=8;

//Table headers!!!
print "<thead><tr><th>Student ID</th><th>First Name</th><th>Last Name</th><th>Address</th><th>City</th>"
. "<th>State</th><th>Zip Code</th><th>Gender</th></tr></thead>";

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
    

include "footer.php";
?>