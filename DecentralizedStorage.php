<?php
/**
 * 去中心化存储
 * 功能：数据分片、存储、合并
 */
class DecentralizedStorage {
    private $shards = [];

    public function save($key, $data) {
        $this->shards[$key] = $data;
    }

    public function get($key) {
        return $this->shards[$key] ?? null;
    }

    public function merge($keys) {
        $res = '';
        foreach ($keys as $k) $res .= $this->get($k);
        return $res;
    }
}
?>
