<?php


namespace Portfolio\Controller;


use Framework\Controller\Controller;
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
} 