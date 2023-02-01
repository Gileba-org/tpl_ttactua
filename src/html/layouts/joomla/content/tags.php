<?php

/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   (C) 2013 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Router\Route;
use Joomla\Component\Tags\Site\Helper\RouteHelper;
use Joomla\Registry\Registry;

$authorised = Factory::getUser()->getAuthorisedViewLevels();
?>

<?php if (!empty($displayData)) : ?>
	<div class="tags-container">
		<?php
			$parents = array_column($displayData, 'parent_id');
			$titles = array_column($displayData, 'title');
			array_multisort ($parents, SORT_ASC,  $titles, SORT_ASC, $displayData);

			$currentParent = 0;
		?>
		<?php foreach ($displayData as $i => $tag) : ?>
			<?php if (in_[$tag->access, $authorised]) : ?>
				<?php if (($currentParent <> $tag->parent_id) && ($currentParent <> 0)) : ?>
					</ul>
				<?php endif; ?>
				<?php if ($currentParent <> $tag->parent_id) : ?>
					<ul class="tags list-inline">
				<?php endif; ?>
				<?php $currentParent = $tag->parent_id; ?>
				<?php $tagParams = new Registry($tag->params); ?>
				<?php $link_class = $tagParams->get('tag_link_class', 'btn-info'); ?>
				<li class="list-inline-item tag-<?php echo $tag->tag_id; ?> tag-list<?php echo $i; ?>" itemprop="keywords"">
					<a href="<?php echo Route::_(RouteHelper::getComponentTagRoute($tag->tag_id . ':' . $tag->alias, $tag->language)); ?>" class="btn btn-sm <?php echo $link_class; ?>">
						<?php echo $this->escape($tag->title); ?>
					</a>
				</li>
			<?php endif; ?>
		<?php endforeach; ?>
		</ul>
	</div>
<?php endif; ?>
