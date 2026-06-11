<?php namespace Discord;
enum Markup{
	static function Code(string $code):string{return \sprintf('`%s`',$code);}
	static function CodeBlock(string $code, string $ln=null):string{return \sprintf('```%s
%s```',$ln,$code);}
	static function Date(int $epoch, string $format=null):string{return \sprintf('<t:%s%s>',$epoch,$format);}
	static function DateLongDate(int $epoch):string{return self::Date($epoch,':D');}
	static function DateLongFull(int $epoch):string{return self::Date($epoch,':F');}
	static function DateLongTime(int $epoch):string{return self::Date($epoch,':T');}
	static function DateRelative(int $epoch):string{return self::Date($epoch,':R');}
	static function DateShortDate(int $epoch):string{return self::Date($epoch,':d');}
	static function DateShortFull(int $epoch):string{return self::Date($epoch,':f');}
	static function DateShortTime(int $epoch):string{return self::Date($epoch,':t');}
	static function MentionChannel(string $channel):string{return \sprintf('<#%s>',$channel);}
	static function MentionCommand(string $name, string $id):string{return \sprintf('</%s:%s>',$name,$id);}
	static function MentionRole(string $role):string{return \sprintf('<@&%s>',$role);}
	static function MentionUser(string $user):string{return \sprintf('<@%s>',$user);}
	static function Hyperlink(string $label, string $url):string{return \sprintf('[%s](%s)',$label,$url);}
}