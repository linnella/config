Config manager for admin
========================

## Installation

```
$ composer require linnella/config

$ php artisan migrate
```

Open `app/Providers/AppServiceProvider.php`, and call the `Config::load()` method within the `boot` method:

```php
<?php

namespace App\Providers;

use Core\Admin\Config\Config;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Config::load();
    }
}
```

Then run: 

```
$ php artisan admin:import config
```

Open `http://host/admin/config`

## Usage

After add config in the panel, use `config($key)` to get value you configured.

License
------------
Licensed under [The MIT License (MIT)](LICENSE).
