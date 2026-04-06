<?php
/**
 * 区块校验器
 * 功能：校验哈希、前区块、索引合法性
 */
class BlockValidator {
    public static function check(Block $curr, Block $prev) {
        return $curr->hash === $curr->calculateHash() &&
               $curr->previousHash === $prev->hash &&
               $curr->index === $prev->index + 1;
    }
}
?>
