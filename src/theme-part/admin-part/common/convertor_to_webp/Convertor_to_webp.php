<?php

class Convertor_to_webp {
    private $dir_output;

    public function __construct(string $img_folder_name) {
        $this->dir_output =  dirname(__DIR__, 4) . "/asset/img/${img_folder_name}/";
    }
     
    public function convert_from_jpg(string $file_name_jpg, string $file_name_webp): void {
        $img = imagecreatefromjpeg($this->dir_output . $file_name_jpg);
        imagewebp($img, $this->dir_output . $file_name_webp, 100);
        imagedestroy($img);
    }
    public function convert_from_png(string $file_name_png, string $file_name_webp): void {
        $img = imagecreatefrompng($this->dir_output . $file_name_png);
        imagepalettetotruecolor($img);
        imagealphablending($img, true);
        imagesavealpha($img, true);
        imagewebp($img, $this->dir_output . $file_name_webp, 100);
        imagedestroy($img);
    }
}
