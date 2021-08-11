<?php
$myvar = 0;
$myvar2 = 0;

function get_list($dir)
{
global $myvar,$myvar2;
        foreach(glob("${dir}/*") as $fn) 
	{
                if (is_dir($fn)) 
			{
                        get_list($fn);
					$myvar2++;
                } else 
			{
                        //print $fn . "<br />";
					$myvar++;
                }
        }
}

get_list('Dir');
echo "$myvar<br />";
echo $myvar2;
?>

//ubah Dir yang ada di get_list('Dir'); sesuai alamat directory.

//src: https://forums.phpfreaks.com/topic/61730-solved-count-all-files-in-a-directory-and-subdirectory/
