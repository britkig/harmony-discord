<?php namespace Discord;
final class InteractionEvent extends \Base{
	private static function FormArgs(array $_):void{
		$event_type=InteractionEventType::tryFrom($_['type']);
		\Array\Get($guild, $_, 'guild', []);	
		\Array\Get($channel, $_, 'channel', []);
		\Array\Get($message, $_, 'message', []);
		\Array\Get($member, $_, 'member', []);
		$args=[];
		$command=[];
		switch($event_type){
			case InteractionEventType::MessageComponent:
				$args=$_['data'];
			break;
			case InteractionEventType::ApplicationCommand:
			case InteractionEventType::ApplicationCommandAutocomplete:
			$command=$_['data'];
			$command=[$command['name'],$command['id']];
			break;
		}
		$args=$_['data'];
		$autocomplete=null;
		switch($event_type){
			case InteractionEventType::ApplicationCommand:
			case InteractionEventType::ApplicationCommandAutocomplete:
				if(isset($args['options'])){
					$args=$args['options'];
					foreach($args as $a)
						if($event_type==InteractionEventType::ApplicationCommandAutocomplete)
							if($a['focused'])
								$autocomplete=$a['name'];
					$args=\array_column($args, 'value', 'name');
				}
				break;
		}

		$user=[];
		if(!$user) \Array\Get($user, $member, 'user', []);
		if($user) \Array\Get($user['locale'], $_, 'locale', false);
		unset($_, $a);		
		foreach(\get_defined_vars() as $a=>$b) \define(\String\Upper($a),$b);
	}
	static function Handler():never{
		try{
			\HTTP\MethodsAllowed(\HTTP\Method::Post);
			if(!\Array\Get($s,\HTTP\Headers,'X-Signature-Ed25519')) throw new \Error('Signature is missing.',400);
			if(!\Array\Get($t,\HTTP\Headers,'X-Signature-Timestamp')) throw new \Error('Timestamp is missing.',400);
			if(!\JSON\Decode($_, $b=\HTTP\Body)) throw new \Error('Body data missing, corrupted, or malformed.',400);
			if(!\Array\Get($i,$_,'application_id')) throw new \Error('Application ID is missing.',400);
			if(!\IO\FileRead($p,$p=__DIR__.'/app.path')) throw new \Error(\String\Format('Cannot load path file `%s`.',$p));
			if(!\System\CurrentDirectorySet($p)) throw new \Error(\String\Format('App repository directory `%s` does not exist.',$p));
			if(!\System\CurrentDirectorySet($i)) throw new \Error(\String\Format('App directory for app with ID `%s` does not exist.',$i));
			if(!\IO\FileRead($p,$p='pk')) throw new \Error(\String\Format('Validation key file `%s` for app with ID `%s` is missing.',$p,$i));
			if(!\Crypto\Sodium\SignVerifyDetached(\hex2bin($s),$t.$b,$p)) throw new \Error('Payload validation failed.',401);
			self::FormArgs($_);
			foreach(\array_keys(\get_defined_vars()) as $_) unset($$_);unset($_);	//	DISCARD ALL OTHER VARIABLES FOR SECURITY
			if(\EVENT_TYPE==InteractionEventType::Ping) InteractionResponse::Send(InteractionResponseType::Pong);	//	Discord ping response
		}catch(\Throwable $_){
			if($_->getCode()>=500)
				\IO\FilePut('R:/scratch/php_error.txt',\print_r([\getcwd(), $_, \get_defined_vars()],true));			
			\HTTP\Respond(new \HTTP\ErrorBody((string)$_), $_->getCode() ? $_->getCode() : 500);
		}try{	//	$args MUST NOT BE USED BEYOND THIS POINT AS IT NO LONGER EXISTS
		
			@include 'common.php';	//Optional pre-script for everything	
			switch(\EVENT_TYPE){
				case InteractionEventType::ModalSubmit:
					$_=include 'modal.php';break;
				case InteractionEventType::MessageComponent:
					$_=include 'components.php';break;
				case InteractionEventType::ApplicationCommand:
				case InteractionEventType::ApplicationCommandAutocomplete:
					$_=include \String\FormatV('%s.%s.php', \COMMAND);break;
			}
			if($_ instanceof Payload) InteractionResponse::Send($_);
			throw new UserException('The script for this command completed successfully without an error occuring, but nothing was returned.', 'No Script Output', ErrorIcon::Question);
		}catch(UserException $_){
			if(\EVENT_TYPE==InteractionEventType::ApplicationCommandAutocomplete) InteractionResponse::Send(new AutoComplete());
			InteractionResponse::Send($_->ConvertToMessage());
		}catch(\Throwable $_){
			\file_put_contents('R:/Scratch/uncaught-discord.txt',$_);
			if(\EVENT_TYPE==InteractionEventType::ApplicationCommandAutocomplete) InteractionResponse::Send(new AutoComplete());
			InteractionResponse::Send(UserException::GenericError($_));
		}
	}
}