<?php

require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];


$factory = (new Factory)->withServiceAccount('vendor/google-service-account.json');

$database = $factory->createDatabase();


$postData = [
     'nome' => $nome,
       'email' => $email,
];

$postRef = $database->getReference('admin')->push($postData);

$postKey = $postRef->getKey(); // The key looks like this: -KVquJHezVLf-lSye6Qg


$userProperties = [
    'email' => $email,
    'displayName' => $nome,
     'password' => $senha,
    'disabled' => false,
];

$auth = $factory->createAuth();

$createdUser = $auth->createUser($userProperties);

 header("Location: ads_index.php");