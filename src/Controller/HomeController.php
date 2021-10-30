<?php 

namespace App\Controller;

class HomeController extends AppController
{
    function index() {
        $table = $this->getTableLocator()->get("list");
        $list = $table->find()->
        select(["id"=>"list.id",
                "target_id"=>"list.target_id",
                "goal"=>"target.goal",
                "period_start"=>"target.period_start",
                "period_end"=>"target.period_end",
                "period1"=>"list.period1",
                "period2"=>"list.period2",
                "list"=>"list.list"
        ])->from("target left join list on target.id=list.target_id")->
        where("list.comp=0")->order("list.target_id asc,list.period1 asc")->all();
        $this->set("list",$list);
    }
    function create() {
        $p=$this->request->getData();
        $table=$this->getTableLocator()->get("list");
        for($i=0; $i<count($p["check"]); $i++) {
            $id=$p["check"][$i];
            $rec=$table->get($id);
            $rec->comp=1;
            $table->save($rec);
        }
        $this->redirect(["controller"=>"home"]);
    }
}