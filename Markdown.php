<?php
/**
 * @package   yii2-markdown
 * @author    Razzwan <razvanlomov@gmail.com>
 * @version   1.0
 */
namespace altiore\yii2\markdown;

use Yii;

/**
 * Markdown provides concrete implementation for Better Markdown Parser in PHP http://parsedown.org
 * @author Razzwan <razvanlomov@gmail.com>
 * @since  1.0
 */
class Markdown
{
    /**
     * Converts markdown into HTML
     * @param string $content
     * @param array  $config . Options to configure erusev/parsedown
     *                       - more: https://github.com/erusev/parsedown/wiki
     * @return string
     */
    public static function convert($content, $config = [])
    {
        $config['class'] = \Parsedown::class;
        /** @var \Parsedown $parserdown */
        $parserdown = Yii::createObject($config);

        return $parserdown->text($content);
    }
}
