<?php

namespace App\Service;

use Exception;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PictureService
{
    private $params;

    public function __construct(ParameterBagInterface $params)
    {
        $this->params = $params;
    }

    public function add(UploadedFile $picture, ?string $folder = '', ?int $width = 250, ?int $height = 250)
    {
        // on donne un nouveau nom à l'image
        $fichier = md5(uniqid(rand(), true)) . '.webp';

        // on recupere les infos de l'image
        $picture_infos = getimagesize($picture);

        if($picture_infos === false) {
            throw new Exception('Format d\'image incorrect');
        }

        // on verifie le format de l'image
        switch($picture_infos['mime']){
            case 'image/png':
                $picture_source = imagecreatefrompng($picture);
                break;
                
        }
    }
}