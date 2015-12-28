<?php
/**
 * A component for storage of images.
 */
class ImageRendererComponent extends Object
{
	/**
	 * The CakePHP application webroot (initialized in startup).
	 * 
	 * @access private
	 * @var string
	 */
	var $webroot;
	
	/**
	 * Override for startup config.
	 *
	 * @param &$controller.
	 */
	function startup(&$controller)
	{
		$this->webroot = $_SERVER['DOCUMENT_ROOT'] . '/app/webroot';
	}
	
	/**
	 * Convert a filesystem path to a CakePHP URL.
	 *
	 * @param string $path the path of the file.
	 * @return string the URL.
	 */
	function pathToUrl($path)
	{
		return substr($path, strlen($this->webroot));
	}
	
	/**
	 * Genereate a filename from the provided file path.
	 *
	 * @param string $path the path to the file we're generating a name for.
	 * @param string $ext optional extension to use (should include the dot (.).
	 * @return string a unique filename.
	 */
	function generateFilename($path, $ext='.jpg')
	{
		return md5_file($path) . $ext;
	}
	
	function move($oldPath, $newPath)
	{
		if (file_exists($newPath)) {
			unlink($newPath);
			return rename($oldPath, $newPath);
		}
		return rename($oldPath, $newPath);
	}
	
	/**
	 * Create a new image file with a unique URL.
	 *
	 * @param string $path the source image file path.
	 * @param integer $newWidth the new width to use.
	 * @param integer $newHeight the new height to use.
	 * @return string the URL of the rendered image.
	 */
	function render($path, $newWidth=null, $newHeight=null)
	{
		if ($newHeight != null && $newWidth != null) {
			return $this->resize($path, $newWidth, $newHeight);
		}
		
		$dstFilename = $this->generateFilename($path);
		$dstPath = $this->webroot . '/files/images/' . $dstFilename;
		return $this->move($path, $dstPath) ? $dstPath : null;
	}
	
	/**
	 * Render an image using a new size.  The resulting URL will include the
	 * rendered size information.
	 * 
	 * @param string $path the source image file path.
	 * @param integer $newWidth the new width to use.
	 * @param integer $newHeight the new height to use.
	 * @return string the URL of the rendered image.
	 */
	function resize($path, $width, $height)
	{
		$srcImage = imagecreatefromjpeg($path);
		list($srcWidth, $srcHeight) = getimagesize($path);
		
		$srcRatio = $srcHeight / $srcWidth;
		$dstRatio = $height / $width;
		
		$dstWidth = $width;
		$dstHeight = intval($width * $srcRatio);
		
		if ($dstHeight > $height) {
			$dstWidth = intval($height * $srcRatio);
			$dstHeight = $height;
		}
		
		$dstImage = imagecreatetruecolor($dstWidth, $dstHeight);
		imagecopyresampled($dstImage, $srcImage, 0, 0, 0, 0, 
				$dstWidth, $dstHeight, $srcWidth, $srcHeight);
		
		$dstFilename = $this->generateFilename($path, "_{$dstWidth}x{$dstHeight}.jpg");
		$dstPath = $this->webroot . '/files/images/' . $dstFilename;
		
		$dstPath = imagejpeg($dstImage, $dstPath) ? $dstPath : null;
		
		imagedestroy($dstImage);
		imagedestroy($srcImage);
		
		return $dstPath;
	}
}
?>