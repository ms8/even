<?php
/**
 * Created by JetBrains PhpStorm.
 * User: syd3050
 * Date: 14-1-17
 * Time: 上午8:55
 * To change this template use File | Settings | File Templates.
 */

class PicCreate {

    /**
     * 上传文件
     * @param $fileInput 页面上type为file的控件的名称
     * @param $dir 文件要保存的目录，最后一个字符是'/'
     * @param $size 文件大小限制
     * @param $typeArr 文件类型校验数组
     * @param $new 如果目录不存在是否新建该目录，默认新建
     * @return 文件保存的路径
     */
    public function createPic($fileInput,$dir,$size,$typeArr,$new=true){

        $fileName = $_FILES[$fileInput]["name"];
        list($s1, $s2) = explode(' ', microtime());
        $fileName_store = (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000);
        $fileName_store.=rand(0,9999);
        $type = strstr($fileName, '.');
        $type = strtolower($type);

        $pic_path = $dir.$fileName_store .$type;

//        $picname = $_FILES[$fileInput]['name'];
        $picsize = $_FILES[$fileInput]['size'];
        if ($fileName != "") {
            if ($picsize > $size) {
                exit;
            }
//            $type = strstr($picname, '.');
//            $type = strtolower($type);
            $flag = 0;
            foreach($typeArr as $fileType){
                if ($type == $fileType ) {
                    $flag = 1;
                    break;
                }
            }
            //图片格式不对！
            if ($flag == 0 ) {
                exit;
            }
            if($new && !is_dir($dir)){
                mkdir($dir, 0777,true);
            }
            move_uploaded_file($_FILES[$fileInput]["tmp_name"],$pic_path);
            return $pic_path;
        }
        return '';
    }
}