<?php
/*phpinfo();
exit();*/

/*try {
    // подключаемся к серверу
    $conn = new PDO("mysql:host=127.0.0.1;dbname=alfaweb", "homestead", "secret");
    echo "Database connection established";
}
catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$stmt = $conn->query("SELECT * FROM b5fcx_categories");
while ($row = $stmt->fetch())
{
    echo '<pre>';
    print_r($row);
}
exit();*/
//error_reporting(E_ALL & ~E_NOTICE); тестим git
// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');


require(__DIR__ . '/vendor/autoload.php');
require(__DIR__ . '/vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/config/web.php');


(new yii\web\Application($config))->run();
