<?php


namespace App\Http\Model\Services;


use App\Http\Model\Managers\WorkerManager;

class UnactivateWorkersService
{

    /**
     * @var WorkerManager
     */
    private $workerManager;

    public function __construct()
    {
        $this->workerManager = new WorkerManager();
    }

    public function unactivateWorkersIfConditionIsFulfilled()
    {
        
    }

}