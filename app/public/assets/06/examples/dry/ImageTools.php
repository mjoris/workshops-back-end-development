<?php

class ImageTools
{
    public static function hasValidImageExtension(string $fileName): bool
    {
        return in_array((new \SplFileInfo($fileName))->getExtension(), ['jpg', 'jpeg', 'png', 'gif']);
    }
}