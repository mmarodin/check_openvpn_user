<?php
#
$ds_name[1] = "Number of Processes for $hostname";
$opt[1] = "--vertical-label \"count\" --title \"Processes\" ";
#
$def[1] = "DEF:var1=$rrdfile:$DS[1]:MAX " ;
$def[1] .= "AREA:var1#256AEF:\"Count \" " ;
$def[1] .= "LINE1:var1#000000 " ;
$def[1] .= "GPRINT:var1:LAST:\"%.0lf LAST \" ";
$def[1] .= "GPRINT:var1:MAX:\"%.0lf MAX \" ";
$def[1] .= "GPRINT:var1:AVERAGE:\"%.0lf AVERAGE \\n\" ";
$def[1] .= "HRULE:$WARN[1]#ffff00:\"Warning on $WARN[1] \\n\" ";
$def[1] .= "HRULE:$CRIT[1]#ff0000:\"Critical on $CRIT[1] \\n\" ";
?>
