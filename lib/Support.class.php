<?php
class Support
{
	static public function firstLetter($str)
	{
		return mb_substr($str,0,1,'utf-8');
	}
	static public function exceptFirstLetter($str)
	{
		$len=strlen($str)-1;
		return mb_substr($str,1,$len,'utf-8');
	}
	static public function buttonsLimits($page,$count)
	{
  		if($count>4)
  		{
  			$arr['l_num']=2;
  			$arr['r_num']=2;
  			$var=4;
  		}
  		else 
  		{
  			$arr['l_num']=intval($count/2);
  			$arr['r_num']=$arr['l_num'];
  			$var=$arr['l_num']*2;
  		}	
  		if(($page+$arr['r_num'])>$count)
  		{
  			$arr['r_num']=$count-$page;
  			$arr['l_num']=$var-$arr['r_num'];
  		}
  		elseif(($page-$arr['l_num'])<1)
  		{
  			$arr['l_num']=(($page-$arr['l_num'])<0)?0:$arr['l_num']-$page;
  			$arr['r_num']=$var-$arr['l_num'];  		
  		}
		
	return $arr;
	}
  static public function getRandBtn($page,$count)
  {
  $arr=self::buttonsLimits($page,$count);
	for($i=$page-$arr['l_num'];$i<=$page+$arr['r_num'];$i++)
	{
		if($i!=$page)
		{
			$mass[]=$i;		
		}	
	}
	$s=rand(0,count($mass));
	return $mass[$s];
  }
  static function img_resize($src, $dest, $width, $height, $rgb=0xFFFFFF, $quality=200)
		{
		if (!file_exists($src)) 
			return false;
		$size = getimagesize($src);
		if ($size === false) return false;
		// determine source-img type by MIME-information
		// from getimagesize() function, and coose proper
		// imagecreatefrom by source-img format 
		$format = strtolower(substr($size['mime'], strpos($size['mime'], '/')+1));
		$icfunc = "imagecreatefrom" . $format;
		if (!function_exists($icfunc)) 
			return false;
		$x_ratio = $width / $size[0];
		$y_ratio = $height / $size[1];
		$ratio       = min($x_ratio, $y_ratio);
		$use_x_ratio = ($x_ratio == $ratio);
		$new_width   = $use_x_ratio  ? $width  : floor($size[0] * $ratio);
		$new_height  = !$use_x_ratio ? $height : floor($size[1] * $ratio);
		$new_left    = $use_x_ratio  ? 0 : floor(($width - $new_width) / 2);
		$new_top     = !$use_x_ratio ? 0 : floor(($height - $new_height) / 2);
		$isrc = $icfunc($src);
		$idest = imagecreatetruecolor($width, $height);
		imagefill($idest, 0, 0, $rgb);
		imagecopyresampled($idest, $isrc, $new_left, $new_top, 0, 0, 
		$new_width, $new_height, $size[0], $size[1]);
		imagejpeg($idest, $dest, $quality);
		imagedestroy($isrc);
		imagedestroy($idest);
		return true;
		}	
	static public function makeSamples($dest,$dir_num,$img_src,$img_num,$dest_img_num)
	{
		/*
		 * $dest - folder`s start destanition
		 * $dir_num - result dir number
		 * $img_src - img sorces folder
		 * $img_num - number of source img
		 * $dest_img_num - result number of images per folder
		 */		
		$n=0;
		for($i=1;$i<=$dir_num;$i++)
		{
			$dir=$dest.'/'.$i.'/icon';
			mkdir($dir, 0700, true);		
			for($j=1;$j<=$dest_img_num;$j++)
			{
				$n++;
				$rand=rand(1,$img_num);
				$src=$img_src.$rand.'.jpg';
				$dst=$dest.'/'.$i.'/'.$n.'.jpg';
				$icon=$dest.'/'.$i.'/icon/'.$n.'.jpg';
				self::img_resize($src,$dst,530,530);
				self::img_resize($src,$icon,194,194);		
			} 		
		}
	}	  
}
?>