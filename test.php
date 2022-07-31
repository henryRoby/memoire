<?php
$debut = new DateTime('2009-01-02'); 
// Execution de code
$fin = new DateTime('2009-01-05');
$interval = $debut->diff($fin);
echo $interval->format('Il s\'est écoulé  %R%d jours');
//-> Il s est écoulé +3 jours
$firstDate  = new DateTime("2019-01-01");
$secondDate = new DateTime("2020-03-04");
$intvl = $firstDate->diff($secondDate);

echo $intvl->y . " year, " . $intvl->m." months and ".$intvl->d." day"; 
echo "\n";
// Total amount of days
echo $intvl->days . " days ";

?>