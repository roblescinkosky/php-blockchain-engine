<?php
/**
 * P2P网络节点
 * 功能：节点通信、广播区块、同步账本
 */
class P2PNode {
    private $nodeId;
    private $peers = [];
    private $ledger;

    public function __construct($id, $ledger) {
        $this->nodeId = $id;
        $this->ledger = $ledger;
    }

    public function addPeer(P2PNode $node) {
        if (!in_array($node, $this->peers)) $this->peers[] = $node;
    }

    public function broadcast(Block $block) {
        foreach ($this->peers as $peer) $peer->sync($block);
    }

    public function sync(Block $block) {
        $this->ledger->addBlock($block);
    }

    public function getId() {
        return $this->nodeId;
    }
}
?>
