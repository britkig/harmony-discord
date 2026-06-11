<?php namespace Discord;
enum InteractionResponseType:int{
	case Pong=1;
	case ChannelMessageWithSource=4;
	case DeferredChannelMessageWithSource=5;
	case DeferredUpdateMessage=6;
	case UpdateMessage=7;
	case ApplicationCommandAutocompleteResult=8;
	case Modal=9;
	case PremiumRequired=10;
	case LaunchActivity=12;
}