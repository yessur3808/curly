<?php

function ip_address() {
  $ip_address = &drupal_static(__FUNCTION__);

  if (!isset($ip_address)) {
    $ip_address = $_SERVER['REMOTE_ADDR'];

    if (variable_get('reverse_proxy', 0)) {
      $reverse_proxy_header = variable_get('reverse_proxy_header', 'HTTP_X_FORWARDED_FOR');
      if (!empty($_SERVER[$reverse_proxy_header])) {
        // If an array of known reverse proxy IPs is provided, then trust
        // the XFF header if request really comes from one of them.
        $reverse_proxy_addresses = variable_get('reverse_proxy_addresses', array());

        // Turn XFF header into an array.
        $forwarded = explode(',', $_SERVER[$reverse_proxy_header]);

        // Trim the forwarded IPs; they may have been delimited by commas and spaces.
        $forwarded = array_map('trim', $forwarded);

        // Tack direct client IP onto end of forwarded array.
        $forwarded[] = $ip_address;

        // Eliminate all trusted IPs.
        $untrusted = array_diff($forwarded, $reverse_proxy_addresses);

        // The right-most IP is the most specific we can trust.
        $ip_address = array_pop($untrusted);
      }
    }
  }

  return $ip_address;
}
?>
