## Jira Rest PHP Client

### Installation

```bash
composer require mcmatters/jira-api
```

### Usage

```php
<?php

declare(strict_types = 1);

require 'vendor/autoload.php';

$apiUrl = 'https://organization.atlassian.net/rest/api/2';
$token = 'some_token';

$client = new \McMatters\JiraApi\JiraClient($apiUrl, $token);

try {
    $project = $client->project()->get('PROJ');
} catch (Throwable $e) {
    $error = json_decode($e->getMessage(), true);
}
```
