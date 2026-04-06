<?php
/**
 * P2P网络消息
 * 功能：消息序列化、反序列化
 */
class NetworkMessage {
    const BLOCK = "BLOCK";
    const TX = "TRANSACTION";
    const PING = "PING";

    private $type;
    private $content;
    private $time;

    public function __construct($type, $content) {
        $this->type = $type;
        $this->content = $content;
        $this->time = time();
    }

    public function encode() {
        return base64_encode(json_encode($this));
    }

    public static function decode($data) {
        return json_decode(base64_decode($data));
    }
}
?>
