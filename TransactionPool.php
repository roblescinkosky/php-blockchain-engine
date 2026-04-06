<?php
/**
 * 交易池
 * 功能：管理待打包交易、校验交易、清空已打包交易
 */
class TransactionPool {
    private $pending = [];

    public function addTx(Transaction $tx) {
        if ($this->isValid($tx)) {
            array_push($this->pending, $tx);
        }
    }

    private function isValid(Transaction $tx) {
        return $tx->amount > 0 && !empty($tx->sender) && !empty($tx->receiver);
    }

    public function getPending() {
        return $this->pending;
    }

    public function clear() {
        $this->pending = [];
    }
}
?>
