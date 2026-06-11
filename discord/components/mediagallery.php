<?php namespace Discord\Components;
final class MediaGallery extends Component{
	public Type $type{get{return Type::MediaGallery;}}
	public array $items;

	static function Quick(array $urls):static{
		$_=[];
		foreach($urls as $k=>$v){
			if(\String\Is($v)){
				$v=new UnfurledMediaItem(['url'=>$v]);
				$v=new MediaGalleryItem(['media'=>$v]);
				$urls[$k]=$v;
			}else{
				unset($urls[$k]);
			}
			$_[]=$v;
		}
		$_=new static(['items'=>$_]);

		return $_;
	}
}