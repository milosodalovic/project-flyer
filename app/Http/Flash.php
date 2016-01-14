<?php


namespace app\Http;


/**
 * Class Flash
 * @package app\Http
 */
class Flash {

    /**
     * Flashing a message  to a session
     *
     * @param string $title
     * @param string $message
     * @param string $level
     * @param string $key
     */
    public function create ($title, $message, $level='info', $key='flash_message')
    {
        session()->flash($key, [
            'title' => $title,
            'message' => $message,
            'level' => $level
        ]
        );
    }

    /**
     * Flashing message of type 'info' to  a session
     * @param $title
     * @param $message
     */
    public function info ($title, $message)
    {
        return  $this->create($title, $message, 'info' );
    }

    /**
     * Flashing message of type 'success' to  a session
     * @param $title
     * @param $message
     */
    public function success ($title, $message)
    {
       return  $this->create($title, $message, 'success' );
    }

    /**
     * Flashing message of type 'error' to  a session
     * @param $title
     * @param $message
     */
    public function error ($title, $message)
    {
        return $this->create($title, $message, 'error' );

    }

    /**
     * Flashing message of type 'warning' to  a session
     * @param $title
     * @param $message
     */
    public function warning ($title, $message)
    {
        return $this->create($title, $message, 'warning' );
    }

    /**
     * Flashing message of type 'overlay' to  a session with overwritten default key
     * @param $title
     * @param $message
     * @param string $level
     */
    public function overlay ($title, $message, $level='success')
    {
        return  $this->create($title, $message, $level, 'flash_overlay_message' );
    }
}