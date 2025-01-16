<?php

namespace Apnem19\Alerts;

interface SessionStore
{
    public function flash($name, $data);
}