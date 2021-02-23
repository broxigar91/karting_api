<?

namespace App\Classes;


class TaskManager
{
    public function solution($a)
    {
            
        //we get total hours from task battery
        $total = array_sum($a);
        //we get unique values from the tasks battery
        $values = array_unique($a);
        //we order it desc
        rsort($values);
        
        $thrownValues = $this->getThrownTasksValue($total,$values);
        
        if(!$thrownValues) return false;
            
        foreach($thrownValues as $t){
            //check if some of the combinations obtained is valid
            if($this->getValidCombination($t,$a,$total)) return true;
        }

        return false;

    }

    function getThrownTasksValue($total, $values)
    {

        $thrownValues = [];
        if(count($values) > 1)
        {
            //have to compare all combinations of unique values that makes the remaining values sum a quantity divisible by 3 in order to continue distributing tasks
            for($i = 0; $i < count($values); $i++)
            {
                for($j = $i; $j < count($values); $j++)
                {
                    if(($total - ($values[$i]+$values[$j])) % 3 == 0)
                    {
                        ///store all valid combinations
                        $thrownValues[] = $values[$i]+$values[$j];
                    }
                }  
            }
        } 
        else 
        {
            if(($total - $values[0]*2) % 3 == 0)
            {
                
                $thrownValues[] = $values[0]*2;
            }
        }

        //if no combinations found, return null
        if(count($thrownValues) > 0 ) return $thrownValues;
        else return null;
    }

    function getValidCombination($thrownValue,$tasks,$total)
    {
        
        $taskValuePerWorker = (int)(($total - $thrownValue) / 3);
        
        $c = 0;

        for($i = 0; $i < count($tasks); $i++)
        {
            $c+= $tasks[$i];
            
            if($c == $taskValuePerWorker)
            {
                $i++;//Skip next element, because it is one of the thrown tasks
                $c=0;//reset aux variable 
                $res = true; //for now, this array of tasks is valid
            } else{
                $res = false;
            }
        }
        
        return $res;

    }
}
?>