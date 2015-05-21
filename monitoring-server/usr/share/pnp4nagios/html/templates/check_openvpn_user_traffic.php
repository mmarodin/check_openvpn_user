<?php
$opt[1] = "--vertical-label bits/s --title \"Traffic for $hostname / $servicedesc\" ";
$colors = array(
       'red'=> '#FF0000',
       'green' => '#00FF00',
       'blue' => '#0000FF',
       'yellow' => '#FFFF00',
       'black' => '#000000',
       'deepred' => '#330000',
        );

$def[1] =  "DEF:var1=$rrdfile:$DS[1]:AVERAGE " ;
$def[1] .= "DEF:var2=$rrdfile:$DS[2]:AVERAGE " ;
$def[1] .= "HRULE:$WARN[1]#FFFF00 ";
$def[1] .= "HRULE:$CRIT[1]#FF0000 ";
$def[1] .= "AREA:var1$colors[green]:\"In \" " ;
$def[1] .= "GPRINT:var1:LAST:\"%6.2lf last\" " ;
$def[1] .= "GPRINT:var1:AVERAGE:\"%6.2lf avg\" " ;
$def[1] .= "GPRINT:var1:MAX:\"%6.2lf max\\n\" ";
$def[1] .= "LINE:var2$colors[blue]:\"Out \" " ;
$def[1] .= "GPRINT:var2:LAST:\"%6.2lf last\" " ;
$def[1] .= "GPRINT:var2:AVERAGE:\"%6.2lf avg\" " ;
$def[1] .= "GPRINT:var2:MAX:\"%6.2lf Total\\n\" " ;

/*
$def[1] .= "CDEF:total=var1,var2,+ " ;
$def[1] .= "LINE1:total$colors[black]:\"Total \" " ;
*/

?>
