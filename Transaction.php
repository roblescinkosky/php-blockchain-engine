<?php
/**
 * 交易实体类
 * 功能：定义交易结构、生成交易哈希
 */
class Transaction {
    public $txId;
    public $sender;
    public $receiver;
    public $amount;
    public $timestamp;
    public $signature;

    public function __construct($sender, $receiver, $amount) {
        $this->txId = uniqid();
        $this->sender = $sender;
        $this->receiver = $receiver;
        $this->amount = $amount;
        $this->timestamp = time();
    }

    public function getTxHash() {
        return SHA256Hash::make(
            $this->txId . $this->sender . $this->receiver . $this->amount . $this->timestamp
        );
    }

    public function sign($signature) {
        $this->signature = $signature;
    }
}
?>
