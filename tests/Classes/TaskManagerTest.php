<?

namespace test\Classes;

use App\Classes\TaskManager;

use PHPUnit\Framework\TestCase;

class TaskManagerTest extends TestCase
{
    public function testManager()
    {
        $tm = new TaskManager();

        $tasks = [1,3,4,2,2,2,1,1,2];
        $this->assertEquals(true, $tm->solution($tasks));
        
        $tasks = [1,1,1,1,1,1];
        $this->assertEquals(false, $tm->solution($tasks));
        
        $tasks = [1,1,1,1,1,1,1,1];
        $this->assertEquals(true, $tm->solution($tasks));

        $tasks = [1,2,1,2,1,2,1,2,1,2];
        $this->assertEquals(false, $tm->solution($tasks));

        $tasks = [1,2,1,2,1,2,1,2,1,2,1,2,1,2,1,2,1,2,1,2];
        $this->assertEquals(true, $tm->solution($tasks));
        
    }
}