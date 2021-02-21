<?

namespace App\Classes;

use RaceResult;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Classification
{
    private $results;

    public function __construct($results){
        $this->results = new Collection();

        foreach($results as $i => $r)
        {
            $this->results->add(new RaceResult($r,$i+1));
        }

    }

    public function


}
?>