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
                "total_time" => "10:00:45",
                "best_lap" => "00:08:03.814"
            ],
            [
                "pilot" => "antonio",
                "total_time" => "10:02:45",
                "best_lap" => "00:08:02.180"
            ],
            [
                "pilot" => "nuertt",
                "total_time" => "10:03:44",
                "best_lap" => "00:08:06.780"
            ],
            [
                "pilot" => "joseph joestar",
                "total_time" => "10:03:54",
                "best_lap" => "00:07:02.180"
            ],
        ];

        $col = new Classification($data);

        $results = $col->getResults();

        $this->assertEquals("hony", $results[0]->getPilot());
        $this->assertNotEquals("26", $results[0]->getPoints());
        $this->assertEquals("25", $results[0]->getPoints());
        $this->assertEquals("joseph joestar", $results[3]->getPilot());
        $this->assertNotEquals("12", $results[3]->getPoints());
        $this->assertEquals("13", $results[3]->getPoints());
        
    }
}