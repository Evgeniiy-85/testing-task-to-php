<?php

class Images {

	public $max_w = 0;
	public $max_h = 0;
	public $max_wh = 0;
	public $max_size = 0;
	
	public $quality = 100;
	public $path = "";
	public $prefix = false;
	public $custom_name = false;
	public $allowed_filetypes = array();
	
	private $_full_path;
	private $_image;
	private $_rsrc;
	private $_name;
	private $_error;
	
	
	public function get_info($img_path = false) {
	
		if ($this->_image) {
			return $this->_image;
		}
	
		if (!$img_path) {
			if (!$img_path = $this->_full_path) {
				$this->_error = "Image path is empty";
				return false;
			}
		}
		
		if (!$getimagesize = @getimagesize($img_path)) {
			$this->_error = "File not found";
			return false;
		}
		
		$image_info['width'] = $getimagesize[0];
		$image_info['height'] = $getimagesize[1];
		$image_info['mime'] = $getimagesize['mime'];
		$image_info['size'] = filesize($img_path);
		
		switch ($getimagesize['mime']) {
		
			case "image/png":
				$image_info['type'] = "png";
			break;
			
			case "image/jpeg":
				$image_info['type'] = "jpg";
			break;
			
			case "image/pjpeg":
				$image_info['type'] = "jpg";
			break;
			
			case "image/gif":
				$image_info['type'] = "gif";
			break;
			
			default:
				$this->_error = "Wrong file type";
				return false;
			break;
			
		}
		
		if (count($this->allowed_filetypes) > 0) {
			if (!in_array($image_info['type'], $this->allowed_filetypes)) {
				$this->_error = "Wrong file type";
				return false;
			}
		}
		
		return $this->_image = $image_info;
		
	}

	public function load($img_path) {
		
		if (!empty($img_path)) {
			$this->_full_path = $img_path;
		}

		if (!$this->get_info()) {
			return false;
		}
		
		if ($this->max_size != 0 && $this->max_size < $this->_image['size']) {
			$this->_error = "Wrong file size";
			return false;
		}
		
		if (!$this->custom_name) {
			$name = $this->prefix . substr(md5(time()), 0, 10) . substr(md5(rand(11111, 99999)), 0, 10) . "." . $this->_image['type'];
		} else {
			$name = $this->custom_name . "." . $this->_image['type'];
		}
		
		if (is_numeric($this->max_wh) && $this->max_wh > 0 && ($this->max_wh < $this->_image['width'] || $this->max_wh < $this->_image['height'])) {
			$this->resize($this->max_wh, $this->max_wh);
			$this->output($this->_full_path);
		} else if (is_numeric($this->max_w) && is_numeric($this->max_h) && $this->max_w > 0 && $this->max_h > 0 && ($this->max_h < $this->_image['height'] || $this->max_w < $this->_image['width'])) {
			$this->resize($this->max_w, $this->max_h);
			$this->output($this->_full_path);
		}
		
		if (copy($this->_full_path, $this->path . $name)) {
		
			$this->_full_path = $this->path . $name;
			$this->_name = $name;
			
			@chmod($this->_full_path, 0666);
			
			return $this->_name;
			
		} else {
		
			$this->_error = "Image copy error";
			return false;
			
		}
		
	}
	
	public function resize($w, $h) {
	
		if (!$this->get_info()) {
			return false;
		}
		
		if (!is_numeric($w) || $w < 0) {
			$w = 0;
		}
		if (!is_numeric($h) || $h < 0) {
			$h = 0;
		}
		if ($w == 0 && $h == 0) {
			return false;
		}
		
		$ratio = false;
		
		if ($w > 0 && $h > 0) {
			if ($this->_image['width'] >= $this->_image['height']) {
				$ratio = $this->_image['width'] / $w;
			}			
			if ($this->_image['width'] < $this->_image['height']) {
				$ratio = $this->_image['height'] / $h;
			}
		} else if ($w > 0) {
			$ratio = $this->_image['width'] / $w;
		} else if ($h > 0) {
			$ratio = $this->_image['height'] / $h;
		}
		
		if (!$ratio) {
			return false;
		}
		
		$wdest = round($this->_image['width'] / $ratio);
		$hdest = round($this->_image['height'] / $ratio);
		
		if (!$this->_rsrc) {
			$this->_rsrc = $this->_create($this->_full_path);
		}
		
		$dest = imagecreatetruecolor($wdest, $hdest);
		
		if ($this->_image['type'] == "png") {
			imagealphablending($this->_rsrc, false);
			imagesavealpha($this->_rsrc, true);
			imagealphablending($dest, false);
			imagesavealpha($dest, true);
		}
		
		if ($this->_image['type'] == "gif") {
			$transparent_source_index = imagecolortransparent($this->_rsrc);
			
			if ($transparent_source_index !== -1) {
				
				$transparent_color = imagecolorsforindex($this->_rsrc, $transparent_source_index);
				
				$transparent_destination_index = imagecolorallocate($dest, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);
				imagecolortransparent($dest, $transparent_destination_index);

				imagefill($dest, 0, 0, $transparent_destination_index);
			}
		}
		
		imagecopyresampled($dest, $this->_rsrc, 0, 0, 0, 0, $wdest, $hdest, $this->_image['width'], $this->_image['height']);
		
		$this->_image['width'] = $wdest;
		$this->_image['height'] = $hdest;

		return $this->_rsrc = $dest;

	}
	
	public function crop($w, $h, $left = false, $top = false) {
	
		if (!$this->get_info()) {
			return false;
		}
		
		if (!$this->_rsrc) {
			$this->_rsrc = $this->_create($this->_full_path);
		}
		
		$dest = imagecreatetruecolor($w, $h);
		
		if ($left === false || $top === false) {
			$wx = $this->_image['width'] - $w;
			$hx = $this->_image['height'] - $h;
			
			$left = floor($wx / 2);
			$top = floor($hx / 2);
		}
		
		if ($this->_image['type'] == "png") {
			imagealphablending($this->_rsrc, false);
			imagesavealpha($this->_rsrc, true);
			imagealphablending($dest, false);
			imagesavealpha($dest, true);
		}
		
		if ($this->_image['type'] == "gif") {
			$transparent_source_index = imagecolortransparent($this->_rsrc);
			
			if ($transparent_source_index !== -1) {
				
				$transparent_color = imagecolorsforindex($this->_rsrc, $transparent_source_index);
				
				$transparent_destination_index = imagecolorallocate($dest, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);
				imagecolortransparent($dest, $transparent_destination_index);

				imagefill($dest, 0, 0, $transparent_destination_index);
			}
		}

		imagecopyresampled($dest, $this->_rsrc, 0, 0, $left, $top, $w, $h, $w, $h);
		
		return $this->_rsrc = $dest;
	
	}
	
	public function square($side) {
	
		if (!$this->get_info()) {
			return false;
		}
		
		if (!is_numeric($side) || $side <= 0) {
			return false;
		}
		
		if ($this->_image['width'] >= $this->_image['height']) {
			$this->resize(0, $side);
		} else {
			$this->resize($side, 0);
		}
		
		return $this->crop($side, $side);
	
	}
	
	public function rotate($angle, $bg = 0) {
	
		if (!$this->get_info()) {
			return false;
		}
		
		if (!$this->_rsrc) {
			$this->_rsrc = $this->_create($this->_full_path);
		}
		
		$this->_rsrc = imagerotate($this->_rsrc, $angle, $bg);
		
		return $this->_rsrc;
	
	}
	
	public function watermark($stamp_path) {
		
		if (!$this->get_info()) {
			return false;
		}
		
		if (!$this->_rsrc) {
			$this->_rsrc = $this->_create($this->_full_path);
		}
		
		$stamp = imagecreatefrompng($stamp_path);
		
		if (!$stamp) {
			return false;
		}

		// Установка полей для штампа и получение высоты/ширины штампа
		$marge_right = 8;
		$marge_bottom = 8;
		$sx = imagesx($stamp);
		$sy = imagesy($stamp);
		
		imagealphablending($this->_rsrc, true);
		
		// Копирование изображения штампа на фотографию с помощью смещения края
		// и ширины фотографии для расчета позиционирования штампа. 
		imagecopy($this->_rsrc, $stamp, imagesx($this->_rsrc) - $sx - $marge_right, imagesy($this->_rsrc) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));
		
		imagealphablending($this->_rsrc, false);
		
		return true;
		
	}
	
	private function _create($img_path) {
	
		if (!$img_path) {
			return false;
		}
	
		if ($this->_image['type'] == "jpg") {
			return imagecreatefromjpeg($img_path);
		} else if ($this->_image['type'] == "png") {
			return imagecreatefrompng($img_path);
		} else if ($this->_image['type'] == "gif") {
			return imagecreatefromgif($img_path);
		} else {
			return false;
		}
	
	}
	
	public function output($path = false) {
	
		if (!$this->_rsrc) {
			return false;
		}
	
		if (!$path) {
			header("Content-type: " . $this->_image['mime']);
		
			switch ($this->_image['type']) {		
				case "jpg":
					imagejpeg($this->_rsrc);
				break;
				case "png":
					imagepng($this->_rsrc);
				break;
				case "gif":
					imagegif($this->_rsrc);
				break;
			}
			
			return true;
		}
		
		switch ($this->_image['type']) {
			case "jpg":
				imagejpeg($this->_rsrc, $path, $this->quality);
			break;
			case "png":
				imagepng($this->_rsrc, $path);
			break;
			case "gif":
				imagegif($this->_rsrc, $path);
			break;
		}
		
		imagedestroy($this->_rsrc);
		
		return true;
	
	}
	
	public function set_full_path($path) {
	
		$this->_full_path = $path;
		
		$this->get_info();
	
	}
	
	public function get_error() {
	
		if (!$this->_error) {
			return "No errors";
		} else {
			return $this->_error;
		}
	
	}

}