<?php

/**
 * Returns the amount of weeks into the month a date is
 * @param $date a YYYY-MM-DD formatted date
 * @param $rollover The day on which the week rolls over
 */
/**
 function getWeeks($timestamp)
{
    $maxday    = date("t",$timestamp);
    $thismonth = getdate($timestamp);
    $timeStamp = mktime(0,0,0,$thismonth['mon'],1,$thismonth['year']);    //Create time stamp of the first day from the give date.
    $startday  = date('w',$timeStamp);    //get first day of the given month
    $day = $thismonth['mday'];
    $weeks = 0;
    $week_num = 0;

    for ($i=0; $i<($maxday+$startday); $i++) {
        if(($i % 7) == 0){
            $weeks++;
        }
        if($day == ($i - $startday + 1)){
            $week_num = $weeks;
        }
      }     
    return $week_num;
}

echo "la semana es: <br>";
$timestamp = strtotime('23-04-2016');
$week = getWeeks($timestamp);
echo  $week;
*/

function getWeeks($timestamp)
{
	$maxday    = date("t",$timestamp);
	$thismonth = getdate($timestamp);
	$timeStamp = mktime(0,0,0,$thismonth['mon'],1,$thismonth['year']);    //Create time stamp of the first day from the give date.
	$startday  = date('w',$timeStamp);    //get first day of the given month
	$day = $thismonth['mday'];
	$weeks = 0;
	$week_num = 0;

	for ($i=0; $i<($maxday+$startday); $i++) {
		if(($i % 7) == 0){
			$weeks++;
		}
		if($day == ($i - $startday + 1)){
			$week_num = $weeks;
		}
	}
	return $week_num;
}


echo "la semana: <br>";
$a=12;
$b=04;
$c=2016;
$timestamp = strtotime('$a$b$c');
$week = getWeeks($timestamp);
echo  $week;


?>