<?php
namespace Liloi\Judex\Exceptions;

use PHPUnit\Framework\TestCase;
use Liloi\Judex\Exceptions\JudexException;

/**
 * Check JudexException.
 */
class JudexExceptionTest extends TestCase
{
    /**
     * Tests {@link JudexException} class (default values).
     *
     * * Arrange: defines {@link JudexException} with default values.
     * * Act: throws exception.
     * * Assert: checks default values.
     */
    public function testDefault()
    {
        $exp = new JudexException();

        try
        {
            throw $exp;
        }
        catch (JudexException $e)
        {
            $this->assertEquals('Judex exception.', $e->getMessage());
            $this->assertEquals(0, $e->getCode());
            $this->assertEquals([], $e->getData());
            $this->assertNull($e->getPrevious());
        }
    }

    /**
     * Tests {@link JudexException} class (custom values).
     *
     * * Arrange: defines {@link JudexException} with custom values.
     * * Act: throws exception.
     * * Assert: checks custom values.
     */
    public function testCustom()
    {
        $pre = new \Exception();
        $data = [
            'test' => 'value'
        ];

        $exp = new JudexException(
            'test-message',
            'test-code',
            $pre,
            $data
        );

        try
        {
            throw $exp;
        }
        catch (JudexException $e)
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