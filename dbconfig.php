<?php 
  // phpinfo();
  // $client = new MongoClient(
  //   'mongodb://kay:myRealPassword@whereit-shard-00-00-rgxhe.mongodb.net:27017,whereit-shard-00-00-rgxhe.mongodb.net:27017,whereit-shard-00-00-rgxhe.mongodb.net:27017/admin?ssl=true&replicaSet=whereit-shard-0&authSource=admin&serverSelectionTryOnce=false&serverSelectionTimeoutMS=15000"');
  // $client = new MongoDB\Driver\Manager('mongodb://root:okok2002@whereit-shard-00-00-rgxhe.mongodb.net:27017,whereit-shard-00-00-rgxhe.mongodb.net:27017,whereit-shard-00-00-rgxhe.mongodb.net:27017/admin?ssl=true&replicaSet=whereit-shard-0&authSource=admin&serverSelectionTryOnce=false&serverSelectionTimeoutMS=15000');
  $client = new \MongoDB\Driver\Manager('mongodb://root:okok2002@whereit-shard-00-00-rgxhe.mongodb.net:27017,whereit-shard-00-00-rgxhe.mongodb.net:27017,whereit-shard-00-00-rgxhe.mongodb.net:27017/admin?ssl=true&replicaSet=whereit-shard-0&authSource=admin&serverSelectionTryOnce=false&serverSelectionTimeoutMS=15000');
  $db = $client;
  var_dump($db);
?>
