<?php
namespace Hracik\ColorConverter;

class ColorConverter
{
	/**
	 * @param string $hex
	 * @return array
	 */
	public static function hex2rgb(string $hex): array
	{
		return sscanf(strtolower($hex), "#%02x%02x%02x");
	}

	/**
	 * Converts RGB color to hex code
	 * Input: Array(Red, Green, Blue) - 0-255 each, int values
	 * Output: String hex value (#000000 - #ffffff)
	 * @param array $rgb
	 * @return string
	 */
	public static function rgb2hex(array $rgb) :string
	{
		list($r,$g,$b) = $rgb;
		return sprintf("#%02x%02x%02x", $r, $g, $b);
	}

	/**
	 * @param string $hex
	 * @return array
	 */
	public static function hex2hsl(string $hex): array
	{
		$rgb = self::hex2rgb($hex);
		return self::rgb2hsl($rgb);
	}

	/**
	 * Converts HSL color to RGB hex code
	 * Input: Array(Hue, Saturation, Lightness) - Values from 0 to 1
	 * Output: String hex value (#000000 - #ffffff)
	 * @param array $hsl
	 * @return string
	 */
	public static function hsl2hex(array $hsl) :string
	{
		$rgb = self::hsl2rgb($hsl);
		return self::rgb2hex($rgb);
	}

	/**
	 * Converts RGB color to HSL color
	 * Check http://en.wikipedia.org/wiki/HSL_and_HSV#Hue_and_chroma for details
	 * Input: Array(Red, Green, Blue) - Values from 0 to 1
	 * Output: Array(Hue, Saturation, Lightness) - Values from 0 to 1
	 * @param array $rgb
	 * @return array
	 */
	public static function rgb2hsl(array $rgb): array
	{
		// Fill variables $r, $g, $b by array given.
		list($r, $g, $b) = $rgb;
		$r /= 255;
		$g /= 255;
		$b /= 255;
		$min = min($r, min($g, $b));
		$max = max($r, max($g, $b));
		$delta = $max - $min;
		$l = ($min + $max) / 2;
		$s = 0;
		if ($l > 0 && $l < 1) {
			$s = $delta / ($l < 0.5 ? (2 * $l) : (2 - 2 * $l));
		}
		$h = 0;
		if ($delta > 0) {
			if ($max == $r && $max != $g) $h += ($g - $b) / $delta;
			if ($max == $g && $max != $b) $h += (2 + ($b - $r) / $delta);
			if ($max == $b && $max != $r) $h += (4 + ($r - $g) / $delta);
			$h /= 6;
		}
		// Return HSL Color as array
		return array(round($h,3), round($s,3), round($l,3));
	}

	/**
	 * @param array $hsl
	 * @return array
	 */
	public static function hsl2rgb(array $hsl): array
	{
		list($h, $s, $l) = $hsl;
		$m2 = ($l <= 0.5) ? $l * ($s + 1) : $l + $s - $l*$s;
		$m1 = $l * 2 - $m2;
		return array(
			0 => intval(round(self::_hue2rgb($m1, $m2, $h + 0.33333) * 255)),
			1 => intval(round(self::_hue2rgb($m1, $m2, $h) * 255)),
			2 => intval(round(self::_hue2rgb($m1, $m2, $h - 0.33333) * 255)),
		);
	}

	/**
	 * Helper function for hsl2rgb().
	 * @param $m1
	 * @param $m2
	 * @param $h
	 * @return float|int
	 */
	private static function _hue2rgb($m1, $m2, $h)
	{
		$h = ($h < 0) ? $h + 1 : (($h > 1) ? $h - 1 : $h);
		if ($h * 6 < 1) {
			return $m1 + ($m2 - $m1) * $h * 6;
		}
		if ($h * 2 < 1) {
			return $m2;
		}
		if ($h * 3 < 2) {
			return $m1 + ($m2 - $m1) * (0.66666 - $h) * 6;
		}
		return $m1;
	}

}
