# Favorites Data Store

It is a data store that, using MongoDB, persistently stores and manages user favorites, be it an ID, or a URL. It also acts as a cache, if the favorite already exists in the instance, for faster access.

## Usage Examples

Creating one record.

```php
// Instantiates the Database
$database = new FDS\Database(
    $config['host'],
    $config['port'],
    $config['username'],
    $config['password'],
    $config['database'],
    $config['collection']
);

// Instantiates the Datastore
$favoritesDataStore = new FDS\FavoritesDataStore($database);

// Creates the model object
$favoriteUrl = new FDS\model\FavoriteUrlModel(1, 'http://www.google.com');

// Inserts into the Datastore
$favoritesDataStore->set($favoriteUrl);
```

Get all the records of a owner.

```php
// Gets all the records of a owner
$favoritesDataStore->get(1);
```

Deleting all records of a owner.

```php
// Deletes all the records of a owner
$favoritesDataStore->remove(1);
```