<?php namespace Discord;
class UserException extends \Exception{

	function __construct(string $message, protected string $title, protected ?ErrorIcon $icon=null, protected ?Components\AccentColor $color=null){
		parent::__construct($message);
	}
	
	function ConvertToMessage():\Discord\Message{
		$_=\get_object_vars($this);
		
		$o=[\String\Format('**%s**',$_['title'])];
		if($i=$_['icon']) \array_unshift($o,\String\Format(':%s:',$i->value));
		
		$o=\String\JoinV(' ', $o);
		$o=[new Components\TextDisplay(['content'=>$o])];
		$o[]=new Components\TextDisplay(['content'=>$_['message']]);
		$o=new Components\Container(['components'=>$o]);
		if(($i=$_['color'])!==null) $o->accent_color=$i;
		return new Message(['components'=>[$o],'flags'=>64+(1<<15)]);
	}
	
	static function GenericError(\Throwable $_){
		return new static($_->getMessage(),'Error',ErrorIcon::Error, Components\AccentColor::Red)->ConvertToMessage();
	}
}