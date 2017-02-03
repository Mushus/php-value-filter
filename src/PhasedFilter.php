<?php
namespace Mushus\ValueFilter;

use Mushus\ValueFilter\Functions;

class PhasedFilter
{
    /** nonull */
    private $filterFunc;

    /**
     * initialize
     */
    public function __construct()
    {
        $this->filterFunc = new Functions\NopFilterFunction();
    }

    /**
     * add filter
     */
    public function add(Functions\FilterFunction ...$filters)
    {
        foreach($filters as $filter)
        {
            $this->filterFunc->getLast()->setNext($filter);
        }
        return $this;
    }

    public function addFunc(callable ...$funcs)
    {
        foreach($funcs as $func)
        {
            $this->filterFunc->getLast()->setNext(new Functions\CustomFilterFunction($func));
        }
        return $this;
    }

    public function filter($value)
    {
        return $this->filterFunc->filter($value);
    }
}
