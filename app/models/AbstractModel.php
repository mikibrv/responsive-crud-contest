<?php
/**
 * User: mcsere
 * Date: 2/12/15
 * Time: 10:24 AM
 * Contact: miki@softwareengineer.ro
 */

namespace MikiBrv\Domain\Models;


abstract class AbstractModel implements \JsonSerializable
{
    function __toString()
    {
        return json_encode($this, false);
    }
}