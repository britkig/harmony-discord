<?php namespace Discord;
final class ApplicationCommandOption extends \Base extends Buildable{
	public null|array $channel_types,$choices,$name_localizations,$description_localizations,$options;
	public null|bool $autocomplete,$required;
	public null|int $max_length,$min_length;
	public null|int|double $max_value,$min_value;
	public null|string $name,$description;
	public null|ApplicationCommandOptionType $type;
}