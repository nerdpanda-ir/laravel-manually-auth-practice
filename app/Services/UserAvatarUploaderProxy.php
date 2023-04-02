<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class UserAvatarUploaderProxy
{
    protected UserAvatarUploader $uploader;
    public function __construct(UserAvatarUploader $uploader)
    {
        $this->uploader = $uploader;
    }
    public function upload(?UploadedFile $avatar):null|string {
        if (is_null($avatar))
            return null;
        return $this->uploader->upload($avatar);
    }
}
