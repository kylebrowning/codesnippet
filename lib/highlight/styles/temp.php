#!/usr/bin/php
<?php
$files = array();
if ($handle = opendir('.')) {

    while (false !== ($entry = readdir($handle))) {

        if ($entry != "." && $entry != "..") {
          $files[] = $entry;
        }
    }

    closedir($handle);

}

foreach ($files as $filename) {
  list($style, $filetype) = explode('.', $filename);
  if ($filetype == 'css') {
    print "
    codesnippet.style." . $style . ":
      version: VERSION
      css:
        theme:
          /libraries/codesnippet/lib/highlight/styles/" . $style . ".css: {}
    ";
  }
}
