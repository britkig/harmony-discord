<?php namespace Discord;
enum ApplicationCommandType:int{
	case ChatInput=1;
	case User=2;
	case Message=3;
}