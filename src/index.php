<?php
	defined('_JEXEC') or die('Restricted access');

	use Joomla\CMS\HTML\HTMLHelper;
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" >
   <head>
		<jdoc:include type="head" />

<?php
		// Set viewport
		$this->setMetaData('viewport', 'width=device-width, initial-scale=1');

		// Stylesheets
		HTMLHelper::_('stylesheet', 'template.css', array('version' => 'auto', 'relative' => true));
?>
	</head>
	<body>
		<div class="component">
			<jdoc:include type="component" />
		</div>
	</body>
</html>
