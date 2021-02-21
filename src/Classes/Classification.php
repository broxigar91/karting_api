<?

namespace App\Classes;

use App\Classes\RaceResult;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\Criteria;

class Classification
{
    private $results;

    public function __construct($results)
    {
        $this->results = new ArrayCollection();

        foreach($results as $i => $r)
        {
            $this->results->add(new RaceResult($r,$i+1));
        }

        $this->setPoints();

    }

    private function setPoints()
    {
        if(!$this->results->isEmpty())
        {
            foreach($this->results as $r)
            {
                switch($r->getPosition())
                {
                    case 1:
                        $r->setPoints(25); 
                    break;
                    case 2:
                        $r->setPoints(18); 
                    break;
                    case 3:
                        $r->setPoints(15); 
                    break;
                    case 4:
                        $r->setPoints(12); 
                    break;
                    case 5:
                        $r->setPoints(10);  
                    break;
                    case 6:
                        $r->setPoints(8); 
                    break;
                    case 7:
                        $r->setPoints(6); 
                    break;
                    case 8:
                        $r->setPoints(4); 
                    break;
                    case 9:
                        $r->setPoints(2); 
                    break;
                    case 10:
                        $r->setPoints(1); 
                    break;
                }
            }

            $criteria = Criteria::create()
            ->setMaxResults(1)
            ->orderBy(["best_lap" => "ASC"]);

            $matched = $this->results->matching($criteria);

            $this->results[$this->results->indexOf($matched[0])]->addPoints(1);
        }
    }

    public function getResults(){
        return $this->results;
    }


}
?>