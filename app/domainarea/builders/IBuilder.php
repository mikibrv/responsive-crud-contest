<?php
/**
 * Created by PhpStorm.
 * User: Miki
 * Date: 2/13/15
 * Time: 12:18 AM
 */

namespace MikiBrv\Domain\Builders;


use MikiBrv\Repositories\Common\IRepository;

interface IBuilder
{

    public function build();

    public function validate();

} 