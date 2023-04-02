<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class UserAvatarUploader
{
    protected UniqueDirectoryMaker $directoryMaker;
    public function __construct(UniqueDirectoryMaker $directoryMaker)
    {
        $this->directoryMaker = $directoryMaker;
    }

    public function upload(UploadedFile $avatar):string {
        $destination = "img/users-avatars/";
        $absoluteDestination = public_path($destination);
        $directory = $this->directoryMaker->make($absoluteDestination);
        $finalDestination = $destination.$directory;
        $avatarName = $avatar->getClientOriginalName();
        $uploaded = $avatar->move($finalDestination,$avatarName);
        return $uploaded->getPathname();
    }
}
