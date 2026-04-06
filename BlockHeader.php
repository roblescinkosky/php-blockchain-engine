<?php
/**
 * 区块头元数据类
 * 功能：管理区块版本、难度、默克尔根、时间戳
 */
class BlockHeader {
    public $version;
    public $prevHash;
    public $merkleRoot;
    public $timestamp;
    public $difficulty;
    public $nonce;

    public function __construct($prevHash, $merkleRoot, $difficulty) {
        $this->version = "1.0.0";
        $this->prevHash = $prevHash;
        $this->merkleRoot = $merkleRoot;
        $this->timestamp = time();
        $this->difficulty = $difficulty;
        $this->nonce = 0;
    }

    public function getHeaderHash() {
        return hash('sha256', json_encode($this));
    }
}
?>
