<?php

/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   (C) 2014 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;

$item    = $displayData['data'];
$display = $item->text;
$app = Factory::getApplication();

switch ((string) $item->text) {
    // Check for "Start" item
    case Text::_('JLIB_HTML_START'):
        $icon = $app->getLanguage()->isRtl() ? 'icon-angle-double-right' : 'icon-angle-double-left';
        $aria = Text::sprintf('JLIB_HTML_GOTO_POSITION', strtolower($item->text));
        $class2 = "start";
        break;

    // Check for "Prev" item
    case $item->text === Text::_('JPREV'):
        $item->text = Text::_('JPREVIOUS');
        $icon = $app->getLanguage()->isRtl() ? 'icon-angle-right' : 'icon-angle-left';
        $aria = Text::sprintf('JLIB_HTML_GOTO_POSITION', strtolower($item->text));
        $class2 = "prev";
        break;

    // Check for "Next" item
    case Text::_('JNEXT'):
        $icon = $app->getLanguage()->isRtl() ? 'icon-angle-left' : 'icon-angle-right';
        $aria = Text::sprintf('JLIB_HTML_GOTO_POSITION', strtolower($item->text));
        $class2 = "next";
        break;

    // Check for "End" item
    case Text::_('JLIB_HTML_END'):
        $icon = $app->getLanguage()->isRtl() ? 'icon-angle-double-left' : 'icon-angle-double-right';
        $aria = Text::sprintf('JLIB_HTML_GOTO_POSITION', strtolower($item->text));
        $class2 = "end";
        break;

    default:
        $icon = null;
        $aria = Text::sprintf('JLIB_HTML_GOTO_PAGE', strtolower($item->text));
        break;
}

if ($icon !== null) {
    $display = '<span class="' . $icon . '" aria-hidden="true"></span>';
}

if ($displayData['active']) {
    if ($item->base > 0) {
        $limit = 'limitstart.value=' . $item->base;
    } else {
        $limit = 'limitstart.value=0';
    }

    $class = 'active';

    $link = 'href="' . $item->link . '"';
} else {
    $class = (property_exists($item, 'active') && $item->active) ? 'active' : 'disabled';
}

?>
<?php if ($displayData['active']) : ?>
    <li class="<?php echo $class2; ?> page-item">
        <span>
            <a aria-label="<?php echo $aria; ?>" <?php echo $link; ?> class="page-link">
                <?php echo $display; ?>
            </a>
        </span>
    </li>
<?php elseif (isset($item->active) && $item->active) : ?>
    <?php $aria = Text::sprintf('JLIB_HTML_PAGE_CURRENT', strtolower($item->text)); ?>
    <li class="<?php echo $class; ?> page-item">
        <span><a aria-current="true" aria-label="<?php echo $aria; ?>" href="#" class="page-link"><?php echo $display; ?></a></span>
    </li>
<?php else : ?>
    <li class="<?php echo $class . ' ' . $class2; ?> page-item">
        <span class="page-link" aria-hidden="true"><?php echo $display; ?></span>
    </li>
<?php endif; ?>
