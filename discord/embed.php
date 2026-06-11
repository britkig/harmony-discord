<?php namespace Discord;
final class Embed extends \Base{
	public array $fields;
	public EmbedAuthor $author;
	public EmbedThumbnail $thumbnail;
	public EmbedFooter $footer;
	public EmbedImage $image;
	public int|AccentColor $color;
	public string $description,$timestamp,$title,$url;
}