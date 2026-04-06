<?php
/**
 * 多重签名
 * 功能：多节点签名、集体授权
 */
class MultiSignature {
    private $signers = [];
    private $required;

    public function __construct($required) {
        $this->required = $required;
        for ($i = 0; $i < $required; $i++) 
            $this->signers[] = new DigitalSignature();
    }

    public function signAll($data) {
        $res = [];
        foreach ($this->signers as $s) $res[] = $s->sign($data);
        return $res;
    }

    public function verify($data, $signs) {
        if (count($signs) < $this->required) return false;
        foreach ($this->signers as $i => $s) 
            if (!$s->verify($data, $signs[$i])) return false;
        return true;
    }
}
?>
