<?php

require_once('header.php');
require_once('index.php');
require_once('db.php');
require_once('security.php');

$match_ID= $_GET['match_ID'];    

echo <<<EOH
<br></br>     
<form action="loader.php">
<input type="hidden" name="f" value="game" method="GET"/>
Enter Match ID: <input type="text" name="match_ID" value=""/>
<input type="submit" value="Submit"/>
</form>
EOH;

if($match_ID>=1876 || $match_ID<0){
echo 'Please input correct match_ID in range 0~1875';
}


if($match_ID<1876 && $match_ID != '' && $match_ID>=0){
$sql =<<<EOQ
select match_ID,FROM_UNIXTIME(start_time) as time, duration_sec/60 as dur, winning_team, player_slot,account_ID,hero_name from Game natural join Join_match natural join Hero where match_ID=$match_ID order by player_slot
EOQ;

$r = $db->query($sql);

if (!$r) {
    printf ("Query '$sql' failed: %s (%d)\n", $db->error, $db->errno);
    exit();
}
 echo'</br>';     

$row = $r->fetch_array(MYSQL_NUM);
        printf ("Match ID: %s", $row[0]);
	echo'</br>';         
	printf ("Start Time: %s", $row[1]);
	echo'</br>';     
        printf ("Dutation: %s min", $row[2]);
	echo'</br>';     
        printf ("Winner Team: %s", $row[3]);
	echo'</br>';     

echo'</br>';    
echo "Dire:";

$columnname=array('Player slot','Account ID','Hero');
echo "<table>\n";
echo "<tr><th>$columnname[0]</th><th>$columnname[1]</th><th>$columnname[2]</th></tr>";

for($j=0; $j<5;$j++){ 

print ("<tr>\n"); 
    for ($i=4; $i<7; $i++) {
        print ("<td>$row[$i]</td>");
    }
    print ("</tr>\n");
$row = $r->fetch_array(MYSQL_NUM);
}
echo "</table>\n";

echo'</br>';
echo "Radiant:";

$columnname=array('Player slot','Account ID','Hero');
echo "<table>\n";
echo "<tr><th>$columnname[0]</th><th>$columnname[1]</th><th>$columnname[2]</th></tr>";

for($j=0; $j<5;$j++){ 
print ("<tr>\n"); 
    for ($i=4; $i<7; $i++) {
        print ("<td>$row[$i]</td>");
    }
    print ("</tr>\n");
$row = $r->fetch_array(MYSQL_NUM);

}
echo "</table>\n";


echo'</br>';
 echo '<a href = "event.php?data='.$match_ID.'"target="_blank">Show Events</a>'; 
echo'</br>';
echo '<a href = "battle.php?data='.$match_ID.'"target="_blank">Show Battles</a>'; 
echo'</br>';
echo '<a href = "upgrade.php?data='.$match_ID.'"target="_blank">Show Upgrade</a>';
}
require_once('footer.php');
