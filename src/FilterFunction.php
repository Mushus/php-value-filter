<?php
namespace Mushus\ValueFilter;

abstract class FilterFunction
{
    private $next;

    public function setNext(FilterFunction $filter)
    {
        $this->next = $filter;
    }

    public function getLast() {
        return isset($next)? $next->getLast() : $this;
    }

    public function next($value)
    {
        if (isset($this->next))
        {
            return $this->next->filter($value);
        }
        return $value;
    }

    public abstract function filter($value);
}
