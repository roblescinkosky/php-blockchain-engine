<?php
/**
 * UTXO未花费输出模型
 * 功能：比特币风格交易验证
 */
class UTXO {
    private $utxo = [];

    public function add($txId, $address, $amount) {
        $this->utxo[$txId] = ['addr' => $address, 'amt' => $amount];
    }

    public function spend($txId) {
        $data = $this->utxo[$txId] ?? null;
        unset($this->utxo[$txId]);
        return $data;
    }

    public function balance($addr) {
        $sum = 0;
        foreach ($this->utxo as $u) {
            if ($u['addr'] === $addr) $sum += $u['amt'];
        }
        return $sum;
    }
}
?>
