#!/bin/bash
#----------
IP=192.168.0.2
LIST=`/usr/lib64/nagios/plugins/check_nrpe -H $IP -c check_openvpn_user_list`
#CLIENTS=/etc/nagios/conf.d/openvpn
CLIENTS=/etc/naemon/conf.d/openvpn
DEBUG=$1
COUNT=1
ifs=$IFS
ifsnl='
'

IFS=$ifsnl
  for CN in `echo "$LIST"` ; do
    CNb=${CN//[[:blank:]]/}
      if [ ! -f $CLIENTS/$CNb.cfg ] ; then
	echo "# 'Traffic $CN' service definition" > $CLIENTS/$CNb.cfg
	echo "define service {" >> $CLIENTS/$CNb.cfg
	echo "	use                             sys-service,srv-pnp" >> $CLIENTS/$CNb.cfg
	echo "	hosts				peer01" >> $CLIENTS/$CNb.cfg
	echo "	service_description             Traffic $CN" >> $CLIENTS/$CNb.cfg
	echo "	check_command                   check_openvpn_user_traffic!$CNb" >> $CLIENTS/$CNb.cfg
	echo "	normal_check_interval           5" >> $CLIENTS/$CNb.cfg
	echo "}" >> $CLIENTS/$CNb.cfg
	echo "" >> $CLIENTS/$CNb.cfg
#	  if [ "$DEBUG" != "nolog" ] ; then
	      if [ "$COUNT" == "1" ] ; then
		echo ""
		COUNT=$[COUNT+1]
	      fi
	    echo "Created config file for $CN"
#	  fi
#	chown nagios:nagios $CLIENTS/$CNb.cfg
	chown naemon:naemon $CLIENTS/$CNb.cfg
	chcon -u system_u -r object_r -t etc_t $CLIENTS/$CNb.cfg
	chmod 664 $CLIENTS/$CNb.cfg
      else
	  if [ "$DEBUG" != "nolog" ] ; then
	    echo "Config file for $CN just exist"
	  fi
      fi
  done
IFS=$ifs
