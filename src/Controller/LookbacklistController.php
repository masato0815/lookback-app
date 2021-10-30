<?php 

namespace App\Controller;

class LookbacklistController extends AppController
{
    function index() {
        $table = $this->getTableLocator()->get("lookback");
        $lookbacklist = $table->find()->all();
        $this->set("lookback",$lookbacklist);
    }
    function edit(){
        $p = $this->request->query("id");
        $table = $this->getTableLocator()->get("lookback");
        $lookbacklist = $table->get($p);
        $this->set("flag","edit");
        $this->set("lookback",$lookbacklist);
    }
    function update(){
        $p = $this->request->getData();
        $table = $this->getTableLocator()->get("lookback");
        $lookbacklist = $table->get($p["id"]);
        $lookbacklist->lb_date=$p["date"];
        $lookbacklist->lb_date2=$p["date2"];
        $lookbacklist->challenge=$p["challenge"];
        $lookbacklist->study=$p["study"];
        $lookbacklist->ref=$p["ref"];
        $lookbacklist->imp=$p["imp"];
        $lookbacklist->userid=$this->request->getCookie("userid");
        $table->save($lookbacklist);
        $this->redirect(["action"=>"index"]);
    }
    
    function delete() {
        $table = $this->getTableLocator()->get("lookback");
        $p = $this->request->query("id");
        $lookback = $table->get($p);
        $table->delete($lookback);
        return $this->redirect(["action"=>"index"]);
    }
}