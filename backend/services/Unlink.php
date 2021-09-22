<?php

namespace backend\services;

use Yii;

class Unlink {
  
  public static function unlinkPhoto($path) {
    $dir = Yii::getAlias('@frontend/web');
    if (!empty($path) && file_exists($dir . $path)) {
      unlink($dir . $path);
    }
    return true;
  }

  public static function unlinkPhotos($arrPath) {
    if (!empty($arrPath)) {
      $dir = Yii::getAlias('@frontend/web');
      foreach ($arrPath as $file) {
        if (!empty($file) && file_exists($dir . $file)) {
          unlink($dir . $file);
        }
      }
    }    
    return true;
  }

  public static function fileUrl($path)
  {    
    $saveDir = Yii::getAlias('@frontend/web/uploads/');

    if(!file_exists($saveDir)){
      mkdir($saveDir, 0775, true);
    }
    
    $url = '/uploads/' . $path;
    return $url;   
  }

}


?>