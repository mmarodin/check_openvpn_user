check_openvpn_user
==================

Nagios/Naemon scripts to check user status and traffic for OpenVPN Community edition
by mm@rodin
tested on CentOS 6.x 64 bit with SElinux in enforcing mode, creating some custom SE module

v1 - 20131029 (nagios/pnp4nagios only)
v1.1 - 20150512 (added naemon/pnp4nagios support)

--

NOTES
You have to use personal x509 certificates to authenticate users
Set "status-version 1" into openvpn server configuration file
Give nagios' group read permission to openvpn's log file:
Reloading nagios/naemon it could discover new user VPN configuration