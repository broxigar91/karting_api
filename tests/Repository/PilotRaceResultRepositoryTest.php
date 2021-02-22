<?

namespace test\Repository;

use App\Repository\PilotRaceResultsRepository;
use App\Entity\PilotRaceResults;



use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class PilotRaceResultRepositoryTest extends KernelTestCase
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

    public function testPilotResultQuery()
    {
        
        $pilotResults = $this->entityManager
        ->getRepository(PilotRaceResults::class)
        ->getPilotResults('5fd7dbd8ce3a40582fb9ee6b');

                
        $this->assertSame(0, $pilotResults[0]['points']);
        
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // doing this is recommended to avoid memory leaks
        $this->entityManager->close();
        $this->entityManager = null;
    }
}