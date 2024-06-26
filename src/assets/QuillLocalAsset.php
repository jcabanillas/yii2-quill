<?php

declare(strict_types=1);

namespace jcabanillas\quill\assets;

use jcabanillas\quill\Quill;
use yii\web\AssetBundle;
use yii\web\View;

/**
 * Local Quill assets.
 *
 * Quill can be found at
 * https://quilljs.com/
 * https://github.com/quilljs/quill/
 */
class QuillLocalAsset extends AssetBundle
{
    /** {@inheritdoc} */
    public $sourcePath = '@npm/quill/dist';

    /** {@inheritdoc} */
    public $js = ['quill.min.js'];

    /** {@inheritdoc} */
    public $css = [
        'theme' => 'quill.core.css'
    ];

    /** @var string editor theme */
    public $theme;

    /**
     * Registers CSS file based on theme.
     * @param View $view the view that the asset files are to be registered with.
     */
    public function registerAssetFiles($view): void
    {
        switch ($this->theme) {
            case Quill::THEME_SNOW:
                $this->css['theme'] = 'quill.snow.css';
                break;

            case Quill::THEME_BUBBLE:
                $this->css['theme'] = 'quill.bubble.css';
                break;

            default:
                if (null !== $this->theme) {
                    $this->css['theme'] = $this->theme;
                }
        }

        parent::registerAssetFiles($view);
    }
}
