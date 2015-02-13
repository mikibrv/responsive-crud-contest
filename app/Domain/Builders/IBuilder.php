<?php
/**
 * Created by PhpStorm.
 * User: Miki
 * Date: 2/13/15
 * Time: 12:18 AM
 */

namespace MikiBrv\Domain\Builders;


interface IBuilder
{

    public static function create();

    public function build();

    public function validate();

} 