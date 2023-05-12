<?php

namespace App\Traits;

trait HasModal
{
    public bool $show = false;

    public function toggle($key = null, $value = null): void
    {
        $this->setValue($key, $value);
        $this->show = ! $this->show;
    }

    public function open($key = null, $value = null): void
    {
        $this->setValue($key, $value);
        $this->show = true;
    }

    public function close($key = null, $value = null): void
    {
        $this->setValue($key, $value);
        $this->show = false;
    }

    public function setValue($key, $value)
    {
        if ($key && property_exists($this,$key)){
            $this->{$key} = $value;
        }
    }
}
