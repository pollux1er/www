<a href="index.php">Go back to index</a>
| <a href="<?php echo $_SERVER["REQUEST_URI"];?>">Refresh</a>

<h1>SQLite</h1>

<?php

error_reporting(-1);
include "./_pdo.php";
$db_file = "./application/sqlite/canteen.db3";
PDO_Connect("sqlite:$db_file");
print("PDO_Connect(): successsfully connected<br>");
print("The database file: <b>$db_file</b><br>");

print("</pre>");

print("<h2>Fetch data</h2>");
print("PDO_FetchAll('SELECT * FROM user_info')");
print("<pre style='background:#ddd'>");
$data = PDO_FetchRow("SELECT `PIN`,`user_balance`.`id_user`, `starter`, `meal`, `dessert` FROM `user_account` LEFT JOIN `user_balance` ON `user_balance`.`id_user` = `user_account`.`id_user` WHERE `PIN` =  '1055'");

print_r($data);
print("</pre>");

?>