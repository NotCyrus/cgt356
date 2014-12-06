<?php

	$uploadsDir = 'uploads/';
	$result = array();
	$filename = "";
	
	if($_GET['binary'] == 'false')
	{
		$headers = emu_getallheaders();
		$content = base64_decode(file_get_contents('php://input'));
		
		if(!empty($content) && !empty($headers['Up-Filename']))
		{
			$filename = stripslashes($headers['Up-Filename']);
			$extension = getExtension($filename);
			if(($extension != "jpg") && ($extension != "jpeg") && ($extension != "gif") && ($extension != "png"))
			{
				$result = array('error' => 'Invalid extension.',
								'source' => '');
				echo json_encode($result);
				exit;
			}
			else
			{
				
				if(!file_put_contents($uploadsDir . $filename, $content))
				{
					$result = array('error' => 'Image could not be copied.',
								'source' => '');
					echo json_encode($result);
					exit;
				}
			}
		}
	}
	else
	{
		$image = $_FILES['image']['name'];
		if($image)
		{
			$filename = stripslashes($_FILES['image']['name']);
			$extension = getExtension($filename);
			if(($extension != "jpg") && ($extension != "jpeg") && ($extension != "gif") && ($extension != "png"))
			{
				$result = array('error' => 'Invalid extension.',
								'source' => '');
				echo json_encode($result);
				exit;
			}
			else
			{
				$filename = $_FILES['image']['name'];
				if(!file_put_contents($uploadsDir . $filename, $content))
				{
					$result = array('error' => 'Image could not be copied.',
								'source' => '');
					echo json_encode($result); 
					exit;
				}
			}
		}
		else
		{
			$result = array('error' => 'Image could not be uploaded.',
								'source' => '');
			echo json_encode($result);
			exit;
		}
	}
	
	$result = array('error' => '',
					'source' => $uploadsDir . $filename);
	echo json_encode($result);
	
	
	//additional functions
	
	function getExtension($str)
	{
		$i = strrpos($str, ".");
		if(!$i)
		{
			return "";
		}
		$l=strlen($str) - $i;
		$ext = strtolower(substr($str, $i + 1, $l));
		return $ext;
	}
	
	function emu_getallheaders()
	{
		foreach($SERVER as $name => $value)
		{
			if(substr($name, 0, 5) =='HTTP_')
				$headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
		}
		return $headers;
	}
	//resize image
	$dir = "./uploads/";
	$middir = "./mid/";
	$thdir = "./thumb/";
	$img = $fileName;

	resizejpeg($dir, $middir, $img, 480, 360, "mid_");
	resizejpeg($dir, $thdir, $img, 160, 120, "th_");
///////////////////////////////////////////////////////////
// function resizejpeg
//
//    creates a resized image based on the max width
//    specified as well as generates a thumbnail from
//    a rectangle cut from the middle of the image.
//
//    @dir    = directory image is stored in
//    @newdir = directory new image will be stored in
//    @img    = the image name
//    @max_w  = the max width of the resized image
//    @max_h  = the max height of the resized image
//    @prefix = the prefix of the resized image
//
///////////////////////////////////////////////////////////

function resizejpeg($dir, $newdir, $img, $max_w, $max_h, $prefix)
{
   // set destination directory
   if (!$newdir) $newdir = $dir;

   // get original images width and height
   list($or_w, $or_h, $or_t) = getimagesize($dir.$img);

   // make sure image is a jpeg
   if ($or_t == 2) 
   {
   
       // obtain the image's ratio
       $ratio = ($or_h / $or_w);

       // original image
       $or_image = imagecreatefromjpeg($dir.$img);

       // resize image?
       if ($or_w > $max_w || $or_h > $max_h) {

           // resize by height, then width (height dominant)
           if ($max_h < $max_w) {
               $rs_h = $max_h;
               $rs_w = $rs_h / $ratio;
           }
           // resize by width, then height (width dominant)
           else {
               $rs_w = $max_w;
               $rs_h = $ratio * $rs_w;
           }

           // copy old image to new image
           $rs_image = imagecreatetruecolor($rs_w, $rs_h);
           imagecopyresampled($rs_image, $or_image, 0, 0, 0, 0, $rs_w, $rs_h, $or_w, $or_h);
       }
       // image requires no resizing
       else {
           $rs_w = $or_w;
           $rs_h = $or_h;

           $rs_image = $or_image;
       }

       // generate resized image
       imagejpeg($rs_image, $newdir.$prefix.$img, 100);

       return true;
   } 

   // Image type was not jpeg!
   else 
   {
       return false;
   }
}
?>