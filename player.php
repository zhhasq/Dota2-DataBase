<?php

require_once('header.php');
require_once('index.php');
require_once('db.php');
require_once('security.php');

$account_ID= $_GET['account_ID'];

echo <<<EOH
<br></br>
<form action="loader.php">
<input type="hidden" name="f" value="player" method="GET"/>
Enter Account ID: <input type="text" name="account_ID" value=""/>
<input type="submit" value="Submit"/>
</form>
EOH;

echo'</br>';
echo'</br>';
echo '<a href = "advance.php"target="_blank">Advanced Search</a>';



if($account_ID>=340001 || $account_ID<0){
echo'</br>';
echo 'Please input correct account_ID in range 1~330513';
}


if($account_ID<340000 && $account_ID!= '' && $account_ID>0){


$sql =<<<EOQ
select * from Player where account_ID = $account_ID
EOQ;
$sql2 =<<<EOQ
select count(account_ID)+1 from (select * from Player where skill > (select skill from Player where account_ID=$account_ID)) as A
EOQ;

$r = $db->query($sql);

if (!$r) {
    printf ("Query '$sql' failed: %s (%d)\n", $db->error, $db->errno);
    exit();
}
echo'</br>';

$row = $r->fetch_array(MYSQL_NUM);
        printf ("Account ID: %s", $row[0]);
        echo'</br>';
        printf ("Total Wins: %s", $row[1]);
        echo'</br>';
        printf ("Total Matches: %s min", $row[2]);
        echo'</br>';
        printf ("Skill: %s", $row[3]);
        echo'</br>';

$r = $db->query($sql2);
if (!$r) {
    printf ("Query '$sql' failed: %s (%d)\n", $db->error, $db->errno);
    exit();
}

$row = $r->fetch_array(MYSQL_NUM);
        printf ("Ranking: %s", $row[0]);
        echo'</br>';


echo'</br>';



}
require_once('footer.php');
