<?php

namespace PhpJudex\Checks\CheckTrue;

use PHPUnit\Framework\TestCase;
use PhpJudex\Assert;

/**
 * Check assert class.
 */
class CheckTest extends TestCase
{
    /**
     * Tests {@link Assert::true()} method (default values).
     *
     * * Arrange: defines {@link Assert} in {@link \PhpJudex\Checks\CheckTrue\Exception} catch.
     * * Act: calls {@link Assert::true()} method.
     * * Assert: checks default values.
     */
    public function testTrueDefault(): void
    {
        Assert::true(true);

        try
        {
            Assert::true(false);
        }
        catch (Exception $e)
        {
            $this->assertEquals('True expected, but different value provided.', $e->getMessage());
            $this->assertEquals(0x01, $e->getCode());
            $this->assertEquals([], $e->getData());
            $this->assertNull($e->getPrevious());
        }
    }

    /**
     * Tests {@link Assert::true()} method (manual values).
     *
     * * Arrange: defines {@link Assert} in {@link \PhpJudex\Checks\CheckTrue\Exception} catch.
     * * Act: calls {@link Assert::true()} method.
     * * Assert: checks manual values.
     */
    public function testTrueManual(): void
    {
        Assert::true(true, 'Test.', ['a' => 'b']);

        try
        {
            Assert::true(false, 'Test.', ['a' => 'b']);
        }
        catch (Exception $e)
        {
            $this->assertEquals('Test.', $e->getMessage());
            $this->assertEquals(0x01, $e->getCode());
            $this->assertEquals(['a' => 'b'], $e->getData());
            $this->assertNull($e->getPrevious());
        }
    }
}