<?php


namespace Portfolio\Controller;


use Framework\Controller\Controller;
use Framework\Response\JSONResponse;
use Portfolio\Model\Gallery;

class PortfolioController extends Controller
{
    public function indexAction()
    {
        $images = (new Gallery())->getImages();

        return $this->render('index',
        [
            'images' => $images,

        ]);
    }

    public function contactAction() {

        return $this->render('contact');
    }
    /*
    public function ajaxAction()
    {
        $images = $images = (new Gallery())->getImages();


        return new JSONResponse($images);
    }
    */
} 