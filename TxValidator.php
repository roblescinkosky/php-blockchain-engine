<?php
/**
 * 交易全量校验器
 * 功能：防双花、余额校验、格式校验
 */
class TxValidator {
    private $usedTx = [];

    public function validate(Transaction $tx, Wallet $wallet) {
        if ($tx->amount <= 0) return false;
        if (isset($this->usedTx[$tx->txId])) return false;
        if ($wallet->getBalance() < $tx->amount) return false;
        $this->usedTx[$tx->txId] = true;
        return true;
    }
}
?>
