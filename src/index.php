<?php
	defined('_JEXEC') or die('Restricted access');

	use Joomla\CMS\Factory;

	$app = Factory::getApplication();
	$menu = $app->getMenu();
	$lang = $app->getLanguage();
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
			case "com_tags":
				$wa->useStyle('template.ttactua.tags');
			default:
				$wa->useStyle('template.ttactua.base');
		}
	}
?>

<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" >
   <head>
<?php	if ($this->params->get('tagmanager')) {	?>
		<!-- Google tag (gtag.js) -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $this->params->get('tagmanager');	?>"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			gtag('config', '<?php echo $this->params->get('tagmanager'); ?>');
		</script>
<?php	}	?>
		<jdoc:include type="metas" />
		<jdoc:include type="styles" />
		<jdoc:include type="scripts" />

<?php
		// Set viewport
		$this->setMetaData('viewport', 'width=device-width, initial-scale=1');
?>

<?php

?>
	</head>
	<body>
<?php	if ($this->params->get('publisherid')) {	?>
			<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-<?php echo $this->params->get('googleads'); ?>" crossorigin="anonymous"></script>
<?php	}	?>
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
<?php	if ($this->params->get('publisherid')) {	?>
		<script>
			 (adsbygoogle = window.adsbygoogle || []).push({});
		</script>
<?php	}	?>
	</body>
</html>
