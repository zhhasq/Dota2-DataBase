<?php
$title = 'Sheng Zhong';
require ('header.php');
require_once('db.php');

$match_ID = $_GET['match_ID'];
$battle_ID = $_GET['battle_ID'];
echo <<<EOH
<form action="loader.php">
<input type="hidden" name="f" value="index" method="GET"/>
Enter Match ID: <input type="text" name="match_ID" value=""/>
<input type="submit" />
</form>
EOH;

echo <<<EOH
<form action="loader.php">
<input type="hidden" name="f" value="index" method="GET"/>
Enter Battle ID: <input type="text" name="battle_ID" value=""/>
<input type="submit" />
</form>
EOH;

if($match_ID != '' ){

$sql =<<<EOQ
select match_ID, start_time from Game where match_ID= $match_ID
EOQ;

$r = $db->query($sql);

if (!$r) {
    printf ("Query '$sql' failed: %s (%d)\n", $db->error, $db->errno);
    exit();
}

$columnname=array('lastname','num');
echo "<table>\n";
echo "<tr><th>$columnname[0]</th><th>$columnname[1]</th></tr>\n";
while ($row = $r->fetch_array()) {
    print ("<tr>\n");
    for ($i=0; $i<2; $i++) {
        print ("<td>$row[$i]</td>");
    }
    print ("</tr>\n");
}
echo "</table>\n";
}

if($battle_ID != '' ){
$sql =<<<EOQ
select battle_ID, start_time_sec from Battle where battle_ID= $battle_ID
EOQ;

$r = $db->query($sql);

if (!$r) {
    printf ("Query '$sql' failed: %s (%d)\n", $db->error, $db->errno);
    exit();
}


$columnname=array('lastname','num');
echo "<table>\n";
echo "<tr><th>$columnname[0]</th><th>$columnname[1]</th></tr>\n";
while ($row = $r->fetch_array()) {
    print ("<tr>\n");
    for ($i=0; $i<2; $i++) {
        print ("<td>$row[$i]</td>");
    }
    print ("</tr>\n");
}
echo "</table>\n";
}


require('footer.php');



