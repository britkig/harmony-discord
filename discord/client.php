<?php namespace Discord;
final class Client{
	private const API_ROOT='https://discord.com/api/v10/';
	private readonly int $i;
	private readonly string $t;
	function __construct(int $id, string $token){
		 $this->i=$id;
		 $this->t=$token;}
	private function __invoke(&$_, int $expected, \HTTP\Method $method, string $path, ?Payload $body=null):bool{
		if(!($c=\HTTP\Client::Send($_, static::API_ROOT.$path, $method, ['Authorization'=>\String\Format('Bot %s', $this->t)], $body))) return false;
		return (int) $c==$expected;}
	function CommandGlobalCreate(&$_, ApplicationCommand $command):bool{return $this($_, 201, \HTTP\Method::Post, \String\Format('applications/%s/commands', $this->i), $command);}
	function CommandGlobalDelete(&$_, int $command):bool{return $this($_, 204, \HTTP\Method::Delete, \String\Format('applications/%s/commands/%s', $this->i, $command));}
	function CommandGlobalEdit(&$_, int $command, ApplicationCommand $delta):bool{return $this($_, 200, \HTTP\Method::Patch, \String\Format('applications/%s/commands/%s', $this->i, $command), $delta);}
	function CommandGlobalGet(&$_, int $command):bool{return $this($_, 200, \HTTP\Method::Get, \String\Format('applications/%s/commands/%s', $this->i, $command));}
	function CommandGlobalGetAll(&$_):bool{return $this($_, 200, \HTTP\Method::Get, \String\Format('applications/%s/commands', $this->i));}
	function GuildCommandCreate(&$_, int $guild, ApplicationCommand $channel):bool{return $this($_, 201, \HTTP\Method::Post, \String\Format('applications/%s/guilds/%s/commands', $this->i, $guild), $channel);}
	function GuildCommandDelete(&$_, int $guild, int $command):bool{return $this($_, 204, \HTTP\Method::Delete, \String\Format('applications/%s/guilds/%s/commands/%s', $this->i, $guild, $command));}
	function GuildCommandEdit(&$_, int $guild, int $command, ApplicationCommand $delta):bool{return $this($_, 201, \HTTP\Method::Patch, \String\Format('applications/%s/guilds/%s/commands/%s', $this->i, $guild, $command), $delta);}
	function GuildCommandGet(&$_, int $guild, int $command):bool{return $this($_, 200, \HTTP\Method::Get, \String\Format('applications/%s/guilds/%s/commands/%s', $this->i, $guild, $command));}
	function GuildCommandGetPermissions(&$_, int $guild, int $command):bool{return $this($_, 200, \HTTP\Method::Get, \String\Format('applications/%s/guilds/%s/commands/%s/permissions', $this->i, $guild, $command));}
	function GuildCommandGetAll(&$_, int $guild):bool{return $this($_, 200, \HTTP\Method::Get, \String\Format('applications/%s/guilds/%s/commands', $this->i, $guild));}
	function GuildCommandGetAllPermissions(&$_, int $guild):bool{return $this($_, 200, \HTTP\Method::Get, \String\Format('applications/%s/guilds/%s/commands/permissions', $this->i, $guild));}
	function GuildBansGet(&$_, int $guild, int $ban):bool{return $this($_, 200, \HTTP\Method::Get, \String\Format('guilds/%s/bans/%s', $guild, $ban));}
	function GuildBansGetAll(&$_, int $guild):bool{return $this($_, 200, \HTTP\Method::Get, \String\Format('guilds/%s/bans', $guild));}
	function GuildEventGetAll(&$_, int $guild):bool{return $this($_, 200, \HTTP\Method::Get, \String\Format('guilds/%s/scheduled-events', $guild));}
	function GuildGet(&$_, int $guild):bool{return $this($_, 200, \HTTP\Method::Get, \String\Format('guilds/%s', $guild));}
	function GuildGetPreview(&$_, int $guild):bool{return $this($_, 200, \HTTP\Method::Get, \String\Format('guilds/%s/preview', $guild));}
	function GuildInviteCreate(&$_, int $channel, Invite $invite):bool{return $this($_, 200, \HTTP\Method::Post, \String\Format('channels/%s/invites', $channel), $invite);}
	function GuildInvitesGetAll(&$_, int $guild):bool{return $this($_, 200, \HTTP\Method::Get, \String\Format('guilds/%s/invites', $guild));}
	function GuildLeave(&$_, int $guild):bool{return $this($_, 204, \HTTP\Method::Delete, \String\Format('users/@me/guilds/%s', $guild));}
	function GuildLogGet(&$_, int $guild):bool{return $this($_, 200, \HTTP\Method::Get, \String\Format('guilds/%s/audit-logs', $guild));}
	function GuildMemberBan(&$_, int $guild, int $message):bool{return $this($_, 204, \HTTP\Method::Put, \String\Format('guilds/%s/bans/%s', $guild, $message));}
	function GuildMemberBanRevoke(&$_, int $guild, int $message):bool{return $this($_, 204, \HTTP\Method::Delete, \String\Format('guilds/%s/bans/%s', $guild, $message));}
	function GuildMemberGet(&$_, int $guild, int $message):bool{return $this($_, 200, \HTTP\Method::Get, \String\Format('guilds/%s/members/%s', $guild, $message));}
	function GuildModerationDelete(&$_, int $guild, int $rule):bool{return $this($_, 204, \HTTP\Method::Delete, \String\Format('guilds/%s/auto-moderation/rules/%s', $guild, $rule));}
	function GuildModerationGet(&$_, int $guild, int $rule):bool{return $this($_, 200, \HTTP\Method::Get, \String\Format('guilds/%s/auto-moderation/rules/%s', $guild, $rule));}
	function GuildModerationGetAll(&$_, int $guild):bool{return $this($_, 200, \HTTP\Method::Get, \String\Format('guilds/%s/auto-moderation/%s', $guild));}
	function MeGet(&$_):bool{return $this($_, 200, \HTTP\Method::Get, 'users/@me');}
	function MeGetGuilds(&$_):bool{return $this($_, 200, \HTTP\Method::Get, 'users/@me/guilds');}
	function MessageDelete(&$_, int $channel, int $message):bool{return $this($_, 204, \HTTP\Method::Delete, \String\Format('channels/%s/messages/%s', $channel, $message));}		
	function MessageEdit(&$_, int $channel, int $message, Message $delta):bool{return $this($_, 200, \HTTP\Method::Patch, \String\Format('channels/%s/messages/%s', $channel, $message), $delta);}
	function MessageGet(&$_, int $channel, int $message):bool{return $this($_, 200, \HTTP\Method::Get, \String\Format('channels/%s/messages/%s', $channel, $message));}
	function MessagePost(&$_, int $channel, Message $message):bool{return $this($_, 200, \HTTP\Method::Post, \String\Format('channels/%s/messages', $channel), $message);}
	function Pin(&$_, int $channel, int $message):bool{return $this($_, 204, \HTTP\Method::Put, \String\Format('channels/%s/pins/%s', $channel, $message));}
	function PinRemove(&$_, int $channel, int $message):bool{return $this($_, 204, \HTTP\Method::Delete, \String\Format('channels/%s/pins/%s', $channel, $message));}
	function ShowTyping(&$_, int $channel):bool{return $this($_, 204, \HTTP\Method::Post, \String\Format('channels/%s/typing', $channel));}
	function ThreadPost(&$_, int $channel, Thread $thread):bool{return $this($_, 200, \HTTP\Method::Post, \String\Format('channels/%s/threads', $channel, $thread));}
	function ThreadPostMessage(&$_, int $channel, int $message, Thread $thread):bool{return $this($_, 200, \HTTP\Method::Post, \String\Format('channels/%s/messages/%s/threads', $channel, $message), $thread);}
}