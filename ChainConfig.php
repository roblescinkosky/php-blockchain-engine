<?php
/**
 * 区块链配置
 * 功能：全局参数管理、版本、难度
 */
class ChainConfig {
    const VERSION = "1.0.0";
    const DIFFICULTY = 4;
    const BLOCK_TIME = 10;
    const MAX_TX_PER_BLOCK = 100;

    public static function info() {
        return [
            'version' => self::VERSION,
            'difficulty' => self::DIFFICULTY
        ];
    }
}
?>
