<?PHP
  $file_name = "kadai6.txt";
  $ret_array = file( $file_name );
  for( $i = 0; $i < count($ret_array); ++$i ) {
  echo( $ret_array[$i] . "<br />\n" );
  }
?>