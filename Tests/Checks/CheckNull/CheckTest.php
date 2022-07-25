<?php

namespace PhpJudex\Checks\CheckNull;

use PHPUnit\Framework\TestCase;
use PhpJudex\Assert;

/**
 * Check assert class.
 */
class CheckTest extends TestCase
{
    /**
     * Tests {@link Assert::null()} method (default values).
     *
     * * Arrange: defines {@link Assert} in {@link \PhpJudex\Checks\CheckNull\Exception} catch.
     * * Act: calls {@link Assert::null()} method.
     * * Assert: checks default values.
     */
    public function testTrueDefault(): void
    {
        Assert::null(null);

        try
        {
            Assert::null('test');
        }
        catch (Exception $e)
        {
            $this->assertEquals('Null expected, but different value provided.', $e->getMessage());
            $this->assertEquals(0x03, $e->getCode());
            $this->assertEquals([], $e->getData());
            $this->assertNull($e->getPrevious());
        }
    }

    /**
     * Tests {@link Assert::null()} method (manual values).
     *
     * * Arrange: defines {@link Assert} in {@link \PhpJudex\Checks\CheckNull\Exception} catch.
     * * Act: calls {@link Assert::null()} method.
     * * Assert: checks manual values.
     */
    public function testTrueManual(): void
    {
        Assert::null(null, 'Test.', 1,['a' => 'b']);

        try
        {
            Assert::null('test', 'Test.', 1,['a' => 'b']);
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