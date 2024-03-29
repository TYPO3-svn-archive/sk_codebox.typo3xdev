<?php
/*************************************************************************************
 * dos.php
 * -------
 * Author: Alessandro Staltari (staltari@geocities.com)
 * Copyright: (c) 2005 Alessandro Staltari (http://www.geocities.com/SiliconValley/Vista/8155/)
 * Release Version: 1.0.7.5
 * CVS Revision Version: $Revision: 1.5 $
 * Date Started: 2005/07/05
 * Last Modified: $Date: 2005/10/22 07:52:59 $
 *
 * DOS language file for GeSHi.
 *
 * CHANGES
 * -------
 * 2005/07/05 (1.0.0)
 *  -  First Release
 *
 * TODO (updated 2005/07/05)
 * -------------------------
 *
 * - Find a way to higlight %*
 * - Highlight pipes and redirection (do we really need this?)
 * - Add missing keywords.
 * - Find a good hyperlink for keywords.
 * - Improve styles.
 *
 * KNOWN ISSUES (updated 2005/07/07)
 * ---------------------------------
 *
 * - Doesn't even try to handle spaces in variables name or labels (I can't
 *   find a reliable way to establish if a sting is a name or not, in some
 *   cases it depends on the contex or enviroment status).
 * - Doesn't handle %%[letter] pseudo variable used inside FOR constructs
 *   (it should be done only into its scope: how to handle variable it?).
 * - Doesn't handle %~[something] pseudo arguments.
 * - If the same keyword is placed at the end of the line and the
 *   beginning of the next, the second occourrence is not highlighted
 *   (this should be a GeSHi bug, not related to the language definition).
 * - I can't avoid to have keyword highlighted even when they are not used
 *   as keywords but, for example, as arguments to the echo command.
 *
 *************************************************************************************
 *
 *     This file is part of GeSHi.
 *
 *   GeSHi is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 *   GeSHi is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *   You should have received a copy of the GNU General Public License
 *   along with GeSHi; if not, write to the Free Software
 *   Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 ************************************************************************************/

$language_data = array (
	'LANG_NAME' => 'DOS',
	'COMMENT_SINGLE' => array(1 =>'REM', 2 => '@REM'),
	'COMMENT_MULTI' => array(),
	'CASE_KEYWORDS' => GESHI_CAPS_NO_CHANGE,
	'QUOTEMARKS' => array(),
	'ESCAPE_CHAR' => '',
	'KEYWORDS' => array(
	    /* Flow control keywords */
		1 => array(
			'IF', 'ELSE', 'GOTO',
			'FOR', 'IN', 'DO',
			'CALL', 'EXIT'
			),
	    /* IF statement keywords */
		2 => array(
			'NOT', 'EXIST', 'ERRORLEVEL',
			'DEFINED',
			'EQU', 'NEQ', 'LSS', 'LEQ', 'GTR', 'GEQ'
			),
	    /* Internal commands */
		3 => array(
			'SHIFT',
			'CD', 'DIR', 'ECHO',
			'SETLOCAL', 'ENDLOCAL', 'SET',
			'PAUSE'
			),
	    /* Special files */

		4 => array(
			'PRN', 'NUL', 'LPT3', 'LPT2', 'LPT1', 'CON',
			'COM4', 'COM3', 'COM2', 'COM1', 'AUX'
			)
		),
	'SYMBOLS' => array(
		'(', ')'
		),
	'CASE_SENSITIVE' => array(
		GESHI_COMMENTS => false,
		1 => false
		),
	'STYLES' => array(
		'KEYWORDS' => array(
			1 => 'color: #00b100; font-weight: bold;',
			2 => 'color: #000000; font-weight: bold;',
			3 => 'color: #b1b100; font-weight: bold;',
			4 => 'color: #0000ff; font-weight: bold;'
			),
		'COMMENTS' => array(
			1 => 'color: #808080; font-style: italic;',
			2 => 'color: #808080; font-style: italic;'
			),
		'ESCAPE_CHAR' => array(
			),
		'BRACKETS' => array(
			0 => 'color: #66cc66;'
			),
		'STRINGS' => array(
			0 => 'color: #ff0000;'
			),
		'NUMBERS' => array(
/*			0 => 'color: #cc66cc;' */
			),
		'METHODS' => array(
			),
		'SYMBOLS' => array(
			0 => 'color: #33cc33;',
			1 => 'color: #33cc33;'
			),
		'SCRIPT' => array(
			),
		'REGEXPS' => array(
			0 => 'color: #b100b1; font-weight: bold;',
			1 => 'color: #448844;',
			2 => 'color: #448888;'
			)
		),
	'OOLANG' => false,
	'OBJECT_SPLITTERS' => array(
		),
	'REGEXPS' => array(
	/* Label */
	    0 => array(
/*		GESHI_SEARCH => '((?si:[@\s]+GOTO\s+|\s+:)[\s]*)((?<!\n)[^\s\n]*)',*/
		GESHI_SEARCH => '((?si:[@\s]+GOTO\s+|\s+:)[\s]*)((?<!\n)[^\n]*)',
		GESHI_REPLACE => '\\2',
		GESHI_MODIFIERS => 'si',
		GESHI_BEFORE => '\\1',
		GESHI_AFTER => ''
		),
	/* Variable assignement */
	    1 => array(
/*		GESHI_SEARCH => '(SET[\s]+(?si:/A[\s]+|/P[\s]+|))([^=\s\n]+)([\s]*=)',*/
		GESHI_SEARCH => '(SET[\s]+(?si:/A[\s]+|/P[\s]+|))([^=\n]+)([\s]*=)',
		GESHI_REPLACE => '\\2',
		GESHI_MODIFIERS => 'si',
		GESHI_BEFORE => '\\1',
		GESHI_AFTER => '\\3'
		),
	/* Arguments or variable evaluation */
	    2 => array(
/*		GESHI_SEARCH => '(%)([\d*]|[^%\s]*(?=%))((?<!%\d)%|)',*/
		GESHI_SEARCH => '(%)([\d*]|[^%]*(?=%))((?<!%\d)%|)',
		GESHI_REPLACE => '\\2',
		GESHI_MODIFIERS => 'si',
		GESHI_BEFORE => '\\1',
		GESHI_AFTER => '\\3'
		)
		),
	'STRICT_MODE_APPLIES' => GESHI_NEVER,
	'SCRIPT_DELIMITERS' => array(
		),
	'HIGHLIGHT_STRICT_BLOCK' => array(
		)
);

?>
