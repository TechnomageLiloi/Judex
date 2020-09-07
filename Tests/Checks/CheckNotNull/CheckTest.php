<?php

namespace PhpJudex\Checks\CheckNotNull;

use PHPUnit\Framework\TestCase;
use PhpJudex\Assert;

/**
 * Check assert class.
 */
class CheckTest extends TestCase
{
    /**
     * Tests {@link Assert::notNull()} method (default values).
     *
     * * Arrange: defines {@link Assert} in {@link \PhpJudex\Checks\CheckNotNull\Exception} catch.
     * * Act: calls {@link Assert::notNull()} method.
     * * Assert: checks default values.
     */
    public function testTrueDefault(): void
    {
        Assert::notNull('test');

        try
        {
            Assert::notNull(null);
        }
        catch (Exception $e)
        {
            $this->assertEquals('Not null expected, but different value provided.', $e->getMessage());
            $this->assertEquals(0x04, $e->getCode());
            $this->assertEquals([], $e->getData());
            $this->assertNull($e->getPrevious());
        }
    }

    /**
     * Tests {@link Assert::notNull()} method (manual values).
     *
     * * Arrange: defines {@link Assert} in {@link \PhpJudex\Checks\CheckNotNull\Exception} catch.
     * * Act: calls {@link Assert::notNull()} method.
     * * Assert: checks manual values.
     */
    public function testTrueManual(): void
    {
        Assert::notNull('test', 'Test.', ['a' => 'b']);

        try
        {
            Assert::notNull(null, 'Test.', ['a' => 'b']);
        }
        catch (Exception $e)
        {
            $this->assertEquals('Test.', $e->getMessage());
            $this->assertEquals(0x04, $e->getCode());
            $this->assertEquals(['a' => 'b'], $e->getData());
            $this->assertNull($e->getPrevious());
        }
    }
}