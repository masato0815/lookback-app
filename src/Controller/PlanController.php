<?php 

namespace App\Controller;

class PlanController extends AppController
{
    function index() {
        
    }
    function create(){
        $p=$this->request->getData();
        $table=$this->getTableLocator()->get("target");
        $tablelist=$this->getTableLocator()->get("list");
        $j=0;
        $k=1;
        for($i=0; $i<count($p["mokuhyou"]); $i++){
            $rec=$table->newEntity();
            $rec->goal=$p["mokuhyou"][$i];
            $rec->period_start=$p["time"][$i];
            $rec->period_end=$p["time2"][$i];
            $rec->userid=$this->request->getCookie("userid");
            $table->save($rec);
        
        for($j=0; $j<count($p["list"]); $j++){
            if($p["num"][$j]!=strval($k)){
                continue;
            }
            $rec2=$tablelist->newEntity();
            $rec2->target_id=$rec->id;
            $rec2->period1=$p["liststart"][$j];
            $rec2->period2=$p["listtime"][$j];
            $rec2->list=$p["list"][$j];
            $tablelist->save($rec2);
        }
        $k++;
        }
        $this->redirect(["controller"=>"top"]);
    }
}