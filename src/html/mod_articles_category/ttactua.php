<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 *
 * @copyright   (C) 2010 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;

if (!$list) {
    return;
}

?>
<div class="mod-articlescategory category-module">
    <?php $items = $list; ?>
    <?php require ModuleHelper::getLayoutPath('mod_articles_category', $params->get('layout', 'ttactua') . '_items'); ?>
</div>
