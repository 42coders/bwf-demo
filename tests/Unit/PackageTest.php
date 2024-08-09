<?php

namespace Tests\Unit;

use App\Package;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class PackageTest extends TestCase
{
    /**
     * @param $rawPackageObject
     * @param $expectedName
     * @param $expectedVersion
     * @param $expectedDescription
     */
    #[DataProvider('packageDataProvider')]
    public function testCreatePackageObjectFromString(
        $rawPackageObject,
        $expectedName,
        $expectedVersion,
        $expectedDescription
    ) {
        $package = new Package($rawPackageObject);

        $this->assertEquals($expectedName, $package->getName());
        $this->assertEquals($expectedVersion, $package->getVersion());
        $this->assertEquals($expectedDescription, $package->getDescription());
    }

    public static function packageDataProvider()
    {
        $installedPackages = json_decode(file_get_contents(__DIR__ . '/installed.json'));

        return [
                [
                    $installedPackages[0],
                    '42coders/document-templates',
                    '0.5.0',
                    'Document template management package.'
                ],
        ];
    }
}
