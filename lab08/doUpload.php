<?php
//make sure the page doesn't time out in case of large file
set_time_limit(300);

//make sure the submit button was pressed
if($_POST["uploadFile"]!="")
{
	echo("something");
	//get the file extension
    $fileExt = strchr($_FILES['userfile']['name'], ".");
	
	//if file extension is not in the list, don't allow upload
	if(($extension != "jpg") && ($extension != "jpeg") && ($extension != "gif") && ($extension != "png"))
	{
		//set the session message in case of a bad file type
		$_SESSION["badFileType"] = "You cannot upload a file of type ".$fileExt;
	}
	else
	{
		//get the file name
		$fileName = $_FILES['userfile']['name'];
		
		//make sure the file is uploaded
		if(!is_uploaded_file($_FILES['userfile']['tmp_name']))
		{
			echo "Problem: possible file upload attack";
			exit;
		}
		
		//name the file. This one includes the directory as well
		$upfile = "uploads/".$fileName;
		
		//copy the file into it's location on the server
		if(!copy($_FILES['userfile']['tmp_name'], $upfile))
		{
			echo "Problem: Could not move file into directory";
			exit;
		}
		
		echo $fileName;
		
	} // end filetype check
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