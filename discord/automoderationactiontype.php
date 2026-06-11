<?php namespace Discord;
enum AutoModerationActionType:int{
	case BlockMessage=1;
	case SendAlertMessage=2;
	case Timeout=3;
}