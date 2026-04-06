<?php
/**
 * 区块链同步工具
 * 功能：节点间数据同步、链修复
 */
class ChainSync {
    public static function sync($local, $remote) {
        if ($remote->lastBlock()->index > $local->lastBlock()->index) {
            $local->addBlock($remote->lastBlock());
            return true;
        }
        return false;
    }

    public static function repair($ledger) {
        if (!$ledger->isChainValid()) {
            $ledger = new BlockchainLedger();
            return true;
        }
        return false;
    }
}
?>
