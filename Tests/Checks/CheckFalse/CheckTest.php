<?php

namespace PhpJudex\Checks\CheckFalse;

use PHPUnit\Framework\TestCase;
use PhpJudex\Assert;

/**
 * Check assert class.
 */
class CheckTest extends TestCase
{
    /**
     * Tests {@link Assert::false()} method (default values).
     *
     * * Arrange: defines {@link Assert} in {@link \PhpJudex\Checks\CheckFalse\Exception} catch.
     * * Act: calls {@link Assert::false()} method.
     * * Assert: checks default values.
     */
    public function testTrueDefault(): void
    {
        Assert::false(false);

        try
        {
            Assert::false(true);
        }
        catch (Exception $e)
        {
            $this->assertEquals('False expected, but different value provided.', $e->getMessage());
            $this->assertEquals(0x02, $e->getCode());
            $this->assertEquals([], $e->getData());
            $this->assertNull($e->getPrevious());
        }
    }

    /**
     * Tests {@link Assert::false()} method (manual values).
     *
     * * Arrange: defines {@link Assert} in {@link \PhpJudex\Checks\CheckFalse\Exception} catch.
     * * Act: calls {@link Assert::false()} method.
     * * Assert: checks manual values.
     */
    public function testTrueManual(): void
    {
        Assert::false(false, 'Test.', 1,['a' => 'b']);

        try
        {
            Assert::false(true, 'Test.', 1,['a' => 'b']);
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