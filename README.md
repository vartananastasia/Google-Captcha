# Google Captcha

Uses:

``GuzzleHttp/6.2.1`` - http://docs.guzzlephp.org/en/stable/overview.html#installation
``curl/7.51.0`` 
``PHP/5.6.29``
 
Use:

```php
$gc = new \GoogleCaptcha\Client($key, $response);
$access = $gc->get_access();
```

Where:
 
```$response``` - the user response token provided by reCAPTCHA, verifying the user on your site.

```$key``` - the shared key between your site and reCAPTCHA.

```get_access()``` - returns ```true``` or ```false```