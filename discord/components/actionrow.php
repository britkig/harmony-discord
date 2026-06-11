<?php namespace Discord\Components;
final class ActionRow extends ComponentBranching implements LegacyComponent{
	public Type $type{get{return Type::ActionRow;}}
}