<?php
/**
 * 数字签名工具
 * 功能：RSA签名、验签、密钥生成
 */
class DigitalSignature {
    private $privateKey;
    private $publicKey;

    public function __construct() {
        $config = [
            "digest_alg" => "sha256",
            "private_key_bits" => 2048,
        ];
        $res = openssl_pkey_new($config);
        openssl_pkey_export($res, $this->privateKey);
        $pub = openssl_pkey_get_details($res);
        $this->publicKey = $pub["key"];
    }

    // 签名数据
    public function sign($data) {
        openssl_sign($data, $sign, $this->privateKey, OPENSSL_ALGO_SHA256);
        return base64_encode($sign);
    }

    // 验证签名
    public function verify($data, $sign) {
        return openssl_verify($data, base64_decode($sign), $this->publicKey, OPENSSL_ALGO_SHA256) === 1;
    }

    public function getPublicKey() {
        return $this->publicKey;
    }
}
?>
