<?php

class GetResponses
{
	private $dab;
	private $rid;
    public function __construct()
    {
        define('BASEPATH', __DIR__);
        $cfg = require_once __DIR__ . '/../application/config/config.php';
        $cfg = $cfg['components']['db'];
        preg_match('!dbname=(.+);!', $cfg['connectionString'], $mtc);
        $dbName = $mtc[1];
        $this->dab = new Dab(
            'localhost',
            $cfg['username'],
            $cfg['password'],
            $dbName
        );

        $this->rid = 5;
    }

    public function save()
    {
        return $this->dab->select("xen_" . $this->rid, null, ['id' => $this->responseId]);
        file_put_contents(__DIR__ . "/data.txt", '$_GET['a'], $_GET['b'], $_GET['c']\n', FILE_APPEND);
    }
}

$gr = new GetResponses();
$gr->save();


