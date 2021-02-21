<?

namespace test\Repository;

use App\Repository\PilotRepository;
use App\Entity\Pilot;


use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class PilotTest extends KernelTestCase
{
    /**
     *@var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    protected function setUp(): void
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function testPilotLaps()
    {
        $pilot = $this->entityManager
        ->getRepository(Pilot::class)
        ->findOneBy(['id' => '5fd7dbd8ce3a40582fb9ee6b']);

        $laps = $pilot->getRaceLaps();

        
        $this->assertSame(23, $pilot->getAge());
        $this->assertSame(100, count($laps));
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // doing this is recommended to avoid memory leaks
        $this->entityManager->close();
        $this->entityManager = null;
    }
}