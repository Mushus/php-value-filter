<?php
namespace Mushus\ValueFilter\Functions;

abstract class FilterFunction
{
    private $next;

    public function setNext(FilterFunction $filter)
    {
        $this->next = $filter;
    }

    public function getLast() {
        return isset($this->next)? $this->next->getLast() : $this;
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
