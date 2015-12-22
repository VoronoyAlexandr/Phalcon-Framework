<?php

class IndexController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $posts = Posts::find();

        $this->view->setVar('posts', $posts);
    }

}

