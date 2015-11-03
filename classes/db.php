<?php
class db
{
    public $serverName = "ATTO\SQLEXPRESS";
    public $options = array("Database" => "Bolnica");
    public function connect()
    {
        return sqlsrv_connect($this->serverName, $this->options);

    }
}