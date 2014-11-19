<?php
/**
 * Created by PhpStorm.
 * User: lost
 * Date: 14-9-26
 * Time: 上午10:46
 */

namespace utils;
use core\Redirect;
use gms\libs\Error;

/**
 * Class Upload
 * @package utils
 *
 *      IMAGETYPE_GIF => "gif",
        IMAGETYPE_JPEG => "jpg",
        IMAGETYPE_PNG => "png",
        IMAGETYPE_SWF => "swf",
        IMAGETYPE_PSD => "psd",
        IMAGETYPE_BMP => "bmp",
        IMAGETYPE_TIFF_II => "tiff",
        IMAGETYPE_TIFF_MM => "tiff",
        IMAGETYPE_JPC => "jpc",
        IMAGETYPE_JP2 => "jp2",
        IMAGETYPE_JPX => "jpx",
        IMAGETYPE_JB2 => "jb2",
        IMAGETYPE_SWC => "swc",
        IMAGETYPE_IFF => "iff",
        IMAGETYPE_WBMP => "wbmp",
        IMAGETYPE_XBM => "xbm",
        IMAGETYPE_ICO => "ico"
 *
        IMAGETYPE_GIF	image/gif
        IMAGETYPE_JPEG	image/jpeg
        IMAGETYPE_PNG	image/png
        IMAGETYPE_SWF	application/x-shockwave-flash
        IMAGETYPE_PSD	image/psd
        IMAGETYPE_BMP	image/bmp
        IMAGETYPE_TIFF_II (intel byte order)	image/tiff
        IMAGETYPE_TIFF_MM (motorola byte order)	image/tiff
        IMAGETYPE_JPC	application/octet-stream
        IMAGETYPE_JP2	image/jp2
        IMAGETYPE_JPX	application/octet-stream
        IMAGETYPE_JB2	application/octet-stream
        IMAGETYPE_SWC	application/x-shockwave-flash
        IMAGETYPE_IFF	image/iff
        IMAGETYPE_WBMP	image/vnd.wap.wbmp
        IMAGETYPE_XBM	image/xbm
 */
class Upload {

        private static  $_instance = null;

        private $_mine_types = null;

        private $_upload_max_size = null;//b为单位

        /**
         * 上传文件夹路径
         * @var null
         */
        private $_upload_folder = null;

        private $_upload_path = null;

        /**
         * 允许的文件扩展名
         * @var array
         */
        private $_allowed_ext = null;

        /**
         * @var  array
         */
        private  $_file = null;

       function __construct(){
            $this->_mine_types = array(
                    'jpg' => array('image/jpeg'),
                    'png' => array('image/png'),
                    'gif'  => array('image/gif')
            );
       }

        static function instance(){
             if(self::$_instance == null)
                 self::$_instance = new self;
            return self::$_instance;
        }

        /**
         * @param $path 相对于虚拟主机根目录开始 (多层路径 两边不要加斜杠)
         * @return $this
         */
        function set_upload_folder($path){
            $day_folder = date('Ymd');
            $this->_upload_folder = $path.'/'.$day_folder;
            $this->_upload_path = BASE_PATH.'/'.BASE_PROJECT.'/'.$path.'/';
            if(!is_dir($this->_upload_path.$day_folder))
                mkdir($this->_upload_path.$day_folder,0777,true);
            $this->_upload_path = $this->_upload_path.$day_folder.'/';
            return $this;
        }

        /**
         * @param int $size 默认512KB
         * @return $this
         */
        function set_max_size($size=524288){
            $this->_upload_max_size = $size;
            return $this;
        }


        function set_allowed_ext(Array $ext){
            $this->_allowed_ext = $ext;
        }

        /**
         * @param $mine_type
         * @return bool
         */
        function check_mines($mine_type){
                $valid = false;
                foreach($this->_allowed_ext as $ext) {
                    $mine_type_valid = $this->_mine_types[$ext];
                    if(in_array($mine_type,$mine_type_valid)){
                        $valid = true;//验证通过
                        break;
                    }
                }
                return $valid;
        }

        /**
         * @param $file_size
         * @return bool
         */
        function check_size($file_size){
               if($file_size >= $this->_upload_max_size)
                   return false;
               return true; //=验证通过
        }


        function check_upload_path(){
                if(is_dir($this->_upload_path))
                    return true;
                return false;
        }


        /**
         * @param $file $_FILE[file]
         */
        function upload($file){
            $this->_file = $file;

            //检查mine-type
            if(!$this->check_mines($this->_file['type']))
                Redirect::instance()->forward('/error/code/'.Error::UPLOAD_MIME_TYPE_INVALID);

            //检查文件大小
            if(!$this->check_size($this->_file['size']))
                Redirect::instance()->forward('/error/code/'.Error::UPLOAD_FILE_IS_TOO_LARGE);

            //上传文件夹不存在
            if(!$this->check_upload_path())
                Redirect::instance()->forward('/error/code/'.Error::UPLOAD_INVALID_PATH);

            //获得后缀
            list(,$ext) = explode('.',$this->_file['name']);
            $file_name = md5($this->_file['name'].time()). '.' .$ext;

            if(!move_uploaded_file($this->_file['tmp_name'],$this->_upload_path.$file_name))
                Redirect::instance()->forward('/error/code/'.Error::UPLOAD_FILE_FAILED);

            return array(
                'path' => $this->_upload_path.$file_name,
                'url' => '/'.$this->_upload_folder.'/'.$file_name
            );
        }

}