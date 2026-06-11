<?php namespace Discord;
class Invite extends Buildable{
	public InviteTarget $target_type;
	public array $embeds;
	public bool $temporary,$unique;
	public int $max_age,$max_uses,$target_application_id,$target_user_id;
}