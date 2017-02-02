# php-value-filter
Phased value conversion filter for php

## How to use

```php
class StringToInt extends FilterFunction
{
    public function filter($value)
    {
        $result = intval(value);
        return $this->next($result);
    }
}

$filter = new ValueFilter();
$filter
    ->add(new StringToInt())
    ->addFunc(function($value, $next) {
        return $next($value + 1);
    });

// argument -> ("2" -> 2 -> 3) -> return value
var_dump($filter->filter("2"));
```
