<?php

require_once('header.php');
require_once('db.php');
require_once('security.php');

$account_ID= $_GET['account_ID'];

echo <<<EOH
<br></br>
Please enter an account_ID which is greater than 330514
<form action="loader.php">
<input type="hidden" name="f" value="user" method="GET"/>
Enter Account ID: <input type="text" name="account_ID" value=""/>
<input type="submit" value="Insert Account"/>
</form>
EOH;


echo'</br>';


if($account_ID != ''){
$sql =<<<EOQ
insert into Player values ($account_ID, 0 ,0,0)
EOQ;


$r = $db->query($sql);

if (!$r) {
    printf ("Query '$sql' failed: %s (%d)\n", $db->error, $db->errno);
    exit();
}
echo'</br>';

$sql2 =<<<EOQ
select * from Player where account_ID=$account_ID
EOQ;
$r2 = $db->query($sql2);

$row2 = $r2->fetch_array(MYSQL_NUM);

$columnname=array('account_ID','win_num','match_num','skill'); 

echo 'Follwing player was successfully added to database';
echo "<table>\n";
echo "<tr><th>$columnname[0]</th><th>$columnname[1]</th><th>$columnname[2]</th><th>$columnname[3]</th></tr>";
print ("<tr>\n");
    for ($i=0; $i<4; $i++) {
        print ("<td>$row2[$i]</td>");
    }
    print ("</tr>\n");

echo "</table>\n";
}






require_once('footer.php');
