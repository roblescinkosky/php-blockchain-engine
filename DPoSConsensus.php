<?php
/**
 * 委托权益证明 DPoS
 * 功能：节点投票、选举记账节点、生成区块
 */
class DPoSConsensus {
    private $votes = [];

    public function vote($nodeId, $count) {
        $this->votes[$nodeId] = isset($this->votes[$nodeId]) ? 
            $this->votes[$nodeId] + $count : $count;
    }

    public function electDelegate() {
        arsort($this->votes);
        return key($this->votes);
    }

    public function generateBlock($ledger, $data) {
        $last = $ledger->lastBlock();
        $nonce = ProofOfWork::mine($last);
        return new Block($last->index + 1, $last->hash, time(), $data, $nonce);
    }
}
?>
