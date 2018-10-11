<?php
require_once "src/RoundRobin.php";

$members = array('player1','player2','player3','player4', 'player5', 'player6',
'player7',
'player8',
'player9',
'player10',
'player11',
'player12',
);

$roundRobin = new RoundRobin();
$rounds = $roundRobin->generate($members);
$matches = [];

foreach ($rounds as $key => $round) {
    echo "Round Number" . ($key + 1)  ."<br />";
    foreach ($round as $val) {
        foreach ($val as $temp) {
            if (!array_key_exists($temp, $matches)) {
                $matches[$temp] = 0;
            }
            $matches[$temp]  =  $matches[$temp] +1;
        }
    }
    $table = "<table>\n";
    for($i =0; $i<=count($round); $i++) {
        $table .= "<tr><td>".$round[$i][0]."-".$round[$i][1]."</td><td>-v-</td><td>".$round[$i+1][0]."-".$round[$i+1][1]."</td></tr>\n";
        $i++;
        if (!array_key_exists($i+1, $round)) {
            break;
        }
    }
    $table .= "</table>\n";
    echo $table;
}
echo " <br />";
echo " <br />";
echo " <br />";
foreach ($matches as $key =>$value) {
    echo "Jugador ".$key. " play ". $value ." <br />";
}