<?

namespace test\Entity;

use App\Entity\Pilot;
use App\Entity\Race;
use App\Entity\PilotRaceLap;
use PHPUnit\Framework\TestCase;

class PilotRaceLapTest extends TestCase
{
    public function testAdd()
    {
        $p = new Pilot();
        $p->setId('p1');
        
        $r = new Race();
        $r->setId(1);
        $r->setName('Race 0');

        $lap = new PilotRaceLap();
        $lap->setPilot($p);
        $lap->setRace($r);
        $lap->setTime("00:03:11.345");

        $this->assertEquals("p1", $lap->getPilot()->getId());
        $this->assertEquals(1, $lap->getRace()->getId());
        $this->assertEquals("00:03:11.345", $lap->getTime());
    }
}