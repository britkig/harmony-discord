<?php namespace Discord\Components;
final class TextDisplay extends Component{
	public Type $type{get{return Type::TextDisplay;}}
	public string $content;
}