<?php

declare(strict_types=1);

/**
 * @copyright Copyright (c) 2024 Marcel Klehr <mklehr@gmx.net>
 *
 * @author Marcel Klehr <mklehr@gmx.net>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */


namespace OCP\TaskProcessing;

use OCP\Files\File;
use OCP\TaskProcessing\Exception\ProcessingException;

/**
 * This is the interface that is implemented by apps that
 * implement a task processing provider
 * @since 30.0.0
 */
interface ISynchronousProvider extends IProvider {

	/**
	 * Returns the shape of optional output parameters
	 *
	 * @param null|string $userId The user that created the current task
	 * @param array<string, list<numeric|string|File>|numeric|string|File> $input The task input
	 * @param callable(float):bool $reportProgress Report the task progress. If this returns false, that means the task was cancelled and processing should be stopped.
	 * @psalm-return array<string, list<numeric|string>|numeric|string>
	 * @throws ProcessingException
	 *@since 30.0.0
	 */
	public function process(?string $userId, array $input, callable $reportProgress): array;
}
