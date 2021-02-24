<?

namespace App\Classes;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class RaceResult
{

    private $pilot;
    private $position;
    private $time;
    private $bestLap;
    private $points;
    
    public function __construct($r, $position)
    {
        $this->pilot = $r["pilot"];
        $this->time = $r["total_time"];
        $this->bestLap = $r["best_lap"];
        $this->position = $position;
        $this->points = 0;
    }

    public function setPoints($points)
    {
        $this->points = $points;
        return $this;
    }

    public function getPoints()
    {
        return $this->points;
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function getPilot()
    {
        return $this->pilot;
    }

    public function getBestLap()
    {
        return $this->bestLap;
    }

    public function getTotalTime()
    {
        return $this->time;
    }

    public function addPoints($pts)
    {
        $this->points += $pts;
    }
}
?>