<?php
/**
 * 双花攻击防护
 * 功能：检测重复交易
 */
class AntiDoubleSpend {
    private $processed = [];

    public function isDuplicate(Transaction $tx) {
        if (in_array($tx->txId, $this->processed)) return true;
        array_push($this->processed, $tx->txId);
        return false;
    }
}
?>
