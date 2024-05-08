<?php

declare(strict_types=1);

namespace bizley\tests\assets;

use bizley\quill\assets\HighlightLocalAsset;
use PHPUnit\Framework\TestCase;
use Yii;
use yii\base\InvalidConfigException;
use yii\web\Application;

class HighlightLocalAssetTest extends TestCase
{
    /** @throws InvalidConfigException */
    public static function setUpBeforeClass(): void
    {
        new Application(
            [
                'id' => 'QuillTest',
                'basePath' => __DIR__ . '/../',
                'vendorPath' => __DIR__ . '/../vendor',
                'aliases' => ['@npm' => '@vendor/npm-asset'],
                'components' => [
                    'assetManager' => [
                        'linkAssets' => true,
                        'basePath' => '@bizley/tests/runtime',
                        'baseUrl' => '/'
                    ]
                ]
            ]
        );
    }

    public static function tearDownAfterClass(): void
    {
        Yii::$app = null;
    }

    public function providerForStyles(): array
    {
        return [
            'empty' => [null, 'styles/default.css'],
            'without css' => ['test', 'styles/test.css'],
            'with css' => ['test.css', 'styles/test.css'],
            'with min css' => ['test.min.css', 'styles/test.css']
        ];
    }

    /**
     * @test
     * @dataProvider providerForStyles
     * @param string|null $style
     * @param string $css
     */
    public function shouldProperlyRegisterAssetFiles(?string $style, string $css): void
    {
        $asset = new HighlightLocalAsset();
        $asset->style = $style;
        $asset->registerAssetFiles(Yii::$app->view);

        self::assertSame(['style' => $css], $asset->css);
    }
}
