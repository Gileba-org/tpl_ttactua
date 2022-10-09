<?php
	defined('_JEXEC') or die('Restricted access');

	use Joomla\CMS\Factory;

	$app = Factory::getApplication();
	$menu 		= $app->getMenu();
	$lang 		= $app->getLanguage();
	$page = $app->getRouter()->getVars();
	$wa = $this->getWebAssetManager();

	if ($menu->getActive() == $menu->getDefault($lang->getTag())) {
		$wa->useStyle('template.ttactua.contentheader');
	}
	else {
		switch ($page["option"]) {
			case "com_content":
				switch ($page["view"]) {
					case "article":
						$wa->useStyle('template.ttactua.article');
						break;
					case "category":
						switch ($page["layout"]) {
							case "blog":
								$wa->useStyle('template.ttactua.blog');
								break;
							default:
								break;
							}
						break;
					case "featured":
						$wa->useStyle('template.ttactua.featured');
						break;
					default:
						break;
				}
				break;
			case "com_convertforms":
				$wa->useStyle('template.ttactua.form');
			default:
				$wa->useStyle('template.ttactua.base');
		}
	}
?>

<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" >
   <head>
		<jdoc:include type="metas" />
		<jdoc:include type="styles" />
		<jdoc:include type="scripts" />

<?php
		// Set viewport
		$this->setMetaData('viewport', 'width=device-width, initial-scale=1');
?>
	</head>
	<body>
		<div style="display: none">Option: <?php echo $page['option'];?>; View: <?php echo $page['view']; ?>; Layout: <?php echo $page['layout'] ?>;</div>
		<div class="header">
			<div class="logo">
				<a href="" alt="Home"><img src="media/templates/site/ttactua/images/logo.jpg" /></a>
				<jdoc:include type="modules" name="logo" />
			</div>
			<div class="nav">
				<jdoc:include type="modules" name="nav" />
			</div>
		</div>
		<div class="contentheader">
			<jdoc:include type="modules" name="content-header" />
		</div>
<?php
	if ($menu->getActive() != $menu->getDefault($lang->getTag())) :
?>
		<div class="component">
			<jdoc:include type="component" />
		</div>
<?php
	endif;
?>
		<div class="footer">
			<jdoc:include type="modules" name="footer" />
		</div>
	</body>
</html>
