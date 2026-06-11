<?php namespace Discord;
enum MessageFlags:int{
	case Ephemeral=1<<6;
	case ComponentsV2=1<<15;
}