<?php namespace Discord;
enum ErrorIcon:string{
	case None='';
	case Error='x';
	case Warning='warn';
	case Information='information_source';
	case Question='question';
	case Success='white_check_mark';
	case AccessDenied='no_entry_sign';
	case Lock='lock';
	case Delay='stopwatch';
}