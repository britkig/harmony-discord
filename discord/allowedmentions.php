<?php namespace Discord;
final class AllowedMentions extends \Base{
	public array $parse,$roles,$users;
	public bool $replied_user;
	public function __construct(?array $properties=null, ?array $map=null){
		$this->parse=[];
		parent::__construct($properties, $map);
	}
}