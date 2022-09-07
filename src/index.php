<?php
	defined('_JEXEC') or die('Restricted access');

	$wa = $this->getWebAssetManager();
	$wa->useStyle('template.ttactua.article');
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
		<div class="component">
			<jdoc:include type="component" />
		</div>
	</body>
</html>
