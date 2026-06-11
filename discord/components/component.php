<?php namespace Discord\Components;
abstract class Component extends \Base{
	public abstract Type $type{get;}
	public int $id;
}