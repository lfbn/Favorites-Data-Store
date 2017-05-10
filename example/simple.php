<?php

require_once('../vendor/autoload.php');
require_once('config.php');

$database = new FDS\Database(
    $config['host'],
    $config['port'],
    $config['username'],
    $config['password'],
    $config['database'],
    $config['collection']
);

$favoritesDataStore = new FDS\FavoritesDataStore($database);

$favoriteUrl1 = new FDS\model\FavoriteUrlModel(1, "http://www.google.com");
$favoriteUrl2 = new FDS\model\FavoriteUrlModel(2, "http://www.cnn.com");
$favoriteId1 = new FDS\model\FavoriteIdModel(2, 233);

echo 'Adds data.<br>';

$favoritesDataStore->set($favoriteUrl1);
$favoritesDataStore->set($favoriteUrl2);
$favoritesDataStore->set($favoriteId1);

echo 'Shows all the data from user 1.<br>';

print_r($favoritesDataStore->get(1));echo '<br>';

echo 'Shows all the data from user 2.<br>';

print_r($favoritesDataStore->get(2));echo '<br>';

echo 'Removes all the data from user 1<br>';

$favoritesDataStore->remove(1);

echo 'Shows all the data from user 1<br>';

print_r($favoritesDataStore->get(1));

echo 'Shows all the data from user 2<br>';

print_r($favoritesDataStore->get(2));