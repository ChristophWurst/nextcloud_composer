<?php
/**
 * @copyright Copyright (c) 2016, ownCloud, Inc.
 *
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
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
namespace OCP\Migration;

/**
 * Interface IOutput
 *
 * @package OCP\Migration
 * @since 9.1.0
 */
interface IOutput {

	/**
	 * @param string $message
	 * @since 9.1.0
	 */
	public function info($message);

	/**
	 * @param string $message
	 * @since 9.1.0
	 */
	public function warning($message);

	/**
	 * @param int $max
	 * @since 9.1.0
	 */
	public function startProgress($max = 0);

	/**
	 * @param int $step
	 * @param string $description
	 * @since 9.1.0
	 */
	public function advance($step = 1, $description = '');

	/**
	 * @param int $max
	 * @since 9.1.0
	 */
	public function finishProgress();

}
