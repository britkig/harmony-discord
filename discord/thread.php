<?php namespace Discord;
final class Thread extends \Base{
	public array $applied_tags;
	public int $auto_archive_duration,$rate_limit_per_user,$type;
	public string $name;
}