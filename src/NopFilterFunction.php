<?php
namespace Mushus\ValueFilter;

/**
 * no operation
 */
class NopFilterFunction extends FilterFunction
{
    public function filter($value)
    {
        return $this->next($value);
    }
}
