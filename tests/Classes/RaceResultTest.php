<?

namespace test\Classes;


use App\Classes\RaceResult;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use PHPUnit\Framework\TestCase;

class RaceResultTest extends TestCase
{
    public function testRaceResultNull()
    {
        try {
            $rr = new RaceResult();
        } catch (\Throwable $th) {
            
        } finally{
            $rr = null;
        }
        
        $this->assertEquals(null, $rr);
        
    }
    public function testRaceResult()
    {

        $data = [
            'pilot' => 'j355353',
            'total_time'  => 53,
            'best_lap' => '00:02:02.456'
        ];
        
        $rr = new RaceResult($data,1);
        
        $this->assertEquals(false, is_string($rr->getTotalTime()));
        $this->assertEquals(true, is_string($rr->getPilot()));
        $this->assertEquals(0, $rr->getPoints());
        

        $data = [
            'pilot' => 'maokai',
            'total_time'  => '01:00:53.87',
            'best_lap' => '00:02:02.456'
        ];
        
        $rr = new RaceResult($data,1);

        $rr->setPoints(5);

        $this->assertEquals(true, is_string($rr->getTotalTime()));
        $this->assertEquals(true, is_string($rr->getPilot()));
        $this->assertNotEquals(0, $rr->getPoints());
        $this->assertEquals(5, $rr->getPoints());
        $this->assertEquals(1, $rr->getPosition());
        
    }
}