<?php
/**
 * 通用加密工具
 * 功能：MD5、Base64、异或加密
 */
class EncryptUtils {
    public static function md5($d) {
        return md5($d);
    }

    public static function base64e($d) {
        return base64_encode($d);
    }

    public static function base64d($d) {
        return base64_decode($d);
    }
}
?>
