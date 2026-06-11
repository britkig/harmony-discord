<?php namespace Discord;
final class Message extends Payload{
	public null|array $components, $embeds;
	public AllowedMentions $allowed_mentions;
	public null|bool $tts;
	public null|string $_content;
	public null|int $flags;
	//	Used only in webhook messages
	public string $avatar_url, $thread, $username;
	public function __construct(?array $properties=null, ?array $map=null){
		$this->allowed_mentions=new AllowedMentions();
		$this->flags=64;
		parent::__construct($properties, $map);
	}
}