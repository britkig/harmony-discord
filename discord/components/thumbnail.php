<?php namespace Discord\Components;
final class Thumbnail extends Component{
	public Type $type{get{return Type::Thumbnail;}};
	public string $description;
	public bool $spoiler;
}