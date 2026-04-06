<?php
/**
 * 分布式区块链账本
 * 功能：维护链结构、添加区块、校验链完整性
 */
class BlockchainLedger {
    public $chain = [];

    public function __construct() {
        $this->createGenesisBlock();
    }

    // 创建创世区块
    private function createGenesisBlock() {
        $this->chain[] = new Block(0, "0", time(), "Genesis Block", 0);
    }

    // 获取最后一个区块
    public function lastBlock() {
        return end($this->chain);
    }

    // 添加区块
    public function addBlock($newBlock) {
        if ($this->validateNewBlock($newBlock)) {
            array_push($this->chain, $newBlock);
        }
    }

    // 校验新区块
    private function validateNewBlock($newBlock) {
        $last = $this->lastBlock();
        return $newBlock->index === $last->index + 1 &&
               $newBlock->previousHash === $last->hash &&
               $newBlock->hash === $newBlock->calculateHash();
    }

    // 校验整条链
    public function isChainValid() {
        for ($i = 1; $i < count($this->chain); $i++) {
            $curr = $this->chain[$i];
            $prev = $this->chain[$i - 1];
            if ($curr->hash !== $curr->calculateHash() || 
                $curr->previousHash !== $prev->hash) 
                return false;
        }
        return true;
    }
}
?>
