<?php

/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   (C) 2013 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

?>
<div class="ball">
  <div class="date-container" datetime="<?php echo HTMLHelper::_('date', $displayData['item']->publish_up, 'c'); ?>" itemprop="datePublished">
    <span class="shadow"></span>
  <div class="month"><time>
		  <?php echo HTMLHelper::_('date', $displayData['item']->publish_up, Text::_('M')); ?>
	  </time></div>
  <div class="day"><time>
		  <?php echo HTMLHelper::_('date', $displayData['item']->publish_up, Text::_('d')); ?>
	  </time></div>
  <div class="year"><time>
		  <?php echo HTMLHelper::_('date', $displayData['item']->publish_up, Text::_('Y')); ?>
	  </time></div>
</div>
</div>
