<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

  ## Extending TypoScript from static template uid=43 to set up userdefined tag:
t3lib_extMgm::addTypoScript($_EXTKEY,'setup','
	tt_content.text.20.parseFunc.tags.codebox = < plugin.'.t3lib_extMgm::getCN($_EXTKEY).'_pi1
',43);


t3lib_extMgm::addPItoST43($_EXTKEY,'pi1/class.tx_skcodebox_pi1.php','_pi1','',0);
?>