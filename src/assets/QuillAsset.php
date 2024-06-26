<?php

declare(strict_types=1);

namespace jcabanillas\quill\assets;

use jcabanillas\quill\Quill;
use yii\base\InvalidConfigException;
use yii\web\AssetBundle;
use yii\web\View;

/**
 * Quill assets.
 *
 * Quill can be found at
 * https://quilljs.com/
 * https://github.com/quilljs/quill/
 */
class QuillAsset extends AssetBundle
{
    /**
     * @var string CDN URL.
     * @since 2.0
     */
    public $url = 'https://cdn.quilljs.com/';

    /**
     * @var string version to fetch from CDN.
     * Version different from default for this release might not work correctly.
     * @since 2.0
     */
    public $version;

    /**
     * @var string editor theme
     */
    public $theme;

    /**
     * Register CSS and JS file based on theme and version.
     * @param View $view the view that the asset files are to be registered with.
     * @throws InvalidConfigException
     */
    public function registerAssetFiles($view): void
    {
        if ($this->version === null) {
            throw new InvalidConfigException('You must provide version for Quill!');
        }

        switch ($this->theme) {
            case Quill::THEME_SNOW:
                $this->css = [$this->url . $this->version . '/quill.snow.css'];
                break;

            case Quill::THEME_BUBBLE:
                $this->css = [$this->url . $this->version . '/quill.bubble.css'];
                break;

            default:
                $this->css = [$this->url . $this->version . '/quill.core.css'];
        }

        $this->js = [$this->url . $this->version . '/quill.min.js'];

        parent::registerAssetFiles($view);
    }
}
