<?php
namespace PhpJudex\Exceptions;

use PHPUnit\Framework\TestCase;
use PhpJudex\Exceptions\GeneralException;

/**
 * Check GeneralException.
 */
class GeneralExceptionTest extends TestCase
{
    /**
     * Tests {@link GeneralException} class (default values).
     *
     * * Arrange: defines {@link GeneralException} with default values.
     * * Act: throws exception.
     * * Assert: checks default values.
     */
    public function testDefault()
    {
        $exp = new GeneralException();

        try
        {
            throw $exp;
        }
        catch (GeneralException $e)
        {
            $this->assertEquals('General exception.', $e->getMessage());
            $this->assertEquals(0, $e->getCode());
            $this->assertEquals([], $e->getData());
            $this->assertNull($e->getPrevious());
        }
    }

    /**
     * Tests {@link GeneralException} class (custom values).
     *
     * * Arrange: defines {@link GeneralException} with custom values.
     * * Act: throws exception.
     * * Assert: checks custom values.
     */
    public function testCustom()
    {
        $pre = new \Exception();
        $data = [
            'test' => 'value'
        ];

        $exp = new GeneralException(
            'test-message',
            'test-code',
            $pre,
            $data
        );

        try
        {
            throw $exp;
        }
        catch (GeneralException $e)
        {
            $this->assertEquals('test-message', $e->getMessage());
            $this->assertEquals('test-code', $e->getCode());
            $this->assertEquals($data, $e->getData());
            $this->assertEquals($data['test'], $e->getDataElement('test'));
            $this->assertEquals($pre, $e->getPrevious());

            $e->setDataElement('test', 'test-new');
            $this->assertEquals('test-new', $e->getDataElement('test'));
        }
    }
}