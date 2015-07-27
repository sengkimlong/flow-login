<?php 
namespace TYPO3\Eel;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "TYPO3.Eel".             *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/*
WARNING: This file has been machine generated. Do not edit it, or your changes will be overwritten next time it is compiled.
*/


/**
 * Eel parser
 *
 * This parser can evaluate the expression language for TYPO3 Flow and uses
 * the basic types from AbstractParser.
 */
class EelParser_Original extends \TYPO3\Eel\AbstractParser {

/* OffsetAccess: '[' < Expression > ']' */
protected $match_OffsetAccess_typestack = array('OffsetAccess');
function match_OffsetAccess ($stack = array()) {
	$matchrule = "OffsetAccess"; $result = $this->construct($matchrule, $matchrule, null);
	$_5 = NULL;
	do {
		if (substr($this->string,$this->pos,1) == '[') {
			$this->pos += 1;
			$result["text"] .= '[';
		}
		else { $_5 = FALSE; break; }
		if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
		$matcher = 'match_'.'Expression'; $key = $matcher; $pos = $this->pos;
		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
		if ($subres !== FALSE) { $this->store( $result, $subres ); }
		else { $_5 = FALSE; break; }
		if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
		if (substr($this->string,$this->pos,1) == ']') {
			$this->pos += 1;
			$result["text"] .= ']';
		}
		else { $_5 = FALSE; break; }
		$_5 = TRUE; break;
	}
	while(0);
	if( $_5 === TRUE ) { return $this->finalise($result); }
	if( $_5 === FALSE) { return FALSE; }
}


/* MethodCall: Identifier '(' < Expression? > (',' < Expression > )* ')' */
protected $match_MethodCall_typestack = array('MethodCall');
function match_MethodCall ($stack = array()) {
	$matchrule = "MethodCall"; $result = $this->construct($matchrule, $matchrule, null);
	$_19 = NULL;
	do {
		$matcher = 'match_'.'Identifier'; $key = $matcher; $pos = $this->pos;
		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
		if ($subres !== FALSE) { $this->store( $result, $subres ); }
		else { $_19 = FALSE; break; }
		if (substr($this->string,$this->pos,1) == '(') {
			$this->pos += 1;
			$result["text"] .= '(';
		}
		else { $_19 = FALSE; break; }
		if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
		$res_10 = $result;
		$pos_10 = $this->pos;
		$matcher = 'match_'.'Expression'; $key = $matcher; $pos = $this->pos;
		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
		if ($subres !== FALSE) { $this->store( $result, $subres ); }
		else {
			$result = $res_10;
			$this->pos = $pos_10;
			unset( $res_10 );
			unset( $pos_10 );
		}
		if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
		while (true) {
			$res_17 = $result;
			$pos_17 = $this->pos;
			$_16 = NULL;
			do {
				if (substr($this->string,$this->pos,1) == ',') {
					$this->pos += 1;
					$result["text"] .= ',';
				}
				else { $_16 = FALSE; break; }
				if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
				$matcher = 'match_'.'Expression'; $key = $matcher; $pos = $this->pos;
				$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
				if ($subres !== FALSE) { $this->store( $result, $subres ); }
				else { $_16 = FALSE; break; }
				if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
				$_16 = TRUE; break;
			}
			while(0);
			if( $_16 === FALSE) {
				$result = $res_17;
				$this->pos = $pos_17;
				unset( $res_17 );
				unset( $pos_17 );
				break;
			}
		}
		if (substr($this->string,$this->pos,1) == ')') {
			$this->pos += 1;
			$result["text"] .= ')';
		}
		else { $_19 = FALSE; break; }
		$_19 = TRUE; break;
	}
	while(0);
	if( $_19 === TRUE ) { return $this->finalise($result); }
	if( $_19 === FALSE) { return FALSE; }
}


/* ObjectPath: (MethodCall | Identifier) ('.' (MethodCall | Identifier) | OffsetAccess)* */
protected $match_ObjectPath_typestack = array('ObjectPath');
function match_ObjectPath ($stack = array()) {
	$matchrule = "ObjectPath"; $result = $this->construct($matchrule, $matchrule, null);
	$_44 = NULL;
	do {
		$_26 = NULL;
		do {
			$_24 = NULL;
			do {
				$res_21 = $result;
				$pos_21 = $this->pos;
				$matcher = 'match_'.'MethodCall'; $key = $matcher; $pos = $this->pos;
				$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
				if ($subres !== FALSE) {
					$this->store( $result, $subres );
					$_24 = TRUE; break;
				}
				$result = $res_21;
				$this->pos = $pos_21;
				$matcher = 'match_'.'Identifier'; $key = $matcher; $pos = $this->pos;
				$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
				if ($subres !== FALSE) {
					$this->store( $result, $subres );
					$_24 = TRUE; break;
				}
				$result = $res_21;
				$this->pos = $pos_21;
				$_24 = FALSE; break;
			}
			while(0);
			if( $_24 === FALSE) { $_26 = FALSE; break; }
			$_26 = TRUE; break;
		}
		while(0);
		if( $_26 === FALSE) { $_44 = FALSE; break; }
		while (true) {
			$res_43 = $result;
			$pos_43 = $this->pos;
			$_42 = NULL;
			do {
				$_40 = NULL;
				do {
					$res_28 = $result;
					$pos_28 = $this->pos;
					$_37 = NULL;
					do {
						if (substr($this->string,$this->pos,1) == '.') {
							$this->pos += 1;
							$result["text"] .= '.';
						}
						else { $_37 = FALSE; break; }
						$_35 = NULL;
						do {
							$_33 = NULL;
							do {
								$res_30 = $result;
								$pos_30 = $this->pos;
								$matcher = 'match_'.'MethodCall'; $key = $matcher; $pos = $this->pos;
								$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
								if ($subres !== FALSE) {
									$this->store( $result, $subres );
									$_33 = TRUE; break;
								}
								$result = $res_30;
								$this->pos = $pos_30;
								$matcher = 'match_'.'Identifier'; $key = $matcher; $pos = $this->pos;
								$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
								if ($subres !== FALSE) {
									$this->store( $result, $subres );
									$_33 = TRUE; break;
								}
								$result = $res_30;
								$this->pos = $pos_30;
								$_33 = FALSE; break;
							}
							while(0);
							if( $_33 === FALSE) { $_35 = FALSE; break; }
							$_35 = TRUE; break;
						}
						while(0);
						if( $_35 === FALSE) { $_37 = FALSE; break; }
						$_37 = TRUE; break;
					}
					while(0);
					if( $_37 === TRUE ) { $_40 = TRUE; break; }
					$result = $res_28;
					$this->pos = $pos_28;
					$matcher = 'match_'.'OffsetAccess'; $key = $matcher; $pos = $this->pos;
					$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
					if ($subres !== FALSE) {
						$this->store( $result, $subres );
						$_40 = TRUE; break;
					}
					$result = $res_28;
					$this->pos = $pos_28;
					$_40 = FALSE; break;
				}
				while(0);
				if( $_40 === FALSE) { $_42 = FALSE; break; }
				$_42 = TRUE; break;
			}
			while(0);
			if( $_42 === FALSE) {
				$result = $res_43;
				$this->pos = $pos_43;
				unset( $res_43 );
				unset( $pos_43 );
				break;
			}
		}
		$_44 = TRUE; break;
	}
	while(0);
	if( $_44 === TRUE ) { return $this->finalise($result); }
	if( $_44 === FALSE) { return FALSE; }
}


/* Term: term:BooleanLiteral !Identifier | term:NumberLiteral | term:StringLiteral | term:ObjectPath */
protected $match_Term_typestack = array('Term');
function match_Term ($stack = array()) {
	$matchrule = "Term"; $result = $this->construct($matchrule, $matchrule, null);
	$_60 = NULL;
	do {
		$res_46 = $result;
		$pos_46 = $this->pos;
		$_49 = NULL;
		do {
			$matcher = 'match_'.'BooleanLiteral'; $key = $matcher; $pos = $this->pos;
			$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
			if ($subres !== FALSE) {
				$this->store( $result, $subres, "term" );
			}
			else { $_49 = FALSE; break; }
			$res_48 = $result;
			$pos_48 = $this->pos;
			$matcher = 'match_'.'Identifier'; $key = $matcher; $pos = $this->pos;
			$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
			if ($subres !== FALSE) {
				$this->store( $result, $subres );
				$result = $res_48;
				$this->pos = $pos_48;
				$_49 = FALSE; break;
			}
			else {
				$result = $res_48;
				$this->pos = $pos_48;
			}
			$_49 = TRUE; break;
		}
		while(0);
		if( $_49 === TRUE ) { $_60 = TRUE; break; }
		$result = $res_46;
		$this->pos = $pos_46;
		$_58 = NULL;
		do {
			$res_51 = $result;
			$pos_51 = $this->pos;
			$matcher = 'match_'.'NumberLiteral'; $key = $matcher; $pos = $this->pos;
			$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
			if ($subres !== FALSE) {
				$this->store( $result, $subres, "term" );
				$_58 = TRUE; break;
			}
			$result = $res_51;
			$this->pos = $pos_51;
			$_56 = NULL;
			do {
				$res_53 = $result;
				$pos_53 = $this->pos;
				$matcher = 'match_'.'StringLiteral'; $key = $matcher; $pos = $this->pos;
				$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
				if ($subres !== FALSE) {
					$this->store( $result, $subres, "term" );
					$_56 = TRUE; break;
				}
				$result = $res_53;
				$this->pos = $pos_53;
				$matcher = 'match_'.'ObjectPath'; $key = $matcher; $pos = $this->pos;
				$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
				if ($subres !== FALSE) {
					$this->store( $result, $subres, "term" );
					$_56 = TRUE; break;
				}
				$result = $res_53;
				$this->pos = $pos_53;
				$_56 = FALSE; break;
			}
			while(0);
			if( $_56 === TRUE ) { $_58 = TRUE; break; }
			$result = $res_51;
			$this->pos = $pos_51;
			$_58 = FALSE; break;
		}
		while(0);
		if( $_58 === TRUE ) { $_60 = TRUE; break; }
		$result = $res_46;
		$this->pos = $pos_46;
		$_60 = FALSE; break;
	}
	while(0);
	if( $_60 === TRUE ) { return $this->finalise($result); }
	if( $_60 === FALSE) { return FALSE; }
}




/* Expression: exp:ConditionalExpression */
protected $match_Expression_typestack = array('Expression');
function match_Expression ($stack = array()) {
	$matchrule = "Expression"; $result = $this->construct($matchrule, $matchrule, null);
	$matcher = 'match_'.'ConditionalExpression'; $key = $matcher; $pos = $this->pos;
	$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
	if ($subres !== FALSE) {
		$this->store( $result, $subres, "exp" );
		return $this->finalise($result);
	}
	else { return FALSE; }
}


/* SimpleExpression: term:WrappedExpression | term:NotExpression | term:ArrayLiteral | term:ObjectLiteral | term:Term */
protected $match_SimpleExpression_typestack = array('SimpleExpression');
function match_SimpleExpression ($stack = array()) {
	$matchrule = "SimpleExpression"; $result = $this->construct($matchrule, $matchrule, null);
	$_78 = NULL;
	do {
		$res_63 = $result;
		$pos_63 = $this->pos;
		$matcher = 'match_'.'WrappedExpression'; $key = $matcher; $pos = $this->pos;
		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
		if ($subres !== FALSE) {
			$this->store( $result, $subres, "term" );
			$_78 = TRUE; break;
		}
		$result = $res_63;
		$this->pos = $pos_63;
		$_76 = NULL;
		do {
			$res_65 = $result;
			$pos_65 = $this->pos;
			$matcher = 'match_'.'NotExpression'; $key = $matcher; $pos = $this->pos;
			$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
			if ($subres !== FALSE) {
				$this->store( $result, $subres, "term" );
				$_76 = TRUE; break;
			}
			$result = $res_65;
			$this->pos = $pos_65;
			$_74 = NULL;
			do {
				$res_67 = $result;
				$pos_67 = $this->pos;
				$matcher = 'match_'.'ArrayLiteral'; $key = $matcher; $pos = $this->pos;
				$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
				if ($subres !== FALSE) {
					$this->store( $result, $subres, "term" );
					$_74 = TRUE; break;
				}
				$result = $res_67;
				$this->pos = $pos_67;
				$_72 = NULL;
				do {
					$res_69 = $result;
					$pos_69 = $this->pos;
					$matcher = 'match_'.'ObjectLiteral'; $key = $matcher; $pos = $this->pos;
					$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
					if ($subres !== FALSE) {
						$this->store( $result, $subres, "term" );
						$_72 = TRUE; break;
					}
					$result = $res_69;
					$this->pos = $pos_69;
					$matcher = 'match_'.'Term'; $key = $matcher; $pos = $this->pos;
					$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
					if ($subres !== FALSE) {
						$this->store( $result, $subres, "term" );
						$_72 = TRUE; break;
					}
					$result = $res_69;
					$this->pos = $pos_69;
					$_72 = FALSE; break;
				}
				while(0);
				if( $_72 === TRUE ) { $_74 = TRUE; break; }
				$result = $res_67;
				$this->pos = $pos_67;
				$_74 = FALSE; break;
			}
			while(0);
			if( $_74 === TRUE ) { $_76 = TRUE; break; }
			$result = $res_65;
			$this->pos = $pos_65;
			$_76 = FALSE; break;
		}
		while(0);
		if( $_76 === TRUE ) { $_78 = TRUE; break; }
		$result = $res_63;
		$this->pos = $pos_63;
		$_78 = FALSE; break;
	}
	while(0);
	if( $_78 === TRUE ) { return $this->finalise($result); }
	if( $_78 === FALSE) { return FALSE; }
}


/* WrappedExpression: '(' < Expression > ')' */
protected $match_WrappedExpression_typestack = array('WrappedExpression');
function match_WrappedExpression ($stack = array()) {
	$matchrule = "WrappedExpression"; $result = $this->construct($matchrule, $matchrule, null);
	$_85 = NULL;
	do {
		if (substr($this->string,$this->pos,1) == '(') {
			$this->pos += 1;
			$result["text"] .= '(';
		}
		else { $_85 = FALSE; break; }
		if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
		$matcher = 'match_'.'Expression'; $key = $matcher; $pos = $this->pos;
		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
		if ($subres !== FALSE) { $this->store( $result, $subres ); }
		else { $_85 = FALSE; break; }
		if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
		if (substr($this->string,$this->pos,1) == ')') {
			$this->pos += 1;
			$result["text"] .= ')';
		}
		else { $_85 = FALSE; break; }
		$_85 = TRUE; break;
	}
	while(0);
	if( $_85 === TRUE ) { return $this->finalise($result); }
	if( $_85 === FALSE) { return FALSE; }
}


/* NotExpression: (/ ! | not\s+ /) > exp:SimpleExpression */
protected $match_NotExpression_typestack = array('NotExpression');
function match_NotExpression ($stack = array()) {
	$matchrule = "NotExpression"; $result = $this->construct($matchrule, $matchrule, null);
	$_92 = NULL;
	do {
		$_88 = NULL;
		do {
			if (( $subres = $this->rx( '/ ! | not\s+ /' ) ) !== FALSE) { $result["text"] .= $subres; }
			else { $_88 = FALSE; break; }
			$_88 = TRUE; break;
		}
		while(0);
		if( $_88 === FALSE) { $_92 = FALSE; break; }
		if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
		$matcher = 'match_'.'SimpleExpression'; $key = $matcher; $pos = $this->pos;
		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
		if ($subres !== FALSE) {
			$this->store( $result, $subres, "exp" );
		}
		else { $_92 = FALSE; break; }
		$_92 = TRUE; break;
	}
	while(0);
	if( $_92 === TRUE ) { return $this->finalise($result); }
	if( $_92 === FALSE) { return FALSE; }
}


/* ConditionalExpression: cond:Disjunction (< '?' > then:Expression < ':' > else:Expression)? */
protected $match_ConditionalExpression_typestack = array('ConditionalExpression');
function match_ConditionalExpression ($stack = array()) {
	$matchrule = "ConditionalExpression"; $result = $this->construct($matchrule, $matchrule, null);
	$_105 = NULL;
	do {
		$matcher = 'match_'.'Disjunction'; $key = $matcher; $pos = $this->pos;
		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
		if ($subres !== FALSE) {
			$this->store( $result, $subres, "cond" );
		}
		else { $_105 = FALSE; break; }
		$res_104 = $result;
		$pos_104 = $this->pos;
		$_103 = NULL;
		do {
			if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
			if (substr($this->string,$this->pos,1) == '?') {
				$this->pos += 1;
				$result["text"] .= '?';
			}
			else { $_103 = FALSE; break; }
			if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
			$matcher = 'match_'.'Expression'; $key = $matcher; $pos = $this->pos;
			$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
			if ($subres !== FALSE) {
				$this->store( $result, $subres, "then" );
			}
			else { $_103 = FALSE; break; }
			if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
			if (substr($this->string,$this->pos,1) == ':') {
				$this->pos += 1;
				$result["text"] .= ':';
			}
			else { $_103 = FALSE; break; }
			if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
			$matcher = 'match_'.'Expression'; $key = $matcher; $pos = $this->pos;
			$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
			if ($subres !== FALSE) {
				$this->store( $result, $subres, "else" );
			}
			else { $_103 = FALSE; break; }
			$_103 = TRUE; break;
		}
		while(0);
		if( $_103 === FALSE) {
			$result = $res_104;
			$this->pos = $pos_104;
			unset( $res_104 );
			unset( $pos_104 );
		}
		$_105 = TRUE; break;
	}
	while(0);
	if( $_105 === TRUE ) { return $this->finalise($result); }
	if( $_105 === FALSE) { return FALSE; }
}


/* Disjunction: lft:Conjunction (< / \|\| | or\s+ / > rgt:Conjunction)* */
protected $match_Disjunction_typestack = array('Disjunction');
function match_Disjunction ($stack = array()) {
	$matchrule = "Disjunction"; $result = $this->construct($matchrule, $matchrule, null);
	$_114 = NULL;
	do {
		$matcher = 'match_'.'Conjunction'; $key = $matcher; $pos = $this->pos;
		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
		if ($subres !== FALSE) {
			$this->store( $result, $subres, "lft" );
		}
		else { $_114 = FALSE; break; }
		while (true) {
			$res_113 = $result;
			$pos_113 = $this->pos;
			$_112 = NULL;
			do {
				if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
				if (( $subres = $this->rx( '/ \|\| | or\s+ /' ) ) !== FALSE) { $result["text"] .= $subres; }
				else { $_112 = FALSE; break; }
				if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
				$matcher = 'match_'.'Conjunction'; $key = $matcher; $pos = $this->pos;
				$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
				if ($subres !== FALSE) {
					$this->store( $result, $subres, "rgt" );
				}
				else { $_112 = FALSE; break; }
				$_112 = TRUE; break;
			}
			while(0);
			if( $_112 === FALSE) {
				$result = $res_113;
				$this->pos = $pos_113;
				unset( $res_113 );
				unset( $pos_113 );
				break;
			}
		}
		$_114 = TRUE; break;
	}
	while(0);
	if( $_114 === TRUE ) { return $this->finalise($result); }
	if( $_114 === FALSE) { return FALSE; }
}


/* Conjunction: lft:Comparison (< / && | and\s+ / > rgt:Comparison)* */
protected $match_Conjunction_typestack = array('Conjunction');
function match_Conjunction ($stack = array()) {
	$matchrule = "Conjunction"; $result = $this->construct($matchrule, $matchrule, null);
	$_123 = NULL;
	do {
		$matcher = 'match_'.'Comparison'; $key = $matcher; $pos = $this->pos;
		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
		if ($subres !== FALSE) {
			$this->store( $result, $subres, "lft" );
		}
		else { $_123 = FALSE; break; }
		while (true) {
			$res_122 = $result;
			$pos_122 = $this->pos;
			$_121 = NULL;
			do {
				if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
				if (( $subres = $this->rx( '/ && | and\s+ /' ) ) !== FALSE) { $result["text"] .= $subres; }
				else { $_121 = FALSE; break; }
				if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
				$matcher = 'match_'.'Comparison'; $key = $matcher; $pos = $this->pos;
				$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
				if ($subres !== FALSE) {
					$this->store( $result, $subres, "rgt" );
				}
				else { $_121 = FALSE; break; }
				$_121 = TRUE; break;
			}
			while(0);
			if( $_121 === FALSE) {
				$result = $res_122;
				$this->pos = $pos_122;
				unset( $res_122 );
				unset( $pos_122 );
				break;
			}
		}
		$_123 = TRUE; break;
	}
	while(0);
	if( $_123 === TRUE ) { return $this->finalise($result); }
	if( $_123 === FALSE) { return FALSE; }
}


/* Comparison: lft:SumCalculation (< comp:/ == | != | <= | >= | < | > / > rgt:SumCalculation)? */
protected $match_Comparison_typestack = array('Comparison');
function match_Comparison ($stack = array()) {
	$matchrule = "Comparison"; $result = $this->construct($matchrule, $matchrule, null);
	$_132 = NULL;
	do {
		$matcher = 'match_'.'SumCalculation'; $key = $matcher; $pos = $this->pos;
		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
		if ($subres !== FALSE) {
			$this->store( $result, $subres, "lft" );
		}
		else { $_132 = FALSE; break; }
		$res_131 = $result;
		$pos_131 = $this->pos;
		$_130 = NULL;
		do {
			if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
			$stack[] = $result; $result = $this->construct( $matchrule, "comp" );
			if (( $subres = $this->rx( '/ == | != | <= | >= | < | > /' ) ) !== FALSE) {
				$result["text"] .= $subres;
				$subres = $result; $result = array_pop($stack);
				$this->store( $result, $subres, 'comp' );
			}
			else {
				$result = array_pop($stack);
				$_130 = FALSE; break;
			}
			if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
			$matcher = 'match_'.'SumCalculation'; $key = $matcher; $pos = $this->pos;
			$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
			if ($subres !== FALSE) {
				$this->store( $result, $subres, "rgt" );
			}
			else { $_130 = FALSE; break; }
			$_130 = TRUE; break;
		}
		while(0);
		if( $_130 === FALSE) {
			$result = $res_131;
			$this->pos = $pos_131;
			unset( $res_131 );
			unset( $pos_131 );
		}
		$_132 = TRUE; break;
	}
	while(0);
	if( $_132 === TRUE ) { return $this->finalise($result); }
	if( $_132 === FALSE) { return FALSE; }
}


/* SumCalculation: lft:ProdCalculation (< op:/ \+ | \- / > rgt:ProdCalculation)* */
protected $match_SumCalculation_typestack = array('SumCalculation');
function match_SumCalculation ($stack = array()) {
	$matchrule = "SumCalculation"; $result = $this->construct($matchrule, $matchrule, null);
	$_141 = NULL;
	do {
		$matcher = 'match_'.'ProdCalculation'; $key = $matcher; $pos = $this->pos;
		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
		if ($subres !== FALSE) {
			$this->store( $result, $subres, "lft" );
		}
		else { $_141 = FALSE; break; }
		while (true) {
			$res_140 = $result;
			$pos_140 = $this->pos;
			$_139 = NULL;
			do {
				if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
				$stack[] = $result; $result = $this->construct( $matchrule, "op" );
				if (( $subres = $this->rx( '/ \+ | \- /' ) ) !== FALSE) {
					$result["text"] .= $subres;
					$subres = $result; $result = array_pop($stack);
					$this->store( $result, $subres, 'op' );
				}
				else {
					$result = array_pop($stack);
					$_139 = FALSE; break;
				}
				if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
				$matcher = 'match_'.'ProdCalculation'; $key = $matcher; $pos = $this->pos;
				$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
				if ($subres !== FALSE) {
					$this->store( $result, $subres, "rgt" );
				}
				else { $_139 = FALSE; break; }
				$_139 = TRUE; break;
			}
			while(0);
			if( $_139 === FALSE) {
				$result = $res_140;
				$this->pos = $pos_140;
				unset( $res_140 );
				unset( $pos_140 );
				break;
			}
		}
		$_141 = TRUE; break;
	}
	while(0);
	if( $_141 === TRUE ) { return $this->finalise($result); }
	if( $_141 === FALSE) { return FALSE; }
}


/* ProdCalculation: lft:SimpleExpression (< op:/ \/ | \* | % / > rgt:SimpleExpression)* */
protected $match_ProdCalculation_typestack = array('ProdCalculation');
function match_ProdCalculation ($stack = array()) {
	$matchrule = "ProdCalculation"; $result = $this->construct($matchrule, $matchrule, null);
	$_150 = NULL;
	do {
		$matcher = 'match_'.'SimpleExpression'; $key = $matcher; $pos = $this->pos;
		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
		if ($subres !== FALSE) {
			$this->store( $result, $subres, "lft" );
		}
		else { $_150 = FALSE; break; }
		while (true) {
			$res_149 = $result;
			$pos_149 = $this->pos;
			$_148 = NULL;
			do {
				if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
				$stack[] = $result; $result = $this->construct( $matchrule, "op" );
				if (( $subres = $this->rx( '/ \/ | \* | % /' ) ) !== FALSE) {
					$result["text"] .= $subres;
					$subres = $result; $result = array_pop($stack);
					$this->store( $result, $subres, 'op' );
				}
				else {
					$result = array_pop($stack);
					$_148 = FALSE; break;
				}
				if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
				$matcher = 'match_'.'SimpleExpression'; $key = $matcher; $pos = $this->pos;
				$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
				if ($subres !== FALSE) {
					$this->store( $result, $subres, "rgt" );
				}
				else { $_148 = FALSE; break; }
				$_148 = TRUE; break;
			}
			while(0);
			if( $_148 === FALSE) {
				$result = $res_149;
				$this->pos = $pos_149;
				unset( $res_149 );
				unset( $pos_149 );
				break;
			}
		}
		$_150 = TRUE; break;
	}
	while(0);
	if( $_150 === TRUE ) { return $this->finalise($result); }
	if( $_150 === FALSE) { return FALSE; }
}


/* ArrayLiteral: '[' < Expression? (< ',' > Expression)* > ']' */
protected $match_ArrayLiteral_typestack = array('ArrayLiteral');
function match_ArrayLiteral ($stack = array()) {
	$matchrule = "ArrayLiteral"; $result = $this->construct($matchrule, $matchrule, null);
	$_163 = NULL;
	do {
		if (substr($this->string,$this->pos,1) == '[') {
			$this->pos += 1;
			$result["text"] .= '[';
		}
		else { $_163 = FALSE; break; }
		if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
		$res_154 = $result;
		$pos_154 = $this->pos;
		$matcher = 'match_'.'Expression'; $key = $matcher; $pos = $this->pos;
		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
		if ($subres !== FALSE) { $this->store( $result, $subres ); }
		else {
			$result = $res_154;
			$this->pos = $pos_154;
			unset( $res_154 );
			unset( $pos_154 );
		}
		while (true) {
			$res_160 = $result;
			$pos_160 = $this->pos;
			$_159 = NULL;
			do {
				if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
				if (substr($this->string,$this->pos,1) == ',') {
					$this->pos += 1;
					$result["text"] .= ',';
				}
				else { $_159 = FALSE; break; }
				if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
				$matcher = 'match_'.'Expression'; $key = $matcher; $pos = $this->pos;
				$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
				if ($subres !== FALSE) { $this->store( $result, $subres ); }
				else { $_159 = FALSE; break; }
				$_159 = TRUE; break;
			}
			while(0);
			if( $_159 === FALSE) {
				$result = $res_160;
				$this->pos = $pos_160;
				unset( $res_160 );
				unset( $pos_160 );
				break;
			}
		}
		if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
		if (substr($this->string,$this->pos,1) == ']') {
			$this->pos += 1;
			$result["text"] .= ']';
		}
		else { $_163 = FALSE; break; }
		$_163 = TRUE; break;
	}
	while(0);
	if( $_163 === TRUE ) { return $this->finalise($result); }
	if( $_163 === FALSE) { return FALSE; }
}


/* ObjectLiteralProperty: key:(StringLiteral | Identifier) < ':' > value:Expression */
protected $match_ObjectLiteralProperty_typestack = array('ObjectLiteralProperty');
function match_ObjectLiteralProperty ($stack = array()) {
	$matchrule = "ObjectLiteralProperty"; $result = $this->construct($matchrule, $matchrule, null);
	$_176 = NULL;
	do {
		$stack[] = $result; $result = $this->construct( $matchrule, "key" );
		$_170 = NULL;
		do {
			$_168 = NULL;
			do {
				$res_165 = $result;
				$pos_165 = $this->pos;
				$matcher = 'match_'.'StringLiteral'; $key = $matcher; $pos = $this->pos;
				$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
				if ($subres !== FALSE) {
					$this->store( $result, $subres );
					$_168 = TRUE; break;
				}
				$result = $res_165;
				$this->pos = $pos_165;
				$matcher = 'match_'.'Identifier'; $key = $matcher; $pos = $this->pos;
				$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
				if ($subres !== FALSE) {
					$this->store( $result, $subres );
					$_168 = TRUE; break;
				}
				$result = $res_165;
				$this->pos = $pos_165;
				$_168 = FALSE; break;
			}
			while(0);
			if( $_168 === FALSE) { $_170 = FALSE; break; }
			$_170 = TRUE; break;
		}
		while(0);
		if( $_170 === TRUE ) {
			$subres = $result; $result = array_pop($stack);
			$this->store( $result, $subres, 'key' );
		}
		if( $_170 === FALSE) {
			$result = array_pop($stack);
			$_176 = FALSE; break;
		}
		if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
		if (substr($this->string,$this->pos,1) == ':') {
			$this->pos += 1;
			$result["text"] .= ':';
		}
		else { $_176 = FALSE; break; }
		if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
		$matcher = 'match_'.'Expression'; $key = $matcher; $pos = $this->pos;
		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
		if ($subres !== FALSE) {
			$this->store( $result, $subres, "value" );
		}
		else { $_176 = FALSE; break; }
		$_176 = TRUE; break;
	}
	while(0);
	if( $_176 === TRUE ) { return $this->finalise($result); }
	if( $_176 === FALSE) { return FALSE; }
}


/* ObjectLiteral: '{' ObjectLiteralProperty? (< ',' > ObjectLiteralProperty)* > '}' */
protected $match_ObjectLiteral_typestack = array('ObjectLiteral');
function match_ObjectLiteral ($stack = array()) {
	$matchrule = "ObjectLiteral"; $result = $this->construct($matchrule, $matchrule, null);
	$_188 = NULL;
	do {
		if (substr($this->string,$this->pos,1) == '{') {
			$this->pos += 1;
			$result["text"] .= '{';
		}
		else { $_188 = FALSE; break; }
		$res_179 = $result;
		$pos_179 = $this->pos;
		$matcher = 'match_'.'ObjectLiteralProperty'; $key = $matcher; $pos = $this->pos;
		$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
		if ($subres !== FALSE) { $this->store( $result, $subres ); }
		else {
			$result = $res_179;
			$this->pos = $pos_179;
			unset( $res_179 );
			unset( $pos_179 );
		}
		while (true) {
			$res_185 = $result;
			$pos_185 = $this->pos;
			$_184 = NULL;
			do {
				if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
				if (substr($this->string,$this->pos,1) == ',') {
					$this->pos += 1;
					$result["text"] .= ',';
				}
				else { $_184 = FALSE; break; }
				if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
				$matcher = 'match_'.'ObjectLiteralProperty'; $key = $matcher; $pos = $this->pos;
				$subres = ( $this->packhas( $key, $pos ) ? $this->packread( $key, $pos ) : $this->packwrite( $key, $pos, $this->$matcher(array_merge($stack, array($result))) ) );
				if ($subres !== FALSE) { $this->store( $result, $subres ); }
				else { $_184 = FALSE; break; }
				$_184 = TRUE; break;
			}
			while(0);
			if( $_184 === FALSE) {
				$result = $res_185;
				$this->pos = $pos_185;
				unset( $res_185 );
				unset( $pos_185 );
				break;
			}
		}
		if (( $subres = $this->whitespace(  ) ) !== FALSE) { $result["text"] .= $subres; }
		if (substr($this->string,$this->pos,1) == '}') {
			$this->pos += 1;
			$result["text"] .= '}';
		}
		else { $_188 = FALSE; break; }
		$_188 = TRUE; break;
	}
	while(0);
	if( $_188 === TRUE ) { return $this->finalise($result); }
	if( $_188 === FALSE) { return FALSE; }
}




}
namespace TYPO3\Eel;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * Eel parser
 * 
 * This parser can evaluate the expression language for TYPO3 Flow and uses
 * the basic types from AbstractParser.
 */
class EelParser extends EelParser_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


	/**
	 * Autogenerated Proxy Method
	 */
	public function __construct() {
		$arguments = func_get_args();

		if (!array_key_exists(0, $arguments)) $arguments[0] = NULL;
		if (!array_key_exists(0, $arguments)) throw new \TYPO3\Flow\Object\Exception\UnresolvedDependenciesException('Missing required constructor argument $string in class ' . __CLASS__ . '. Note that constructor injection is only support for objects of scope singleton (and this is not a singleton) – for other scopes you must pass each required argument to the constructor yourself.', 1296143788);
		call_user_func_array('parent::__construct', $arguments);
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __wakeup() {

	if (property_exists($this, 'Flow_Persistence_RelatedEntities') && is_array($this->Flow_Persistence_RelatedEntities)) {
		$persistenceManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Persistence\PersistenceManagerInterface');
		foreach ($this->Flow_Persistence_RelatedEntities as $entityInformation) {
			if($entityInformation['entityType'] === 'TYPO3\Flow\Resource\ResourcePointer') continue;
			$entity = $persistenceManager->getObjectByIdentifier($entityInformation['identifier'], $entityInformation['entityType'], TRUE);
			if (isset($entityInformation['entityPath'])) {
				$this->$entityInformation['propertyName'] = \TYPO3\Flow\Utility\Arrays::setValueByPath($this->$entityInformation['propertyName'], $entityInformation['entityPath'], $entity);
			} else {
				$this->$entityInformation['propertyName'] = $entity;
			}
		}
		unset($this->Flow_Persistence_RelatedEntities);
	}
			}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __sleep() {
		$result = NULL;
		$this->Flow_Object_PropertiesToSerialize = array();
	$reflectionService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Reflection\ReflectionService');
	$reflectedClass = new \ReflectionClass('TYPO3\Eel\EelParser');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionProperty->isStatic() || $reflectionService->isPropertyAnnotatedWith('TYPO3\Eel\EelParser', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
		if (is_array($this->$propertyName) || (is_object($this->$propertyName) && ($this->$propertyName instanceof \ArrayObject || $this->$propertyName instanceof \SplObjectStorage ||$this->$propertyName instanceof \Doctrine\Common\Collections\Collection))) {
			if (count($this->$propertyName) > 0) {
				foreach ($this->$propertyName as $key => $value) {
					$this->searchForEntitiesAndStoreIdentifierArray((string)$key, $value, $propertyName);
				}
			}
		}
		if (is_object($this->$propertyName) && !$this->$propertyName instanceof \Doctrine\Common\Collections\Collection) {
			if ($this->$propertyName instanceof \Doctrine\ORM\Proxy\Proxy) {
				$className = get_parent_class($this->$propertyName);
			} else {
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Eel\EelParser', $propertyName, 'var');
				if (count($varTagValues) > 0) {
					$className = trim($varTagValues[0], '\\');
				}
				if (\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->isRegistered($className) === FALSE) {
					$className = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getObjectNameByClassName(get_class($this->$propertyName));
				}
			}
			if ($this->$propertyName instanceof \TYPO3\Flow\Persistence\Aspect\PersistenceMagicInterface && !\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Persistence\PersistenceManagerInterface')->isNewObject($this->$propertyName) || $this->$propertyName instanceof \Doctrine\ORM\Proxy\Proxy) {
				if (!property_exists($this, 'Flow_Persistence_RelatedEntities') || !is_array($this->Flow_Persistence_RelatedEntities)) {
					$this->Flow_Persistence_RelatedEntities = array();
					$this->Flow_Object_PropertiesToSerialize[] = 'Flow_Persistence_RelatedEntities';
				}
				$identifier = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Persistence\PersistenceManagerInterface')->getIdentifierByObject($this->$propertyName);
				if (!$identifier && $this->$propertyName instanceof \Doctrine\ORM\Proxy\Proxy) {
					$identifier = current(\TYPO3\Flow\Reflection\ObjectAccess::getProperty($this->$propertyName, '_identifier', TRUE));
				}
				$this->Flow_Persistence_RelatedEntities[$propertyName] = array(
					'propertyName' => $propertyName,
					'entityType' => $className,
					'identifier' => $identifier
				);
				continue;
			}
			if ($className !== FALSE && (\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getScope($className) === \TYPO3\Flow\Object\Configuration\Configuration::SCOPE_SINGLETON || $className === 'TYPO3\Flow\Object\DependencyInjection\DependencyProxy')) {
				continue;
			}
		}
		$this->Flow_Object_PropertiesToSerialize[] = $propertyName;
	}
	$result = $this->Flow_Object_PropertiesToSerialize;
		return $result;
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 private function searchForEntitiesAndStoreIdentifierArray($path, $propertyValue, $originalPropertyName) {

		if (is_array($propertyValue) || (is_object($propertyValue) && ($propertyValue instanceof \ArrayObject || $propertyValue instanceof \SplObjectStorage))) {
			foreach ($propertyValue as $key => $value) {
				$this->searchForEntitiesAndStoreIdentifierArray($path . '.' . $key, $value, $originalPropertyName);
			}
		} elseif ($propertyValue instanceof \TYPO3\Flow\Persistence\Aspect\PersistenceMagicInterface && !\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Persistence\PersistenceManagerInterface')->isNewObject($propertyValue) || $propertyValue instanceof \Doctrine\ORM\Proxy\Proxy) {
			if (!property_exists($this, 'Flow_Persistence_RelatedEntities') || !is_array($this->Flow_Persistence_RelatedEntities)) {
				$this->Flow_Persistence_RelatedEntities = array();
				$this->Flow_Object_PropertiesToSerialize[] = 'Flow_Persistence_RelatedEntities';
			}
			if ($propertyValue instanceof \Doctrine\ORM\Proxy\Proxy) {
				$className = get_parent_class($propertyValue);
			} else {
				$className = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getObjectNameByClassName(get_class($propertyValue));
			}
			$identifier = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Persistence\PersistenceManagerInterface')->getIdentifierByObject($propertyValue);
			if (!$identifier && $propertyValue instanceof \Doctrine\ORM\Proxy\Proxy) {
				$identifier = current(\TYPO3\Flow\Reflection\ObjectAccess::getProperty($propertyValue, '_identifier', TRUE));
			}
			$this->Flow_Persistence_RelatedEntities[$originalPropertyName . '.' . $path] = array(
				'propertyName' => $originalPropertyName,
				'entityType' => $className,
				'identifier' => $identifier,
				'entityPath' => $path
			);
			$this->$originalPropertyName = \TYPO3\Flow\Utility\Arrays::setValueByPath($this->$originalPropertyName, $path, NULL);
		}
			}
}
# PathAndFilename: /var/www/html/internship-project-3-team-2/flow_login/Packages/Framework/TYPO3.Eel/Classes/TYPO3/Eel/EelParser.php
#