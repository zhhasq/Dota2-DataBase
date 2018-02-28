<?php

require_once('header.php');
//require_once('index.php');
require_once('db.php');
//require_once('game.php');
echo'</br>';
echo'</br>';



$match_ID=$_GET['data'];

if($match_ID != ''){


$sql =<<<EOQ
select * from Upgrade where match_ID=$match_ID order by upgrade_time
EOQ;

$r = $db->query($sql);

if (!$r) {
    printf ("Query '$sql' failed: %s (%d)\n", $db->error, $db->errno);
    exit();
}
 echo'</br>';

$columnname=array('Match ID','Upgrade_Time','Player_slot','ability','level');
echo "<table>\n";
echo "<tr><th>$columnname[0]</th><th>$columnname[1]</th><th>$columnname[2]</th><th>$columnname[3]</th><th>$columnname[4]</th></tr>\n";
while ($row = $r->fetch_array()) {
    print ("<tr>\n");
    for ($i=0; $i<5; $i++) {
        print ("<td>$row[$i]</td>");
    }
    print ("</tr>\n");
}
echo "</table>\n";

}






require_once('footer.php');
