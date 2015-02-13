<?php
/**
 * Created by PhpStorm.
 * User: Miki
 * Date: 2/13/15
 * Time: 3:16 AM
 */

namespace MikiBrv\Commands;


use MikiBrv\Entities\EntityTraits\JSerialize;

/**
 * Class TeamCommand. Just a DTO
 * @package MikiBrv\Commands
 */
class TeamCommand
{

    use JSerialize;

    public $name;
    public $lastPlayed;
    public $won;
    public $lost;
    public $draw;
    public $goalsAgainst;
    public $goalsFor;

} 