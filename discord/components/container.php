<?php namespace Discord\Components;
final class Container extends ComponentBranching{
	public Type $type{get{return Type::Container;}}
	public int|AccentColor $accent_color;
	public bool $spoiler;
}