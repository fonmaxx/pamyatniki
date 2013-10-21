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

}
?>