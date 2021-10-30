<?php 

namespace App\Controller;

class LookbackController extends AppController
{
    function index() {
        
    }
    function create() {
        $p=$this->request->getData();
        $table=$this->getTableLocator()->get("lookback");
        $rec=$table->newEntity();
        $rec->lb_date=$p["date"];
        $rec->lb_date2=$p["date2"];
        $rec->challenge=$p["challenge"];
        $rec->study=$p["study"];
        $rec->ref=$p["ref"];
        $rec->imp=$p["imp"];
        $rec->userid=$this->request->getCookie("userid");
        $table->save($rec);
        $this->redirect(["controller"=>"lookback"]);
    }
}