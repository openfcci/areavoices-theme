<?php
$safemode = true;

global $wpdb;
//$older_than_time = strtotime('-' . $older_than);
$older_than_time = '1443822825';

/**
 * Only check if the transients are older than the specified time
 */

if ( $older_than_time > time() || $older_than_time < 1 ) {
  return false;
}

/**
 * Get all the expired transients
 */
$transients = $wpdb->get_col(
  $wpdb->prepare( "
      SELECT REPLACE(option_name, '_transient_timeout_', '') AS transient_name
      FROM {$wpdb->options}
      WHERE option_name LIKE '\_transient\_timeout\__%%'
        AND option_value < %s
  ", $older_than_time)
);

/**
 * If safemode is ON just use the default WordPress get_transient() function
 * to delete the expired transients
 */

if ( $safemode ) {
  foreach( $transients as $transient ) {
    get_transient($transient);
  }
}

/**
 * If safemode is OFF the just manually delete all the transient rows in the database
 */

else {
  $options_names = array();
  foreach($transients as $transient) {
    $options_names[] = '_transient_' . $transient;
    $options_names[] = '_transient_timeout_' . $transient;
  }
  if ($options_names) {
    $options_names = array_map(array($wpdb, 'escape'), $options_names);
    $options_names = "'". implode("','", $options_names) ."'";

    $result = $wpdb->query( "DELETE FROM {$wpdb->options} WHERE option_name IN ({$options_names})" );
    if (!$result) {
      return false;
    }
  }
}

return $transients;
echo 'Done';
