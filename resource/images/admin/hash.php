<?

echo hash("sha256", $_REQUEST[pwd]);
echo "<br>".base64_encode($_REQUEST[base64]);

?>