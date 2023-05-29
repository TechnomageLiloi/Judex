<?php

namespace Liloi\Judex\Exceptions\File;

use Liloi\Judex\Checks\Exception as ChecksException;

class NotFoundException extends ChecksException
{
    /**
     * @inheritDoc
     */
    protected $defaultMessage = 'File not found';

    /**
     * @param string $filename Filename, that is not found.
     * @return static
     */
    public static function create(string $filename): self
    {
        return new self(null, null, null, ['filename' => $filename]);
    }
}