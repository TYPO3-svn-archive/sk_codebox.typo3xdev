<?php
/*************************************************************************************
 * ocaml.php
 * ----------
 * Author: Flaie (fireflaie@gmail.com)
 * Copyright: (c) 2005 Flaie, Nigel McNie (http://qbnz.com/highlighter)
 * Release Version: 1.0.7.5
 * CVS Revision Version: $Revision: 1.3 $
 * Date Started: 2005/08/27
 * Last Modified: $Date: 2005/10/22 07:52:59 $
 *
 * OCaml (Objective Caml) language file for GeSHi.
 *
 * CHANGES
 * -------
 * 2005/08/27 (1.0.0)
 *   -  First Release
 *
 * TODO (updated 2005/08/27)
 * -------------------------
 *
 *************************************************************************************
 *
 *   This file is part of GeSHi.
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
	'LANG_NAME' => 'OCaml',
	'COMMENT_SINGLE' => array(),
	'COMMENT_MULTI' => array('(*' => '*)'),
	'CASE_KEYWORDS' => 0,
	'QUOTEMARKS' => array('"'),
	'ESCAPE_CHAR' => "",
	'KEYWORDS' => array(
	   /* main OCaml keywords */
		1 => array(
			'and', 'As', 'asr', 'begin', 'Class', 'Closed', 'constraint', 'do', 'done', 'downto', 'else',
			'end', 'exception', 'external', 'failwith', 'false', 'flush', 'for', 'fun', 'function', 'functor',
			'if', 'in', 'include', 'inherit',  'incr', 'land', 'let', 'load', 'los', 'lsl', 'lsr', 'lxor',
			'match', 'method', 'mod', 'module', 'mutable', 'new', 'not', 'of', 'open', 'option', 'or', 'parser',
			'private', 'ref', 'rec', 'raise', 'regexp', 'sig', 'struct', 'stdout', 'stdin', 'stderr', 'then',
			'to', 'true', 'try', 'type', 'val', 'virtual', 'when', 'while', 'with'
			),
		/* define names of main librarys, so we can link to it */
		2 => array(
			'Arg', 'Arith_status', 'Array', 'ArrayLabels', 'Big_int', 'Bigarray', 'Buffer', 'Callback',
			'CamlinternalOO', 'Char', 'Complex', 'Condition', 'Dbm', 'Digest', 'Dynlink', 'Event',
			'Filename', 'Format', 'Gc', 'Genlex', 'Graphics', 'GraphicsX11', 'Hashtbl', 'Int32', 'Int64',
			'Lazy', 'Lexing', 'List', 'ListLabels', 'Map', 'Marshal', 'MoreLabels', 'Mutex', 'Nativeint',
			'Num', 'Obj', 'Oo', 'Parsing', 'Pervasives', 'Printexc', 'Printf', 'Queue', 'Random', 'Scanf',
			'Set', 'Sort', 'Stack', 'StdLabels', 'Str', 'Stream', 'String', 'StringLabels', 'Sys', 'Thread',
			'ThreadUnix', 'Tk'
		   ),
		/* just link to the Pervasives functions library, cause it's the default opened library when starting OCaml */
		3 => array(
			'raise', 'invalid_arg', 'failwith', 'compare', 'min', 'max', 'succ', 'pred', 'mod', 'abs', 
			'max_int', 'min_int', 'sqrt', 'exp', 'log', 'log10', 'cos', 'sin', 'tan', 'acos', 'asin', 
			'atan', 'atan2', 'cosh', 'sinh', 'tanh', 'ceil', 'floor', 'abs_float', 'mod_float', 'frexp',
			'ldexp', 'modf', 'float', 'float_of_int', 'truncate', 'int_of_float', 'infinity', 'nan',
			'max_float', 'min_float', 'epsilon_float', 'classify_float', 'int_of_char', 'char_of_int', 
			'ignore', 'string_of_bool', 'bool_of_string', 'string_of_int', 'int_of_string', 
			'string_of_float', 'float_of_string', 'fst', 'snd', 'stdin', 'stdout', 'stderr', 'print_char',
			'print_string', 'print_int', 'print_float', 'print_endline', 'print_newline', 'prerr_char',
			'prerr_string', 'prerr_int', 'prerr_float', 'prerr_endline', 'prerr_newline', 'read_line',
			'read_int', 'read_float', 'open_out', 'open_out_bin', 'open_out_gen', 'flush', 'flush_all',
			'output_char', 'output_string', 'output', 'output_byte', 'output_binary_int', 'output_value',
			'seek_out', 'pos_out',  'out_channel_length', 'close_out', 'close_out_noerr', 'set_binary_mode_out',
			'open_in', 'open_in_bin', 'open_in_gen', 'input_char', 'input_line', 'input', 'really_input',
			'input_byte', 'input_binary_int', 'input_value', 'seek_in', 'pos_in', 'in_channel_length',
			'close_in', 'close_in_noerr', 'set_binary_mode_in', 'incr', 'decr', 'string_of_format',
			'format_of_string', 'exit', 'at_exit' 
		   ),
		/* here Pervasives Types */
		4 => array (
		   'fpclass', 'in_channel', 'out_channel', 'open_flag', 'Sys_error', 'ref', 'format'
		   ),
		/* finally Pervasives Exceptions */
		5 => array (
			'Exit', 'Invalid_Argument', 'Failure', 'Division_by_zero'
		   )
		),
	/* highlighting symbols is really important in OCaml */
	'SYMBOLS' => array(
			';', '!', ':', '.', '=', '%', '^', '*', '-', '/', '+', 
			'>', '<', '(', ')', '[', ']', '&', '|', '#', "'"
			), 
	'CASE_SENSITIVE' => array(
		GESHI_COMMENTS => true,
		1 => false,
		2 => true, /* functions name are case seinsitive */
		3 => true, /* types name too */
		4 => true  /* finally exceptions too */
		),
	'STYLES' => array(
		'KEYWORDS' => array(
			1 => 'color: #06c; font-weight: bold;' /* nice blue */
			),
		'COMMENTS' => array(
			'MULTI' => 'color: #5d478b; font-style: italic;' /* light purple */
			),
		'ESCAPE_CHAR' => array(
			),
		'BRACKETS' => array(
			0 => 'color: #6c6;'
			),
		'STRINGS' => array(
			0 => 'color: #3cb371;' /* nice green */
			),
		'NUMBERS' => array(
			0 => 'color: #c6c;' /* pink */
			),
		'METHODS' => array(
			1 => 'color: #060;' /* dark green */
			),
		'REGEXPS' => array(
			),
		'SYMBOLS' => array( 
			0 => 'color: #a52a2a;' /* maroon */
			),
		'SCRIPT' => array(
			)
		),
	'URLS' => array(
	   /* some of keywords are Pervasives functions (land, lxor, asr, ...) */
		1 => '',
		/* link to the wanted library */
		2 => 'http://caml.inria.fr/pub/docs/manual-ocaml/libref/{FNAME}.html', 
		/* link to Pervasives functions */
		3 => 'http://caml.inria.fr/pub/docs/manual-ocaml/libref/Pervasives.html#VAL{FNAME}', 
		/* link to Pervasives type */
		4 => 'http://caml.inria.fr/pub/docs/manual-ocaml/libref/Pervasives.html#TYPE{FNAME}',
		/* link to Pervasives exceptions */
		5 => 'http://caml.inria.fr/pub/docs/manual-ocaml/libref/Pervasives.html#EXCEPTION{FNAME}'
		),
	'OOLANG' => true,
	'OBJECT_SPLITTERS' => array(
		1 => '.'
		),
	'REGEXPS' => array(
		),
	'STRICT_MODE_APPLIES' => GESHI_NEVER,
	'SCRIPT_DELIMITERS' => array(
		),
	'HIGHLIGHT_STRICT_BLOCK' => array(
		)
);

?>
