[Home](index.md) | [Installation](install.md) | [Usage](usage.md) | [Config](config.md)  

# Installation

## Require it

```
composer require ridrog/laravel-bulma
```

## Include Service Provider 

```
'providers' => [
    ...
    Ridrog\Bulma\BulmaServiceProvider::class,
    ...
 ],
```

Register the Facade

```
'aliases' => [
    ...
    'Bulma' => Ridrog\Bulma\Facades\BulmaFacade::class,
    ...
];
```



