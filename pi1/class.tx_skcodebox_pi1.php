<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2005 Steffen Kamper (steffen@dislabs.de)
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
/**
 * Plugin 'CodeBox' for the 'sk_codebox' extension.
 *
 * @author	Steffen Kamper <steffen@dislabs.de>
 */


require_once(PATH_tslib.'class.tslib_pibase.php');
require_once (t3lib_extMgm::extPath('sk_codebox').'geshi.php');

class tx_skcodebox_pi1 extends tslib_pibase {
	var $prefixId = 'tx_skcodebox_pi1';		// Same as class name
	var $scriptRelPath = 'pi1/class.tx_skcodebox_pi1.php';	// Path to this script relative to the extension dir.
	var $extKey = 'sk_codebox';	// The extension key.
	
	var $highLightStyles = array(
		'prespace' 			=> array('',''),	// Space before any content on a line
		'objstr_postspace' 	=> array('',''),	// Space after the object string on a line
		'operator_postspace' => array('',''),	// Space after the operator on a line
		'operator' 			=> array('<span style="color: black; font-weight: bold;">','</span>'),	// The operator char

		'value' 			=> array('<span style="color: #cc0000;">','</span>'),	// The value of a line
		'objstr' 			=> array('<span style="color: #0000cc;">','</span>'),	// The object string of a line
		'value_copy' 		=> array('<span style="color: #006600;">','</span>'),	// The value when the copy syntax (<) is used; that means the object reference
		'value_unset' 		=> array('<span style="background-color: #66cc66;">','</span>'),	// The value when an object is unset. Should not exist.
		//'ignored'			=> array('<span style="background-color: #66cc66;">','</span>'),	// The "rest" of a line which will be ignored.
		'default' 			=> array('<span style="background-color: #66cc66;">','</span>'),	// The default style if none other is applied.
		'comment' 			=> array('<span style="color: #666666; font-style: italic;">','</span>'),	// Comment lines
		'condition'			=> array('<span style="background-color: maroon; color: #ffffff; font-weight: bold;">','</span>'),	// Conditions
		'error' 			=> array('<span style="background-color: yellow; border: 1px red dashed; font-weight: bold;">','</span>'),	// Error messages
		'linenum' 			=> array('<span style="background-color: #eeeeee;">','</span>'),	// Line numbers
	);
	
	/**
	 * [Put your description here]
	 */
	function main($content,$conf)	{
		$this->conf=$conf;
		$this->pi_setPiVarDefaults();
		$this->pi_loadLL();
		$this->pi_USER_INT_obj=1;	// Configuring so caching is not expected. This value means that no cHash params are ever set. We do this, because it's a USER_INT object!
		
		
		
		#$tag_content = $this->cObj->getCurrentVal();
		#if(!$tag_content) {
		
			// parse XML data into php array
			$this->pi_initPIflexForm(); 
			
			$config['label'] = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'cLabel', 'sVIEW');
			$config['lang'] = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'cLang', 'sVIEW');
			$config['code'] = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'cCode', 'sVIEW');
			$config['numbers'] = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'cNumbers', 'sVIEW');
			$config['width'] = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'cWidth', 'sVIEW');
			$config['height'] = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'cHeight', 'sVIEW');
			
			//override Setup ?
			$width= ($config['width'])!='' ? $config['width'] : $conf['width'];
			$height= ($config['height'])!='' ? $config['height'] : $conf['height'];
			if($config['label']=='') $config['label']=$this->pi_getLL($config['lang']);
			
			//override from conf
			if(isset($this->conf['highLightStyles.']['prespace'])) $this->highLightStyles['prespace']=explode('|',$this->conf['highLightStyles.']['prespace']);
			if(isset($this->conf['highLightStyles.']['objstr_postspace'])) $this->highLightStyles['objstr_postspace']=explode('|',$this->conf['highLightStyles.']['objstr_postspace']);
			if(isset($this->conf['highLightStyles.']['operator_postspace'])) $this->highLightStyles['operator_postspace']=explode('|',$this->conf['highLightStyles.']['operator_postspace']);
			if(isset($this->conf['highLightStyles.']['value'])) $this->highLightStyles['value']=explode('|',$this->conf['highLightStyles.']['value']);
			if(isset($this->conf['highLightStyles.']['objstr'])) $this->highLightStyles['objstr']=explode('|',$this->conf['highLightStyles.']['objstr']);
			if(isset($this->conf['highLightStyles.']['value_copy'])) $this->highLightStyles['value_copy']=explode('|',$this->conf['highLightStyles.']['value_copy']);
			if(isset($this->conf['highLightStyles.']['value_unset'])) $this->highLightStyles['value_unset']=explode('|',$this->conf['highLightStyles.']['value_unset']);
			if(isset($this->conf['highLightStyles.']['default'])) $this->highLightStyles['default']=explode('|',$this->conf['highLightStyles.']['default']);
			if(isset($this->conf['highLightStyles.']['comment'])) $this->highLightStyles['comment']=explode('|',$this->conf['highLightStyles.']['comment']);
			if(isset($this->conf['highLightStyles.']['condition'])) $this->highLightStyles['condition']=explode('|',$this->conf['highLightStyles.']['condition']);
			if(isset($this->conf['highLightStyles.']['error'])) $this->highLightStyles['error']=explode('|',$this->conf['highLightStyles.']['error']);
			if(isset($this->conf['highLightStyles.']['linenum'])) $this->highLightStyles['linenum']=explode('|',$this->conf['highLightStyles.']['linenum']);
			
			$config['preview']='Language: '.$config['lang']."\n".htmlentities(substr($config['code'],0,120));
			$config['bodytext']=$this->cObj->data['bodytext'];
			if($config['bodytext']!=$config['preview']) {
				#copy the code to bodytext for preview in BE
				//$GLOBALS['TYPO3_DB']->debugOutput = true;
				$res = $GLOBALS['TYPO3_DB']->exec_UPDATEquery('tt_content','uid='.$this->cObj->data['uid'],array('bodytext'=>$config['preview'])); 
			}
			$content=''; //'<pre>'.print_r($conf,true).'</pre>';
		
		#} else {
			#return "HALLOHALLO";
		#}
		
		//create css-inline
		$iewidth=$width-5; //fix for IE
		$inlineTitle='width:'.$iewidth.'px !important;width /**/:'.$width.'px;color:'.$conf['titleBoxColor'].';background:'.$conf['titleBoxBgColor'].';margin: 12px 16px 0 16px;	font:verdana, sans-serif bold;padding:1px 0 1px 15px;border-bottom:1px solid white;';
		$inlineCode='width:'.$width.'px;background:'.$conf['codeBoxBgColor'].';height:'.$height.'px;white-space:nowrap;margin:0 16px 12px 16px;border: 1px solid #4E5665;overflow:auto;padding:8px 0 8px 8px;';
		
		//create preview
		
		
		
		switch($config['lang']) {
			case "actionscript":
			case "ada":
			case "apache":
			case "applescript":
			case "asm":
			case "asp":
			case "bash":
			case "blitzbasic":
			case "c":
			case "c_mac":
			case "caddcl":
			case "cadlisp":
			case "cpp":
			case "csharp":
			case "css":
			case "d":
			case "delphi":
			case "diff":
			case "div":
			case "dos":
			case "eiffel":
			case "freebasic":
			case "gml":
			case "html4strict":
			case "ini":
			case "java":
			case "javascript":
			case "lisp":
			case "lua":
			case "matlab":
			case "mpasm":
			case "mysql":
			case "nsis":
			case "objc":
			case "ocaml":
			case "ocaml-brief":
			case "oobas":
			case "oracle8":
			case "pascal":
			case "perl":
			case "php":
			case "php-brief":
			case "python":
			case "qbasic":
			case "ruby":
			case "scheme":
			case "sqlbasic":
			case "smarty":
			case "sql":
			case "vb":
			case "vbnet":
			case "vhdl":
			case "visualfoxpro":
			case "xml":
				$geshi = new GeSHi($config['code'], $config['lang'],t3lib_extMgm::extPath($this->extKey).'geshi/');
				if($config['numbers']==1) $geshi->enable_line_numbers(GESHI_NORMAL_LINE_NUMBERS);
				$geshi->set_link_target('_blank'); 
				$geshi->set_line_style("font-family:'Courier New', Courier, monospace; color: black; font-weight: normal; font-style: normal;");
				$completeCode=$geshi->parse_code(); 
				break;	
			case 'typoscript':
 		  		require_once(PATH_t3lib.'class.t3lib_tsparser.php');
 				$tsparser = t3lib_div::makeInstance("t3lib_TSparser");
 				$tsparser->highLightStyles = $this->highLightStyles;  
 				$tsparser->lineNumberOffset=1;
  				$completeCode=$tsparser->doSyntaxHighlight($config['code'], $config['numbers']==1 ? array($tsparser->lineNumberOffset) : '', 0);
 				break;
 			default:
 				$completeCode="Language not found: '$lang'";
		}
		
		$content.='<div class="CodeBoxTitel" style="'.$inlineTitle.'">'.$config['label'].'</div>';
		$content.='<div class="CodeBox" style="'.$inlineCode.'">'.$completeCode.'</div>';
		return $content;
		
		return $this->pi_wrapInBaseClass($content);
	}
}



if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/sk_codebox/pi1/class.tx_skcodebox_pi1.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/sk_codebox/pi1/class.tx_skcodebox_pi1.php']);
}

?>