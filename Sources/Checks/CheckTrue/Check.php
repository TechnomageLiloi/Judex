<?php

namespace PhpJudex\Checks\CheckTrue;

use PhpJudex\Checks\AbstractCheck;

/**
 * Assert check: $this->verifiedValue === true
 *
 * @package Assert
 */
class Check extends AbstractCheck
{
    /**
     * @inheritDoc
     */
    public function verify(): bool
    {
        return $this->verifiedValue === true;
    }
}