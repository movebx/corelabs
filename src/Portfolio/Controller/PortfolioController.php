<?php


namespace Portfolio\Controller;


use Framework\Controller\Controller;

class PortfolioController extends Controller
{
    public function indexAction()
    {
        return $this->render('index');
    }
} 