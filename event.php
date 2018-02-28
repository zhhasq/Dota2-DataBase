<?php

require_once('header.php');
//require_once('index.php');
require_once('db.php');
//require_once('game.php');
echo'</br>';
echo'</br>';  


//$match_ID=$_POST['match_ID'];
//$match_ID=$_GET['id'];

//$match_ID=var_dump($_GET['data']);

$match_ID=$_GET['data'];


if($match_ID != ''){

$sql =<<<EOQ
select * from Event where match_ID=$match_ID order by time_sec
EOQ;

$r = $db->query($sql);

if (!$r) {
    printf ("Query '$sql' failed: %s (%d)\n", $db->error, $db->errno);
    exit();
}
 echo'</br>';

$columnname=array('Match ID','Event','Game Time','Related Player Slot');
echo "<table>\n";
echo "<tr><th>$columnname[0]</th><th>$columnname[1]</th><th>$columnname[2]</th><th>$columnname[3]</th></tr>\n";
while ($row = $r->fetch_array()) {
    print ("<tr>\n");
    for ($i=0; $i<4; $i++) {
        print ("<td>$row[$i]</td>");
    }
    print ("</tr>\n");
}
echo "</table>\n";
}

require_once('footer.php');
