<?php
$apiuser = '';                                     # The PowerDNS API username. Leave empty for authmethod='xapikey' (see AUTHENTICATION)
$apipass = getenv('WEBSERVER_API_PASSWORD');       # The PowerDNS API-user password or the PowerDNS-API key (see AUTHENTICATION)
$apiip   = getenv('WEBSERVER_API_IP');             # The IP of the PowerDNS API
$apiport = getenv('WEBSERVER_API_PORT');           # The port of the PowerDNS API
$apivers = 0;            # The version of the PowerDNS API. 0 == experimental, 1 = v1 (pdns 4.0)
$apisid  = 'localhost';  # PowerDNS's :server_id
$apiproto      = 'http'; # http | https
$apisslverify  = FALSE;  # Verify SSL Certificate if using https for apiproto
$allowzoneadd  = FALSE;  # Allow normal users to add zones


### AUTHENTICATION ###
# The first versions of the PowerDNS API used the standard webserver password
# for authentication, newer versions use an X-API-Key mechanism. NSEdit tries
# to autodetect the method you should use, but that does affect performance.
# For optimal performance, configure the right method.
# (Should be 'auto', 'xapikey' or 'userpass')
$authmethod = 'xapikey';

$authdb  = "/var/www/pdns.users.sqlite3";

# Set a random generated secret to enable auto-login and long living csrf tokens
// $secret = '...';

$templates = array();
/*
$templates[] = array(
    'name' => 'Tuxis',
    'owner' => 'username', # Set to 'public' to make it available to all users
    'records' => array(
        array(
            'name'      => '',
            'type'      => 'MX',
            'content'   => '200 mx2.tuxis.nl')
    )
);
*/

$defaults['soa_edit']    = 'INCEPTION-INCREMENT';
$defaults['soa_edit_api'] = 'INCEPTION-INCREMENT';
$defaults['defaulttype'] = 'Master';                    # Choose between 'Native' or 'Master'
$defaults['ns'][0] = getenv('PDNS_NS1');                # The value of the first NS-record
$defaults['ns'][1] = getenv('PDNS_NS2');                # The value of the second NS-record
$defaults['ttl']   = 3600;                              # Default TTL for records
$defaults['disabled'] = false;                          # Default disabled state

## UI Options
$menutype = 'horizontal'; # horizontal|vertical - use a horizontal or vertical menu
$logo = 'https://www.tuxis.nl/uploads/images/nsedit.png';
