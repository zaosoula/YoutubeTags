<?php

// information concernant le fichier à télécharger





 $url=$_GET['url'];
 $id = $_GET['id'];
 $name = $_GET['name'];
 $filename = 'tmp/'.time().'_'.$id.'_'.$name;
 $fp = fopen($filename, 'w');

 $ch = curl_init($url);
 curl_setopt($ch, CURLOPT_FILE, $fp);
 $data = curl_exec($ch);
 $curl_errno = curl_errno($ch);
 $curl_error = curl_error($ch);
 curl_close($ch);
 fclose($fp);


 header('Content-Type: application/force-download');
 header("Content-Transfer-Encoding: binary");
 header('Content-Disposition: attachment; filename='.basename($filename));
 header('Pragma: no-cache');
 header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
 header('Expires: 0');
 readfile($filename);
 unlink($filename);

?>
