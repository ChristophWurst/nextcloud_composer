<?php
declare(strict_types=1);

/**
 * @copyright Copyright (c) 2018 Roeland Jago Douma <roeland@famdouma.nl>
 *
 * @author Jakob Sack <mail@jakobsack.de>
 * @author Roeland Jago Douma <roeland@famdouma.nl>
 *
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace OCP\AppFramework\Http;

use OCP\IRequest;
use OC\Streamer;

/**
 * Public library to send several files in one zip archive.
 *
 * @since 15.0.0
 */
class ZipResponse extends Response implements ICallbackResponse {
	/** @var resource[] Files to be added to the zip response */
	private $resources;
	/** @var string Filename that the zip file should have */
	private $name;
	private $request;

	/**
	 * @since 15.0.0
	 */
	public function __construct(IRequest $request, string $name = 'output') {
		$this->name = $name;
		$this->request = $request;
	}

	/**
	 * @since 15.0.0
	 */
	public function addResource($r, string $internalName, int $size, int $time = -1) {
		if (!\is_resource($r)) {
			throw new \InvalidArgumentException('No resource provided');
		}

		$this->resources[] = [
			'resource' => $r,
			'internalName' => $internalName,
			'size' => $size,
			'time' => $time,
		];
	}

	/**
	 * @since 15.0.0
	 */
	public function callback(IOutput $output) {
		$size = 0;
		$files = count($this->resources);

		foreach ($this->resources as $resource) {
			$size += $resource['size'];
		}

		$zip = new Streamer($this->request, $size, $files);
		$zip->sendHeaders($this->name);

		foreach ($this->resources as $resource) {
			$zip->addFileFromStream($resource['resource'], $resource['internalName'], $resource['size'], $resource['time']);
		}

		$zip->finalize();
	}
}
