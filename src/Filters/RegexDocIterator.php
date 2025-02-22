<?php

namespace com\github\gooh\InterfaceDistiller\Filters;

class RegexDocIterator extends \FilterIterator
{
    /**
     * @var string
     */
    protected $pcrePattern;

    /**
     * @param \Iterator $iterator
     * @param string $pcrePattern
     */
    public function __construct(\Iterator $iterator, $pcrePattern)
    {
        $this->pcrePattern = $pcrePattern;
        parent::__construct($iterator);
    }

    /**
     * @see \FilterIterator::accept()
     * @return bool
     */
    public function accept()
    {
        if($doc = $this->current()->getDocComment()) {
            return (bool) preg_match($this->pcrePattern, $doc);
        }

        return false;
    }
}
