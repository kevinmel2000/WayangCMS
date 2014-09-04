<?php

class CommentController extends WY_TController
{
	public $layout = 'admin/index';
	
    public function all()
    {
        $comment = WY_Db::all('SELECT wyc.*,wyps.title as ps_title,wypg.title as pg_title FROM wy_comment wyc LEFT JOIN wy_page wypg ON wypg.page_id=wyc.page_id LEFT JOIN wy_post wyps ON wyps.post_id=wyc.post_id Order By wyc.c_id ASC');
        $this->layout->pageTitle = 'Wayang CMS - Comments';
        $this->layout->content = WY_View::fetch('admin/comments/all',array('comment'=>$comment));
    }
    
    public function add($id)
    {
        
    }
    
    public function view($id)
    {
        
    }
    
    public function edit($id)
    {
        $comment = WY_Db::row('SELECT * FROM wy_comment WHERE c_id = :id', array(':id'=> (int) $id));
        if(!$comment){
            $view = new WY_View('404');
            $view->render();
            exit();
        }
        if(WY_Request::isPost()){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $url = $_POST['url'];
            $content = $_POST['content'];
            WY_Db::execute('UPDATE `wy_comment` SET `name`=:name,`email`=:email,`url`=:url,`content`=:content WHERE `c_id` = :id', array(
                    ':name'=>$name,
                    ':email'=>$email,
                    ':url'=>$url,
                    ':content'=>$content,
                    ':id'=> (int) $id,
                ));
            WY_Response::redirect('admin/comments/all');
        }
        $this->layout->pageTitle = 'Wayang CMS - Edit Comment';
        $this->layout->content = WY_View::fetch('admin/comments/edit', array('comment'=>$comment));
    }
    
    public function delete($id)
    {
        
    }
}
