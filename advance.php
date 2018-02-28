<?php

require_once('header.php');
//require_once('index.php');
require_once('db.php');
//require_once('game.php');
echo'</br>';
echo'</br>';


$match_num=$_GET['match_num'];
$win_num= $_GET['win_num'];
$skill=$_GET['skill'];
echo <<<EOH
<br></br>
<form action="loader.php">
<input type="hidden" name="f" value="advance" method="GET"/>
Search by player statistics
<br></br>
Enter Match Number: <input type="text" name="match_num" value=""/>
<br></br>
Enter Win Number: <input type="text" name="win_num" value=""/>
<br></br>
Enter Skill: <input type="text" name="skill" value=""/>
<br></br>
<input type="submit" value="Submit"/>
</form>
EOH;


$sql =<<<EOQ
select account_ID, win_num, match_num,skill From Player where match_num>$match_num and win_num>$win_num and skill>$skill
EOQ;
if ($match_num !='' && $win_num != '' && $skill !=''){
$r = $db->query($sql);

if (!$r) {
    printf ("Query '$sql' failed: %s (%d)\n", $db->error, $db->errno);
    exit();
}

$columnname=array('account_ID','win_num','match_num','skill');

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
