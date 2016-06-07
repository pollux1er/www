<?php 
// Connexion à la BD
error_reporting(-1);
include "./_pdo.php";
$db_file = "./application/sqlite/canteen.db3";
PDO_Connect("sqlite:$db_file");

// Lecture des données actuelles
$data = PDO_FetchRow("SELECT `PIN`, `user_balance`.`id_user`, `starter`, `meal`, `dessert` FROM `user_account` LEFT JOIN `user_balance` ON `user_balance`.`id_user` = `user_account`.`id_user` WHERE `PIN` =  '".$_POST['pin']."'");
$pin = $data['PIN'];
$id_user = $data['id_user'];
$old_entree = (int) $data['starter'];
$old_repas = (int) $data['meal'];
$old_dessert = (int) $data['dessert'];

$new_entree = (int) $data['starter'];
$new_repas = (int) $data['meal'];
$new_dessert = (int) $data['dessert'];

$log_repas = 0;
$log_entree = 0;
$log_dessert = 0;

// Mise à jour des données
if($_POST['dash'] == 'no') { // S'il ne prend qu'un plat de résistance
	$log_repas = -1;
	$new_repas = $old_repas + $log_repas;
	$stmt = PDO_Execute("UPDATE user_balance SET meal = '$new_repas' WHERE id_user = '$id_user'");
}

if($_POST['dash'] == 'yes') { // S'il prend des choix
	$log_repas = -1;
	$log_entree = (int) $_POST['entree'] * (-1);
	$log_dessert = (int) $_POST['dessert'] * (-1);
	$new_repas = $old_repas - 1;
	$new_entree = $old_entree - (int) $_POST['entree'];
	$new_dessert = $old_dessert - (int) $_POST['dessert'];
	$stmt = PDO_Execute("UPDATE user_balance SET meal = '$new_repas', starter = '$new_entree', dessert = '$new_dessert' WHERE id_user = '$id_user'");
}

// Tracabilité
$stmt = PDO_Execute("INSERT INTO `logs` (`id_user`, `starter`, `meal`, `dessert`, `date`, `place`, `log_by`) VALUES ('$id_user', '$log_entree', '$log_repas', '$log_dessert', CURRENT_TIMESTAMP, 'client1', '$id_user');");

// Impression à l'utilisateur
$file = file_get_contents('./ticket-pattern.txt');
$filename_to_print = './ticket-printed.txt';
$file_to_print = fopen("./ticket-printed.txt", "w");
$string = $file;
$patterns = array();
$patterns[0] = '/{e}/';
$patterns[1] = '/{p}/';
$patterns[2] = '/{d}/';
$patterns[3] = '/{se}/';
$patterns[4] = '/{sp}/';
$patterns[5] = '/{sd}/';
$patterns[6] = '/{date}/';
$patterns[7] = '/{ID}/';
$replacements = array();
$replacements[0] = $_POST['entree'];
$replacements[1] = "1";
$replacements[2] = $_POST['dessert'];
$replacements[3] = "$new_entree";
$replacements[4] = "$new_repas";
$replacements[5] = "$new_dessert";
$today = date("F j, Y, g:i a");
$replacements[6] = "$today";
$replacements[7] = "$id_user";

$string = preg_replace($patterns, $replacements, $string);

file_put_contents($filename_to_print, $string);

fclose($file_to_print);

/* Both these tests were takes from the php.net website and comments */
$handle = printer_open('zebra');
$pHandle = fopen("./ticket-printed.txt", "r+");
printer_set_option($handle, PRINTER_MODE, "raw");
printer_set_option($handle, PRINTER_TEXT_ALIGN, PRINTER_TA_LEFT);
printer_start_doc($handle, "My Document");
printer_start_page($handle);
printer_draw_bmp($handle, "./image.bmp", 1, 1);

// operations sur le ficher pour mettre à jour les info


// Fin des opérations et impressions du ticket

printer_write($handle, fread($pHandle, filesize("./ticket-printed.txt")));
printer_end_page($handle);
printer_end_doc($handle, "My Document");
printer_close($handle);
die('Impression Reussi!');

?>