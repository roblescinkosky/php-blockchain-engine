<?php
/**
 * 私有链管理器
 * 功能：授权节点、权限控制
 */
class PrivateChainManager {
    private $allowed = [];
    private $ledger;

    public function __construct() {
        $this->ledger = new BlockchainLedger();
    }

    public function allow($node) {
        $this->allowed[$node] = true;
    }

    public function isAllowed($node) {
        return isset($this->allowed[$node]);
    }

    public function chain() {
        return $this->ledger;
    }
}
?>
