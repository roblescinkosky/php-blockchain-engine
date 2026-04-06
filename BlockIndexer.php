<?php
/**
 * 区块索引器
 * 功能：哈希/高度快速查询区块
 */
class BlockIndexer {
    private $hashMap = [];
    private $heightMap = [];

    public function index(Block $b) {
        $this->hashMap[$b->hash] = $b;
        $this->heightMap[$b->index] = $b;
    }

    public function getByHash($h) {
        return $this->hashMap[$h] ?? null;
    }

    public function getByHeight($i) {
        return $this->heightMap[$i] ?? null;
    }
}
?>
