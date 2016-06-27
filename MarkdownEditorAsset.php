<?php
/**
 * Created by PhpStorm.
 * User: r
 * Date: 27.06.16
 * Time: 7:02
 */

namespace altiore\yii2\markdown;

use yii\web\AssetBundle;

class MarkdownEditorAsset extends AssetBundle
{
    public $sourcePath = null;

    public $js = [
        '//cdn.jsdelivr.net/simplemde/latest/simplemde.min.js',
    ];

    public $css = [
        '//cdn.jsdelivr.net/simplemde/latest/simplemde.min.css',
    ];
}
