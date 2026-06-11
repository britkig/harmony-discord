<?php namespace Discord;
enum InteractionEventContext:int{
	case Guild=0;
	case BotDm=1;
	case PrivateChannel=2;
}