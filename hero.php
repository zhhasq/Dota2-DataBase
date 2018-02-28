<?php

require_once('header.php');
require_once('db.php');
require_once('security.php');

$hero_ID= $_GET['hero_ID'];
$hero_name= $_GET['hero_name'];

echo <<<EOH
<br></br>
<form action="loader.php">
<input type="hidden" name="f" value="hero" method="GET"/>
Enter Hero ID: <input type="text" name="hero_ID" value=""/>
<br></br>
Enter Hero Name: <input type="text" name="hero_name" value=""/>
<br></br>
<input type="submit" value="Insert Hero"/>
</form>
EOH;

if($hero_ID != '' && $hero_name!=''){
$sql =<<<EOQ
insert into Hero values ($hero_ID,"npc_dota_hero_$hero_name", "$hero_name")
EOQ;

$r = $db->query($sql);

if (!$r) {
    printf ("Query '$sql' failed: %s (%d)\n", $db->error, $db->errno);
    exit();
}
$sql2 =<<<EOQ
select * from Hero where hero_ID=$hero_ID;
EOQ;
$r2 = $db->query($sql2);

$row2 = $r2->fetch_array(MYSQL_NUM);

$columnname=array('hero_ID','system_name','hero_name');

echo 'Follwing hero was successfully added to database';
echo "<table>\n";
echo "<tr><th>$columnname[0]</th><th>$columnname[1]</th><th>$columnname[2]</th></tr>";
print ("<tr>\n");
    for ($i=0; $i<3; $i++) {
        print ("<td>$row2[$i]</td>");
    }
    print ("</tr>\n");

echo "</table>\n";

}




require_once('footer.php');
