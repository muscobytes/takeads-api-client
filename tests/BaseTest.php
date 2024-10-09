<?php

namespace Muscobytes\TakeadsApi\Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(BaseTest::class)]
class BaseTest extends TestCase
{
    public function testIfTrue()
    {
        $this->assertTrue(true);
    }


    protected static function loadFixtures(string $folder): array
    {
        $result = [];
        $fixturesPath = __DIR__ . '/fixtures/' . $folder . '/';
        if ($handle = opendir($fixturesPath)) {
            while (false !== ($entry = readdir($handle))) {
                if (!in_array($entry, ['.', '..', '.DS_Store'])) {
                    $result[]['entry'] = json_decode(file_get_contents($fixturesPath . $entry), true);
                }
            }
            closedir($handle);
        }
        return $result;

    }
}