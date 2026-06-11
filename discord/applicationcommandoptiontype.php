<?php namespace Discord;
enum ApplicationCommandOptionType:int{
	case SubCommand=1;
	case SubCommandGroup=2;
	case String=3;
	case Integer=4;
	case Boolean=5;
	case User=6;
	case Channel=7;
	case Role=8;
	case Mentionable=9;
	case Number=10;
	case Attachment=11;
}