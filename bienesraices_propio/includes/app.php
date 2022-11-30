<?PHP

require 'functions.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

//conexion a db
$db = conectarDB();

use Feneme\ActiveRecord;
ActiveRecord::setDB($db);



?>