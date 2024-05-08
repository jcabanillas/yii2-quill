<?php

declare(strict_types=1);

namespace jcabanillas\quill\assets;

use yii\web\AssetBundle;

/**
 * Local KaTeX assets.
 *
 * KaTeX can be found at
 * https://khan.github.io/KaTeX/
 * https://github.com/Khan/KaTeX
 */
class MagicUrlLocalAsset extends AssetBundle
{
    /** {@inheritdoc} */
    public $sourcePath = '@npm/quill-magic-url/dist';

    /** {@inheritdoc} */
    public $js = ['index.js'];

}
