<?php namespace Discord;
final class AutoModerationActionMeta extends \Base{
	public int $channel_id, $duration_seconds;
	public string $custom_message;
}