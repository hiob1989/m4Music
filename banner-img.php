<?php

require_once '../../includes/bootstrap.inc';
require_once '../../includes/common.inc';
require_once '../../includes/module.inc';

$file_types = array( 
  'gif'  => 'image/gif',
  'jpg'  => 'image/jpeg',
  'jpeg' => 'image/jpeg',
  'png'  => 'image/png'
) ;

/**
 * randomly select an image from the current directory and return it
 */
$cached = 0;
$origin = '';
if (module_exists('imagecache')) {
  $directory = base_path().'/'.file_directory_path() .'/banners/';
  $origin = $directory;
  file_check_directory($directory, FILE_CREATE_DIRECTORY);
  $presetname = 'm4music_banner_image';
  $preset = imagecache_preset_by_name($presetname);

  while ( FALSE !== ($file = readdir( $directory )) ) {
    if ( preg_match( $regex, $file ) ) {
      $cached = 1;
    }
  }
  if (!$cached) {
    $directory = opendir("./banners/");
    $origin = "./banners/";
  }  else {
    $directory = opendir($origin);
  }
} else {
  $directory = opendir("./banners/");
  $origin = "./banners/";
}


$regex = '/\.(' . implode('|',array_keys($file_types)) . ')$/i' ;
$files = array() ;

while ( FALSE !== ($file = readdir( $directory )) ) {
  if ( preg_match( $regex, $file ) ) {
    $files[] = $origin.$file ;
  }
}

if ( !empty( $files ) ) {
  $which   = rand(0,sizeof($files)-1) ;

  if (module_exists('imagecache') && !$cached) {
    $src = $files[$which];
    $dst = m4music_imagecache_generate($presetname, $src);
    if (file_exists($dst)) {
      $files[$which] = $dst;
    }
  }
  #echo $files[$which];
  
  if ( $file = file_get_contents( $files[$which] ) ) {
    $parts   = explode('.',$files[$which]) ;
    $ext     = strtolower($parts[sizeof($parts)-1]) ;    
    header( "Content-type: " . $file_types[$ext] ) ;
    //header("Content-type: text/plain");
    header( "Expires: Wed, 29 Jan 1975 04:15:00 GMT" );
    header( "Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT" );
    header( "Cache-Control: no-cache, must-revalidate" );
    header( "Pragma: no-cache" );
    print $file ; 
    #echo "...";
  }  
  
}


function m4music_imagecache_generate($presetname, $filepath) {
  if (!$preset = imagecache_preset_by_name($presetname)) {
    return;
  } 
  $dst = imagecache_create_path($presetname, $filepath);
  if (!file_exists($dst)) {
    imagecache_build_derivative($preset['actions'], $filepath, $dst);
  }
  return $dst;
}
