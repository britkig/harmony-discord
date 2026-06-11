<?php namespace Discord\Components;
final class Button extends Component implements LegacyComponent{
	public Type $type{get{return Type::Button;}}
	public ButtonStyle $style;
	public bool $disabled;
	public int $sku_id;
	public string $label, $custom_id, $url;
	public array $emoji;
}