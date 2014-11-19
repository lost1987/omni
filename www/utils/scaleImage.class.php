<?php
/**
 * Created by PhpStorm.
 * User: shameless
 * Date: 14/11/3
 * Time: 下午5:31
 */

namespace utils;


class ScaleImage {

    private static $_instance = null;

    static function instance(){
        if(self::$_instance == null)
            self::$_instance = new  self();
        return self::$_instance;
    }

    /**
     * * 缩略图主函数
     * @param string $src 图片路径
     * @param string $to_path 将文件输出到别的文件夹
    *  @param int $to_width 压缩后图片的宽度
     * @param $src
     * @return string
     */
    function resize($src,$to_path,$to_width=0) {
        $temp=pathinfo($src);
        $name=$temp["basename"];//文件名
        $dir=$temp["dirname"];//文件所在的文件夹
        $extension=$temp["extension"];//文件扩展名
        $savepath= $to_path.'/'.$name;//缩略图保存路径

        //获取图片的基本信息
        $info=getimagesize($src);
        $width=$info[0];//获取图片宽度
        $height=$info[1];//获取图片高度
        if($width < $to_width)
            $to_width = $width;
        $w = $to_width;//压缩后图片的宽度
        $h = intval($to_width * $height / $width);//等比缩放图片高度
        $temp_img=imagecreatetruecolor($w,$h);//创建画布

        $info=getimagesize($src);
        switch ($info[2]) {
            case 1:
                $im=imagecreatefromgif($src);
                imagecopyresampled($temp_img,$im,0,0,0,0,$w,$h,$width,$height);
                imagegif($temp_img,$savepath);
                break;
            case 2:
                $im=imagecreatefromjpeg($src);
                imagecopyresampled($temp_img,$im,0,0,0,0,$w,$h,$width,$height);
                imagejpeg($temp_img,$savepath,80);
                break;
            case 3:
                $im=imagecreatefrompng($src);
                imagecopyresampled($temp_img,$im,0,0,0,0,$w,$h,$width,$height);
                imagepng($temp_img,$savepath,5);
                break;
        }
        imagedestroy($im);
        return $savepath;
    }
}