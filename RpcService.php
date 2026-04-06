<?php
/**
 * RPC接口服务
 * 功能：对外提供区块链API接口
 */
class RpcService {
    private $ledger;

    public function __construct($ledger) {
        $this->ledger = $ledger;
    }

    public function getHeight() {
        return $this->ledger->lastBlock()->index;
    }

    public function getBlock($hash) {
        return $this->ledger->chain[array_search($hash, array_column($this->ledger->chain, 'hash'))] ?? null;
    }
}
?>
