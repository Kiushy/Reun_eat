<?php
/**
 * Class img
 *
 * Permet de faire des traitements basique sur les images.
 *
 * Auteur  : Christophe THIBAULT
 * Date    : 14/1/2021
 * Version : 1.1
 */
class img{
	private $image = '';
	private $type = '';
	private $temp = '';

	// constructeur
	public function __construct($sourceFile){
		// Verification de l'existance du fichier
		if(file_exists($sourceFile)){
			// Je suis sur que le fichier existe
            $size = getimagesize($sourceFile);
            switch($size["mime"]){
                case "image/jpeg":
                    $this->type = 'JPEG';
                    $this->image = imagecreatefromjpeg($sourceFile); //jpeg file
                    break;
                case "image/gif":
                    $this->type = 'GIF';
                    $this->image = imagecreatefromgif($sourceFile); //gif file
                    break;
                case "image/png":
                    $this->type = 'PNG';
                    $this->image = imagecreatefrompng($sourceFile); //png file
                    imagealphablending($this->image, false);
                    break;
            }
		} else {
			$this->errorHandler("Source introuvable");
		}

		return;
	}

	/* ----------------- METHODES PUBLICS ----------------- */
	/**
	 * @param $dest_file
	 * enregistrer physiquement le fichier sur le serveur
	 */
	public function store($dest_file){
		if($this->type == 'JPEG'){
			ImageJPEG($this->image,$dest_file,95);
		}
		if($this->type == 'PNG'){
            imagesavealpha($this->image, true);
			ImagePNG($this->image,$dest_file,0);
		}
		if($this->type == 'GIF'){
			ImageGIF($this->image,$dest_file);
		}
	}

	/**
	 * @return int largeur de l'image
	 */
	public function getSizeX(){
		return imagesx($this->image);
	}

	/**
	 * @return int hauteur de l'image
	 */
	public function getSizeY(){
		return imagesy($this->image);
	}

	/**
	 * Redimensionne une image par facteur (64 par defaut)
	 */
	public function resizeByFactor($factor = 64){
		$o_wd = imagesx($this->image);
		$o_ht = imagesy($this->image);
		$new_wd = round($o_wd / $factor);
		$new_ht = round($o_ht / $factor);

		$this->temp = imageCreateTrueColor($new_wd, $new_ht);
		imageCopyResampled($this->temp, $this->image, 0, 0, 0, 0, $new_wd, $new_ht, $o_wd, $o_ht);
		$this->sync();
	}

	/**
	 * @param int $length
	 * Redimensionne l'image sur le coté le plus grand
	 */
	public function resizeByMax($length = 65){
		$o_wd = $this->getSizeX();
		$o_ht = $this->getSizeY();
		if($o_wd > $o_ht){
			// Image horizontale
			$new_wd = $length;
			$new_ht = ($new_wd * $o_ht) / $o_wd;
		}else{
			// Image verticale
			$new_ht = $length;
			$new_wd = ($new_ht * $o_wd) / $o_ht;
		}
		$this->temp = imageCreateTrueColor($new_wd,$new_ht);
        if($this->type == 'PNG') {
            imagealphablending($this->temp, false);
            imagesavealpha($this->temp, true);
            $transparent = imagecolorallocatealpha($this->temp, 255, 255, 255, 127);
            imagefilledrectangle($this->temp, 0, 0, $new_wd, $new_ht, $transparent);
        }
		imageCopyResampled($this->temp, $this->image, 0, 0, 0, 0, $new_wd, $new_ht, $o_wd, $o_ht);
		$this->sync();
	}

	/**
	 * @param int $length
	 * Redimensionne l'image sur le coté le plus petit
	 */
	public function resizeByMin($length = 65){
		$o_wd = $this->getSizeX();
		$o_ht = $this->getSizeY();
		if($o_wd > $o_ht){
			// Image horizontale
			$new_ht = $length;
			$new_wd = ($new_ht * $o_wd) / $o_ht;
		}else{
			// Image verticale
			$new_wd = $length;
			$new_ht = ($new_wd * $o_ht) / $o_wd;
		}
		$this->temp = imageCreateTrueColor($new_wd,$new_ht);
        if($this->type == 'PNG') {
            imagealphablending($this->temp, false);
            imagesavealpha($this->temp, true);
            $transparent = imagecolorallocatealpha($this->temp, 255, 255, 255, 127);
            imagefilledrectangle($this->temp, 0, 0, $new_wd, $new_ht, $transparent);
        }
		imageCopyResampled($this->temp, $this->image, 0, 0, 0, 0, $new_wd, $new_ht, $o_wd, $o_ht);
		$this->sync();
	}

	/**
	 * Decoupage de l'image en carrée (horizontalement ou verticalement)
	 */
	public function cropSquare(){
		$o_wd = imagesx($this->image);
		$o_ht = imagesy($this->image);
		if($o_wd>$o_ht){
			$offset = round(($o_wd - $o_ht) / 2);
			$this->temp = imageCreateTrueColor($o_ht,$o_ht);
            if($this->type == 'PNG') {
                imagealphablending($this->temp, false);
                imagesavealpha($this->temp, true);
                $transparent = imagecolorallocatealpha($this->temp, 255, 255, 255, 127);
                imagefilledrectangle($this->temp, 0, 0, $o_ht, $o_ht, $transparent);
            }
			imageCopyResampled($this->temp, $this->image, 0, 0, $offset, 0, $o_ht, $o_ht, $o_ht, $o_ht);
		}else{
			$offset = round(($o_ht - $o_wd) / 2);
			$this->temp = imageCreateTrueColor($o_wd,$o_wd);
            if($this->type == 'PNG') {
                imagealphablending($this->temp, false);
                imagesavealpha($this->temp, true);
                $transparent = imagecolorallocatealpha($this->temp, 255, 255, 255, 127);
                imagefilledrectangle($this->temp, 0, 0, $o_wd, $o_wd, $transparent);
            }
			imageCopyResampled($this->temp, $this->image, 0, 0, 0, $offset, $o_wd, $o_wd, $o_wd, $o_wd);
		}
		$this->sync();
	}

	/**
	 * @param $pngImage : image transparente PNG qui contient le Watermark
	 * @param int $left : décalage en x du watermark (0 par defaut)
	 * @param int $top  : décalage en y du watermark (0 par defaut)
	 */
	public function watermark($pngImage, $left = 0, $top = 0){
		ImageAlphaBlending($this->image, true);
		$layer = ImageCreateFromPNG($pngImage);
		$logoW = ImageSX($layer);
		$logoH = ImageSY($layer);
		ImageCopy($this->image, $layer, $left, $top, 0, 0, $logoW, $logoH);
	}

    /**
    */
    public function average() {
        $w = imagesx($this->image);
        $h = imagesy($this->image);
        $r = $g = $b = 0;
        for($y = 0; $y < $h; $y++) {
            for($x = 0; $x < $w; $x++) {
                $rgb = imagecolorat($this->image, $x, $y);
                $r += $rgb >> 16;
                $g += $rgb >> 8 & 255;
                $b += $rgb & 255;
            }
        }
        $pxls = $w * $h;
        $r = dechex(round($r / $pxls));
        $g = dechex(round($g / $pxls));
        $b = dechex(round($b / $pxls));
        if(strlen($r) < 2) {
            $r = 0 . $r;
        }
        if(strlen($g) < 2) {
            $g = 0 . $g;
        }
        if(strlen($b) < 2) {
            $b = 0 . $b;
        }
        return $r . $g . $b;
    }

	/**
	 * @param string $mess
	 * Affichage des message d'erreurs
	 */
	public function errorHandler($mess=''){
		echo "error Handler - ".$mess;
		exit();
	}

	/* ----------------- METHODES PRIVEES ----------------- */
	/**
	 * Synchronisation entre l'espace temp et l'espace image de la classe
	 */
	private function sync(){
		// Permet de gerer l'espace temp pour l'image lors de la creation / modification de l'image
		$this->image =& $this->temp;
		unset($this->temp);
		$this->temp = '';
		return;
	}

    private function getPNGResized($image, int $newWidth, int $newHeight) {
        $newImg = imagecreatetruecolor($newWidth, $newHeight);
        imagealphablending($newImg, false);
        imagesavealpha($newImg, true);
        $transparent = imagecolorallocatealpha($newImg, 255, 255, 255, 127);
        imagefilledrectangle($newImg, 0, 0, $newWidth, $newHeight, $transparent);
        $src_w = imagesx($image);
        $src_h = imagesy($image);
        imagecopyresampled($newImg, $image, 0, 0, 0, 0, $newWidth, $newHeight, $src_w, $src_h);
        return $newImg;
    }
}
?>