<?php namespace Discord\Components;
final class Separator extends Component{
	public Type $type{get{return Type::Separator;}}
	public int $spacing;
	public bool $divider;
}