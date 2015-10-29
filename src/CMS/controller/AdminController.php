<?php

namespace CMS\Controller;


use CMS\AdminAuthentication;
use Portfolio\Model\AddImage;


class AdminController extends AdminAuthentication
{
    public function imageAction()
    {
        $request = $this->getRequest();
        $image = $request->files('image');

        $addImage = new AddImage();
        $addImage->uploadImage($image);

    }
} 