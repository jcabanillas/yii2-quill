<?php

declare(strict_types=1);

namespace jcabanillas\quill\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Quill Magic URL asset bundle.
 */
class QuillMagicUrlAsset extends AssetBundle
{
    /**
     * @var string CDN URL.
     */
    public $url = 'https://unpkg.com/quill-magic-url@latest/dist/';

    /**
     * @var array Lista de archivos JavaScript.
     */
    public $js = [
        'index.js',
    ];

    /**
     * @var array Dependencias de este activo.
     */
    public $depends = [

    ];

    /**
     * @inheritdoc
     */
    public function registerAssetFiles($view)
    {
        parent::registerAssetFiles($view);
    }
}
