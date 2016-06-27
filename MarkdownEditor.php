<?php
/**
 * @package   yii2-markdown
 * @author    Razzwan <razvanlomov@gmail.com>
 * @version   1.0
 */

namespace altiore\yii2\markdown;

use Yii;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\InputWidget;

/**
 * Markdown provides concrete implementation for A simple, beautiful, and embeddable JavaScript Markdown editor.
 *  - Delightful editing for beginners and experts alike.
 *  - Features built-in autosaving and spell checking. https://simplemde.com
 * @author Razzwan <razvanlomov@gmail.com>
 * @since  1.0
 */
class MarkdownEditor extends InputWidget
{
    /**
     * @var array the HTML attributes for the preview
     * container which will display the converted
     * HTML text
     */
    public $previewOptions = [];

    /**
     * Initialize the widget
     */
    public function init()
    {
        parent::init();
        $this->options['id'] = array_key_exists('id', $this->options) ? $this->options['id'] : $this->id;
        $this->registerAssets();
        echo $this->renderInput();
    }

    /**
     * Register client assets
     */
    protected function registerAssets()
    {
        $view = $this->getView();
        MarkdownEditorAsset::register($view);
        $js = "var simplemde = new SimpleMDE({ {$this->prepareOptionsForSimpleMDE()} });";
        $view->registerJs($js, View::POS_END);
    }

    /**
     * Render the text area input
     */
    protected function renderInput()
    {
        if ($this->hasModel()) {
            $input = Html::activeTextArea($this->model, $this->attribute, $this->options);
        } else {
            $input = Html::textArea($this->name, $this->value, $this->options);
        }
        Html::addCssClass($this->previewOptions, 'hidden');
        $preview = Html::tag('div', '', $this->previewOptions);

        return $input . "\n" . $preview;
    }

    /**
     * Prepare options to widget
     * @return string
     */
    private function prepareOptionsForSimpleMDE()
    {
        $this->options['element'] = "document.getElementById('{$this->options['id']}')";
        unset($this->options['id']);
        foreach ($this->options as $key => $value) {
            if (strpos($value, 'document') !== false || strpos($value, '$') !== false) {
                $this->options[$key] = $key . ': ' . $value;
            } else {
                $this->options[$key] = $key . ': "' . $value . '"';
            }
        }

        return implode(', ', $this->options);
    }
}
