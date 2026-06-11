<?php namespace Discord;
final class InteractionResponse extends Payload{
	public InteractionResponseType $type;
	public $data;
	static function Send($data):never{
		$type=false;
		if($data===InteractionResponseType::Pong) $type=InteractionResponseType::Pong;
		if($data instanceof Autocomplete) $type=InteractionResponseType::ApplicationCommandAutocompleteResult;
		if($data instanceof Message){
			$type=InteractionResponseType::ChannelMessageWithSource;
			\BitmaskSet($data->flags, MessageFlags::Ephemeral);
			if(isset($data->components)){
				unset($data->content);
				unset($data->embeds);
				\BitmaskSet($data->flags, MessageFlags::ComponentsV2);
			}
		}
		if(!$type) throw \ValueError('Invalid payload type.');
		$data=new self(['type'=>$type,'data'=>$data]);
			//	\IO\FilePut('R:/interactions_output.txt',$data);
	\HTTP\Respond($data);}
		
	static function SendString(string $message):never{
		self::Send(new Message(['content'=>$message]));}
}