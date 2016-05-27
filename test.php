<?php 

/* Both these tests were takes from the php.net website and comments */
$handle = printer_open('zebra');
$pHandle = fopen("./test.txt", "r+");
printer_set_option($handle, PRINTER_MODE, "raw");
printer_set_option($handle, PRINTER_TEXT_ALIGN, PRINTER_TA_LEFT);
printer_start_doc($handle, "My Document");
printer_start_page($handle);
printer_draw_bmp($handle, "./image.bmp", 1, 1);
printer_write($handle, fread($pHandle, filesize("test.txt")));
printer_end_page($handle);
printer_end_doc($handle, "My Document");
printer_close($handle);
die('Impression Reussi!');

?>