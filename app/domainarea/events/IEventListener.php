<?php
/**
 * User: mcsere
 * Date: 2/13/15
 * Time: 9:37 AM
 * Contact: miki@softwareengineer.ro
 */

namespace MikiBrv\Domain\Events;


interface IEventListener
{

    public function handle($data);

    public static function getName();
} 