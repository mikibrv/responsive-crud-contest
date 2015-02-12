<?php
/**
 * User: mcsere
 * Date: 2/12/15
 * Time: 9:31 AM
 * Contact: miki@softwareengineer.ro
 */

namespace MikiBrv\Domain\Models;


use MikiBrv\Entities\EntityTraits\EntityID;
use MikiBrv\Entities\EntityTraits\JSerialize;
use Mitch\LaravelDoctrine\Traits\Authentication;

class User
{
    use Authentication;
    use EntityID;
    use JSerialize;
} 