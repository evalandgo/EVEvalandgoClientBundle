# EVEvalandgoClientBundle
Client API Bundle for Evalandgo.

Generally this bundle is based on [EvalandgoApiClient component](https://github.com/evalandgo/EvalandgoApiClient).

## Installation
In composer.json file, add :
```json
{
    "require": {
        "ev/evalandgo-client-bundle": "2.0.*"
    }
}

In app/AppKernel.php file, add :
```php
public function registerBundles()
{
    return array(
        // ...
        new EV\EvalandgoClientBundle\EVEvalandgoClientBundle(),
        // ...
    );
}
```

## Examples

### Configuration example
In config.yml
```yaml
# Evalandgo Client
ev_evalandgo_client:
    users:
        myevalandgo:  { client_id: 'CLIENT_ID', client_secret: 'CLIENT_SECRET' }
```

### Usage Example
In a Controller action
```php
public function indexAction() {
    $client = $this->get('ev_evalandgo_client.myevalandgo.client');

    $questionnaires = $client->resource('questionnaire')->all();

    return array(
        'questionnaires' => $questionnaires
    );
}
```

## How to contribute
To contribute just open a Pull Request with your new code taking into account that if you add new features or modify existing ones you have to document in this README what they do.

## License
EVEvalandgoClientBundle is licensed under [MIT](https://github.com/evalandgo/EVEvalandgoClientBundle/blob/master/LICENSE)