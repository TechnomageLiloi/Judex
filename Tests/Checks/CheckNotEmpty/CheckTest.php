<?php

namespace Liloi\Judex\Checks\CheckNotEmpty;

use PHPUnit\Framework\TestCase;
use Liloi\Judex\Assert;

/**
 * Check assert class.
 */
class CheckTest extends TestCase
{
    /**
     * Tests {@link Assert::notEmpty()} method (default values).
     *
     * * Arrange: defines {@link Assert} in {@link \Liloi\Judex\Checks\CheckNotEmpty\Exception} catch.
     * * Act: calls {@link Assert::notEmpty()} method.
     * * Assert: checks default values.
     */
    public function testTrueDefault(): void
    {
        Assert::notEmpty(['test']);

        try
        {
            Assert::notEmpty([]);
        }
        catch (Exception $e)
        {
            $this->assertEquals('Not empty expected, but empty value provided.', $e->getMessage());
            $this->assertEquals(0x06, $e->getCode());
            $this->assertEquals([], $e->getData());
            $this->assertNull($e->getPrevious());
        }
    }

    /**
     * Tests {@link Assert::notEmpty()} method (manual values).
     *
     * * Arrange: defines {@link Assert} in {@link \Liloi\Judex\Checks\CheckNotEmpty\Exception} catch.
     * * Act: calls {@link Assert::notEmpty()} method.
     * * Assert: checks manual values.
     */
    public function testTrueManual(): void
    {
        Assert::notEmpty(['test'], 'Test.', 1,['a' => 'b']);

        try
        {
            Assert::notEmpty([], 'Test.', 1,['a' => 'b']);
        }
        catch (Exception $e)
        {
            $this->assertEquals('Test.', $e->getMessage());
            $this->assertEquals(1, $e->getCode());
            $this->assertEquals(['a' => 'b'], $e->getData());
            $this->assertNull($e->getPrevious());
        }
    }
}