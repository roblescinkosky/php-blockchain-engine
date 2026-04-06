<?php
/**
 * 交易编解码器
 * 功能：交易序列化、网络传输
 */
class TxEncoder {
    public static function encode(Transaction $tx) {
        return implode("|", [
            $tx->txId, $tx->sender, $tx->receiver, $tx->amount, $tx->getTxHash()
        ]);
    }

    public static function decode($str) {
        $arr = explode("|", $str);
        return new Transaction($arr[1], $arr[2], $arr[3]);
    }
}
?>
