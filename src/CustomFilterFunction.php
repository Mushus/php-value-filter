<?php
namespace Mushus\ValueFilter;

class CustomFilterFunction extends FilterFunction
{
    private $filterFunc;

    public function __construct(callable $filterFunc)
    {
        $this->filterFunc = $filterFunc;
    }

    public function filter($value)
    {
        $self = $this;
        $nextFunc = function($value) use($self)
        {
            return $self->next($value);
        };
        $filterFunc = $self->filterFunc;
        return $filterFunc($value, $nextFunc);
    }
}
