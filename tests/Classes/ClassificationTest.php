<?

namespace test\Classes;

use App\Classes\Classification;
use App\Classes\RaceResult;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use PHPUnit\Framework\TestCase;

class ClassificationTest extends TestCase
{
    public function testFill()
    {
        $data = [
            [
                "pilot" => "hony",
                "total_time" => "10375.026000",
                "best_lap" => "00:08:01.814"
            ],
            [
                "pilot" => "antonio",
                "total_time" => "10403.209000",
                "best_lap" => "00:08:02.180"
            ],
        ];

        $col = new Classification($data);

        $results = $col->getResults();

        $this->assertEquals("hony", $results[0]->getPilot());
        $this->assertEquals("26", $results[0]->getPoints());
        
    }
}