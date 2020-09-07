<?php
namespace PhpJudex;

use PhpJudex\Exceptions\GeneralException;
use PHPUnit\Framework\TestCase;
use PhpJudex\ListException;

/**
 * Check ExtendedException.
 */
class ListExceptionTest extends TestCase
{
    /**
     * Tests {@link ListException} class with two exceptions.
     *
     * * Arrange: defines {@link ListException} with two exceptions.
     * * Act: throws exception.
     * * Assert: checks exceptions.
     */
    public function testDefault()
    {
        $e1 = new \Exception();
        $e2 = new GeneralException();

        $exp = new ListException([
            'e1' => $e1,
            'e2' => $e2
        ]);

        try
        {
            throw $exp;
        }
        catch (ListException $e)
        {
            $this->assertEquals('List of exception.', $e->getMessage());
            $this->assertEquals(2, count($e->getExceptions()));
            $this->assertEquals($e1, $e->getException('e1'));
            $this->assertEquals($e2, $e->getException('e2'));

            $e->setException('e2', $e1);
            $this->assertEquals($e1, $e->getException('e2'));
        }
    }
}