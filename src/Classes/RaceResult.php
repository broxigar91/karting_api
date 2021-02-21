<?

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class RaceResult
{

    private $pilotName;
    private $position;
    private $time;
    private $bestLap;
    private $points;
    
    public function __construct($r, $position)
    {
        $this->pilotName = $r["name"];
        $this->time = $r["total_time"];
        $this->bestLap = $r["best_lap"];
        $this->$points = 0;
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

    public function toArray()
    {
        return [
            'pilot' => $this->pilotName,
            'total_time' => $this->time,
            'best_lap'  =>  $this->bestLap,
            'points' => $this->points
        ];
    }
}
?>