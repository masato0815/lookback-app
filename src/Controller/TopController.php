<?php 

namespace App\Controller;

class TopController extends AppController
{
    function index() {
      $this->set("nomenu",1) ;
      if(!empty($this->request->getCookie("userid")))
          $this->redirect(["controller"=>"home"]);
    }
    function create(){
        $p=$this->request->getData();
        $table=$this->getTableLocator()->get("user");
        $rec=$table->newEntity();
        $rec->name=$p["user"];
        $rec->pass=$p["pass"];
        $table->save($rec);
        
        $this->response = $this->response->withCookie('userid', [
            'value' => $rec->id,
            'path' => '/',
            'httpOnly' => true,
            'secure' => false,
            'expire' => strtotime('+1 month')
        ]);
        
        $this->response = $this->response->withCookie('username', [
            'value' => $rec->name,
            'path' => '/',
            'httpOnly' => true,
            'secure' => false,
            'expire' => strtotime('+1 month')
        ]);
        $this->redirect(["controller"=>"home"]);
    }
    function login(){
        $p=$this->request->getData();
        $table=$this->getTableLocator()->get("user");
        $rec=$table->find()->where("name='".$p["luser"]."' and pass='".$p["lpass"]."'")->first();
        if(empty($rec)){
            $this->redirect(["controller"=>"top"]);
            return;
        }
        
        
        $this->response = $this->response->withCookie('userid', [
            'value' => $rec->id,
            'path' => '/',
            'httpOnly' => true,
            'secure' => false,
            'expire' => strtotime('+1 month')
        ]);
        
        $this->response = $this->response->withCookie('username', [
            'value' => $rec->name,
            'path' => '/',
            'httpOnly' => true,
            'secure' => false,
            'expire' => strtotime('+1 month')
        ]);
        $this->redirect(["controller"=>"home"]);
    }
    function logout(){
        $this->response=$this->response->withExpiredCookie("userid");
        $this->redirect(["controller"=>"top"]);
    }
}