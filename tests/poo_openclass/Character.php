<?php
class Character{
    private $_id;
    private $_name;
    private $_strength;
    private $_experience;
    private $_damage;
    private $_level;

    public function id(){
        return $this->_id;
    }
}