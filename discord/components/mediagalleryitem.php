<?php namespace Discord\Components;
final class MediaGalleryItem extends \Base{
	public UnfurledMediaItem $media;
	public string $description;
	public bool $spoiler;
}