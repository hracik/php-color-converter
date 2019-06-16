<?php
namespace Hracik\ColorConverter\Tests;

use Hracik\ColorConverter\ColorConverter;
use PHPUnit\Framework\TestCase;

class ColorConverterTest extends TestCase
{
	/**
	 * @dataProvider hsl2rgbProvider
	 * @param $hsl
	 * @param $rgb
	 */
	public function test_hsl2rgb($hsl, $rgb)
	{
		$converted = ColorConverter::hsl2rgb($hsl);
		$this->assertSame($rgb, $converted);
	}

	/**
	 * @dataProvider hsl2hexProvider
	 * @param $hsl
	 * @param $hex
	 */
	public function test_hsl2hex($hsl, $hex)
	{
		$converted = ColorConverter::hsl2hex($hsl);
		$this->assertSame($hex, $converted);
	}

	/**
	 * @dataProvider rgb2hslProvider
	 * @param $rgb
	 * @param $hsl
	 */
	public function test_rgb2hsl($rgb, $hsl)
	{
		$converted = ColorConverter::rgb2hsl($rgb);
		$this->assertSame($hsl, $converted);
	}

	/**
	 * @dataProvider rgb2hexProvider
	 * @param $rgb
	 * @param $hex
	 */
	public function test_rgb2hex($rgb, $hex)
	{
		$converted = ColorConverter::rgb2hex($rgb);
		$this->assertSame($hex, $converted);
	}

	/**
	 * @dataProvider hex2hslProvider
	 * @param $hex
	 * @param $hsl
	 */
	public function test_hex2hsl($hex, $hsl)
	{
		$converted = ColorConverter::hex2hsl($hex);
		$this->assertSame($hsl, $converted);
	}

	/**
	 * @dataProvider hex2rgbProvider
	 * @param $hex
	 * @param $rgb
	 */
	public function test_hex2rgb($hex, $rgb)
	{
		$converted = ColorConverter::hex2rgb($hex);
		$this->assertSame($rgb, $converted);
	}

	/**
	 * @return array
	 */
	public function hsl2rgbProvider()
	{
		return [
			[[0.542, 1.0, 0.5], [0,191,255]],
			[[0.361, 1.0, 0.176], [0,90,15]],
			[[0.244, 0.714, 0.206], [55,90,15]],
		];
	}

	/**
	 * @return array
	 */
	public function rgb2hslProvider()
	{
		return [
			[[0,191,255], [0.542, 1.0, 0.5]],
			[[0,90,15], [0.361, 1.0, 0.176]],
			[[55,90,15], [0.244, 0.714, 0.206]],
			[[255,90,0],[0.059,1.0,0.5]]
		];
	}

	/**
	 * @return array
	 */
	public function rgb2hexProvider()
	{
		return [
			[[0,0,0], '#000000'],
			[[255,90,0], '#ff5a00'],
			[[255,255,255], '#ffffff'],
			[[140,140,140], '#8c8c8c'],
		];
	}

	/**
	 * @return array
	 */
	public function hex2rgbProvider()
	{
		return [
			['#000000', [0,0,0]],
			['#ffffff', [255,255,255]],
			['#8c8c8c', [140,140,140]],
			['#ff5a00', [255,90,0]],
		];
	}

	/**
	 * @return array
	 */
	public function hex2hslProvider()
	{
		return [
			['#ff5a00', [0.059, 1.0, 0.5]],
		];
	}

	/**
	 * @return array
	 */
	public function hsl2hexProvider()
	{
		return [
			[[0.059,1.0,0.5], '#ff5a00'],
		];
	}
}
