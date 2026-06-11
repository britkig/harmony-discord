<?php namespace Discord;
enum InteractionEventType:int{
	case Ping=1;
	case ApplicationCommand=2;
	case MessageComponent=3;
	case ApplicationCommandAutocomplete=4;
	case ModalSubmit=5;
}