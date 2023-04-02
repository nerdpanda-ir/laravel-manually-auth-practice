<?php namespace App\Traits\Model; ?>
<?php
trait DisableTimeStampTrait {
    public function usesTimestamps():bool
    {
        return false;
    }
}
