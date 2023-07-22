<?php

declare(strict_types=1);

/**
 * @copyright Copyright (c) 2023 Marcel Klehr <mklehr@gmx.net>
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

namespace OCP\TextProcessing;

use OCP\IL10N;

/**
 * This is the text processing task type for topics extraction
 * @since 27.1.0
 */
class TopicsTaskType implements ITaskType {
	/**
	 * Constructor for TopicsTaskType
	 *
	 * @param IL10N $l
	 * @since 27.1.0
	 */
	public function __construct(
		private IL10N $l,
	) {
	}


	/**
	 * @inheritDoc
	 * @since 27.1.0
	 */
	public function getName(): string {
		return $this->l->t('Extract topics');
	}

	/**
	 * @inheritDoc
	 * @since 27.1.0
	 */
	public function getDescription(): string {
		return $this->l->t('Extracts topics from a text and outputs them separated by commas.');
	}
}
