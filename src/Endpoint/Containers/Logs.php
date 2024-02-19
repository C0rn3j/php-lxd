<?php

namespace Opensaucesystems\Lxd\Endpoint\Containers;

use Opensaucesystems\Lxd\Endpoint\AbstructEndpoint;

class Logs extends AbstructEndpoint
{
    protected function getEndpoint()
    {
        return '/instances/';
    }

    /**
     * List of logs for a container
     *
     * @param  string $name Name of container
     * @return array
     */
    public function all($name)
    {
        $logs = [];

        foreach ($this->get($this->getEndpoint().$name.'/logs') as $log) {
            $logs[] = str_replace(
                '/'.$this->client->getApiVersion().'/instances/'.$name.'/logs/',
                '',
                $log
            );
        }

        return $logs;
    }

    /**
     * Get the contents of a particular log file
     *
     * @param string $name  Name of container
     * @param string $log   Name of log
     * @return object
     */
    public function read($name, $log)
    {
        return $this->get($this->getEndpoint().$name.'/logs/'.$log);
    }

    /**
     * Remove a particular log file
     *
     * @param string $name  Name of container
     * @param string $log   Name of log
     * @return object
     */
    public function remove($name, $log)
    {
        return $this->delete($this->getEndpoint().$name.'/logs/'.$log);
    }

    /**
     * List of exec-output logs for a container
     *
     * @param  string $name Name of container
     * @return array
     */
    public function allExecOutput($name)
    {
        $logs = [];

        foreach ($this->get($this->getEndpoint().$name.'/logs/exec-output') as $log) {
            $logs[] = str_replace(
                '/'.$this->client->getApiVersion().'/instances/'.$name.'/logs/exec-output/',
                '',
                $log
            );
        }

        return $logs;
    }

    /**
     * Get the contents of a particular exec-output log file
     *
     * @param string $name  Name of container
     * @param string $log   Name of log
     * @return object
     */
    public function readExecOutput($name, $log)
    {
        return $this->get($this->getEndpoint().$name.'/logs/exec-output/'.$log);
    }

    /**
     * Remove a particular exec-output log file
     *
     * @param string $name  Name of container
     * @param string $log   Name of log
     * @return object
     */
    public function removeExecOutput($name, $log)
    {
        return $this->delete($this->getEndpoint().$name.'/logs/exec-output/'.$log);
    }
}
