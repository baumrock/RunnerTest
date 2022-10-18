<?php
$lockfile = __FILE__ . ".lock";

// if it is locked we dont run again
if (is_file($lockfile)) return;

register_shutdown_function(function () use ($lockfile) {
  echo "shutdown!\n";
  unlink($lockfile);
});
touch($lockfile);

$i = 0;
while (++$i) {
  if ($i > 5) throw new Exception("test");
  if ($i > 5) die();
  echo  "$i\n";
  sleep(1);
}
