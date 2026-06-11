<?php namespace Discord;
final class Autocomplete extends Payload{
	public const Max=20;
	public array $choices;
	public function __construct(?array $properties=null, ?array $map=null){
		$this->choices=[];
		parent::__construct($properties, $map);
	}
}
