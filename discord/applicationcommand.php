<?php namespace Discord;
final class ApplicationCommand extends \Base{
	public null|bool $default_permission,$dm_permission,$nsfw;
	public null|string $name,$description;
	public null|int|ApplicationCommandType $type;
	public null|array $options;
}