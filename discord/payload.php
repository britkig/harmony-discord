<?php namespace Discord;
abstract class Payload extends \HTTP\Body{
	final function ContentType():string{
		return 'application/json';
	}
	function __toString():string{
		\JSON\Encode($_, \get_object_vars($this));
		return $_;
	}
}