<?php

declare(strict_types=1);

namespace bizley\quill\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Local Highlight.js assets.
 *
 * Highlight.js can be found at
 * https://highlightjs.org/
 * https://github.com/isagalaev/highlight.js
 */
class HighlightLocalAsset extends AssetBundle
{
    /** {@inheritdoc} */
    public $sourcePath = '@npm/highlight.js';

    /** {@inheritdoc} */
    public $js = ['lib/highlight.js'];

    /**
     * @var string stylesheet to use.
     * @since 2.0
     */
    public $style;

    /** {@inheritdoc} */
    public $css = [
        'style' => 'styles/default.css'
    ];

    /**
     * Registers CSS and JS file based on version.
     * @param View $view the view that the asset files are to be registered with.
     */
    public function registerAssetFiles($view): void
    {
        if ($this->style === null) {
            $style = 'default';
        } else {
            $style = preg_replace('#(\.min)?\.css$#', '', $this->style);
        }
        $this->css['style'] = 'styles/' . $style . '.css';

        parent::registerAssetFiles($view);
    }
}
