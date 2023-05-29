<?php
namespace Liloi\Judex;

use PHPUnit\Framework\TestCase;
use Liloi\Judex\ExtendedException;

/**
 * Check ExtendedException.
 */
class ExtendedExceptionTest extends TestCase
{
    /**
     * Tests {@link ExtendedException} class (default values).
     *
     * * Arrange: defines {@link ExtendedException} with default values.
     * * Act: throws exception.
     * * Assert: checks default values.
     */
    public function testDefault()
    {
        $exp = new ExtendedException();

        try
        {
            throw $exp;
        }
        catch (ExtendedException $e)
        {
            $this->assertEquals('Extended exception.', $e->getMessage());
            $this->assertEquals(0x100, $e->getCode());
            $this->assertEquals([], $e->getData());
            $this->assertNull($e->getPrevious());
        }
    }

    /**
     * Tests {@link ExtendedException} class (custom values).
     *
     * * Arrange: defines {@link ExtendedException} with custom values.
     * * Act: throws exception.
     * * Assert: checks custom values.
     */
    public function testCustom()
    {
        $pre = new \Exception();
        $data = [
            'test' => 'value'
        ];

        $exp = new ExtendedException(
            'test-message',
            'test-code',
            $pre,
            $data
        );

        try
        {
            throw $exp;
        }
        catch (ExtendedException $e)
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