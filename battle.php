


<?php

require_once('header.php');
//require_once('index.php');
require_once('db.php');
//require_once('game.php');
echo'</br>';
echo'</br>';


//$match_ID=$_POST['match_ID'];
$match_ID=$_GET['data'];


if($match_ID != ''){
$sql =<<<EOQ
select * from Battle natural join Battle_player where battle_ID in (select battle_ID from Game natural join Battle_happen where match_ID=$match_ID);

EOQ;

$r = $db->query($sql);

if (!$r) {
    printf ("Query '$sql' failed: %s (%d)\n", $db->error, $db->errno);
    exit();
}
 echo'</br>';
while ($row = $r->fetch_array(MYSQL_NUM)){
//$row = $r->fetch_array(MYSQL_NUM);
        printf ("battle ID: %s", $row[0]);
        echo'</br>';
        printf ("Start: %s", $row[1]);
        echo'</br>';
        printf ("End: %s min", $row[2]);
        echo'</br>';
        printf ("Winner Team: %s", $row[3]);
        echo'</br>';

echo'</br>';

$columnname=array('Player slot','damage','death', 'xp_start', 'xp_end');
echo "<table>\n";
echo "<tr><th>$columnname[0]</th><th>$columnname[1]</th><th>$columnname[2]</th><th>$columnname[3]</th><th>$columnname[4]</th></tr>";

for($j=0; $j<9;$j++){

print ("<tr>\n");
    for ($i=3; $i<8; $i++) {
        print ("<td>$row[$i]</td>");
    }
    print ("</tr>\n");
$row = $r->fetch_array(MYSQL_NUM);
}
print ("<tr>\n");
for ($i=3; $i<8; $i++) {
        print ("<td>$row[$i]</td>");
    }

print ("</tr>\n");

echo "</table>\n";
echo'</br>';
echo'</br>';

}


}


require_once('footer.php');
