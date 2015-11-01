<?php

namespace CMS\Controller;


use CMS\AdminAuthenticationController;

use Framework\Response\ResponseRedirect;
use Portfolio\Model\AddImage;
use Portfolio\Model\Gallery;


class AdminController extends AdminAuthenticationController
{
    public function imageAction()
    {
        $request = $this->getRequest();
        $image = $request->files('image');
        $imageAlt = $request->post('alt');

        $addImage = new AddImage();
        $addImage->uploadImage($image, $imageAlt);

        return new ResponseRedirect($this->generateRoute('admin'));
    }

    public function indexAction()
    {
        $images = (new Gallery())->getImages();

        return $this->render('index',
            [
                'layout' => false,
                'title' => 'Админка',
                'images' => $images,
            ]);
    }

    public function deleteAction($id)
    {
        $result = (new Gallery())->deleteImage($id);

        if(!$result)
            return $this->redirect($this->generateRoute('admin'), 'Image not deleted, something was wrong', 'error');

        return $this->redirect($this->generateRoute('admin'), 'Image successfully deleted', 'success');
    }



} 