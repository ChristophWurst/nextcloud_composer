<?php

declare(strict_types=1);
/**
 * SPDX-FileCopyrightText: 2016-2024 Nextcloud GmbH and Nextcloud contributors
 * SPDX-FileCopyrightText: 2016 ownCloud, Inc.
 * SPDX-License-Identifier: AGPL-3.0-only
 */
namespace OCP;

use GdImage;

/**
 * Class for basic image manipulation
 * @since 8.1.0
 */
interface IImage {
	/**
	 * Determine whether the object contains an image resource.
	 *
	 * @since 8.1.0
	 */
	public function valid(): bool;

	/**
	 * Returns the MIME type of the image or null if no image is loaded.
	 *
	 * @since 8.1.0
	 */
	public function mimeType(): ?string;

	/**
	 * Returns the width of the image or -1 if no image is loaded.
	 *
	 * @since 8.1.0
	 */
	public function width(): int;

	/**
	 * Returns the height of the image or -1 if no image is loaded.
	 *
	 * @since 8.1.0
	 */
	public function height(): int;

	/**
	 * Returns the width when the image orientation is top-left.
	 *
	 * @since 8.1.0
	 */
	public function widthTopLeft(): int;

	/**
	 * Returns the height when the image orientation is top-left.
	 *
	 * @since 8.1.0
	 */
	public function heightTopLeft(): int;

	/**
	 * Outputs the image.
	 *
	 * @since 8.1.0
	 */
	public function show(?string $mimeType = null): bool;

	/**
	 * Saves the image.
	 *
	 * @param string $filePath
	 * @param string $mimeType
	 * @since 8.1.0
	 */
	public function save(?string $filePath = null, ?string $mimeType = null): bool;

	/**
	 * @return false|resource|\GdImage Returns the image resource if any
	 * @since 8.1.0
	 */
	public function resource();

	/**
	 * @return string Returns the mimetype of the data. Returns null
	 *                if the data is not valid.
	 * @since 13.0.0
	 */
	public function dataMimeType(): ?string;

	/**
	 * @return string Returns the raw image data.
	 * @since 8.1.0
	 */
	public function data(): ?string;

	/**
	 * (I'm open for suggestions on better method name ;)
	 * Get the orientation based on EXIF data.
	 *
	 * @return int The orientation or -1 if no EXIF data is available.
	 * @since 8.1.0
	 */
	public function getOrientation(): int;

	/**
	 * (I'm open for suggestions on better method name ;)
	 * Fixes orientation based on EXIF data.
	 *
	 * @since 8.1.0
	 */
	public function fixOrientation(): bool;

	/**
	 * Resizes the image preserving ratio.
	 *
	 * @param integer $maxSize The maximum size of either the width or height.
	 * @since 8.1.0
	 */
	public function resize(int $maxSize): bool;

	/**
	 * @param int $width
	 * @param int $height
	 * @return bool
	 * @since 8.1.0
	 */
	public function preciseResize(int $width, int $height): bool;

	/**
	 * Crops the image to the middle square. If the image is already square it just returns.
	 *
	 * @param int $size maximum size for the result (optional)
	 * @return bool for success or failure
	 * @since 8.1.0
	 */
	public function centerCrop(int $size = 0): bool;

	/**
	 * Crops the image from point $x$y with dimension $wx$h.
	 *
	 * @param int $x Horizontal position
	 * @param int $y Vertical position
	 * @param int $w Width
	 * @param int $h Height
	 * @return bool for success or failure
	 * @since 8.1.0
	 */
	public function crop(int $x, int $y, int $w, int $h): bool;

	/**
	 * Resizes the image to fit within a boundary while preserving ratio.
	 *
	 * Warning: Images smaller than $maxWidth x $maxHeight will end up being scaled up
	 *
	 * @param int $maxWidth
	 * @param int $maxHeight
	 * @since 8.1.0
	 */
	public function fitIn(int $maxWidth, int $maxHeight): bool;

	/**
	 * Shrinks the image to fit within a boundary while preserving ratio.
	 *
	 * @param int $maxWidth
	 * @param int $maxHeight
	 * @since 8.1.0
	 */
	public function scaleDownToFit(int $maxWidth, int $maxHeight): bool;

	/**
	 * create a copy of this image
	 *
	 * @return IImage
	 * @since 19.0.0
	 */
	public function copy(): IImage;

	/**
	 * create a new cropped copy of this image
	 *
	 * @param int $x Horizontal position
	 * @param int $y Vertical position
	 * @param int $w Width
	 * @param int $h Height
	 * @return IImage
	 * @since 19.0.0
	 */
	public function cropCopy(int $x, int $y, int $w, int $h): IImage;

	/**
	 * create a new resized copy of this image
	 *
	 * @param int $width
	 * @param int $height
	 * @return IImage
	 * @since 19.0.0
	 */
	public function preciseResizeCopy(int $width, int $height): IImage;

	/**
	 * Resizes the image preserving ratio, returning a new copy
	 *
	 * @param int $maxSize The maximum size of either the width or height.
	 * @return IImage
	 * @since 19.0.0
	 */
	public function resizeCopy(int $maxSize): IImage;

	/**
	 * Loads an image from a string of data.
	 *
	 * @param string $str A string of image data as read from a file.
	 *
	 * @since 31.0.0
	 */
	public function loadFromData(string $str): GdImage|false;

	/**
	 * Reads the EXIF data for an image.
	 *
	 * @param string $data EXIF data
	 *
	 * @since 31.0.0
	 */
	public function readExif(string $data): void;
}
