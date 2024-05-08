<?php

declare(strict_types=1);

namespace jcabanillas\quill\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Quill Magic URL asset bundle.
 */
class MagicUrlAsset extends AssetBundle
{
    /**
     * @var string CDN URL.
     */
    public $url = 'https://unpkg.com/quill-magic-url@3.0.0/dist/';

    /**
     * @var array Dependencias de este activo.
     */
    public $depends = [

    ];

    /**
     * @inheritdoc
     */
    public function registerAssetFiles($view): void
    {
        $this->js = [$this->url . 'index.js'];

        parent::registerAssetFiles($view);
    }
}
