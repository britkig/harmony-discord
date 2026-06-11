<?php namespace Discord\Components;
final class Section extends ComponentBranching{
	public Type $type{get{return Type::Section;}};
	public SectionAccessory $accessory;
}