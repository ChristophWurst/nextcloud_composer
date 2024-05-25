<?php

declare(strict_types=1);

/**
 * SPDX-FileCopyrightText: 2019 Nextcloud GmbH and Nextcloud contributors
 * SPDX-License-Identifier: AGPL-3.0-or-later
 */
namespace OCP\Group\Backend;

/**
 * @since 17.0.0
 */
interface IGetDisplayNameBackend {
	/**
	 * @param string $gid
	 * @return string
	 * @since 17.0.0
	 */
	public function getDisplayName(string $gid): string;
}
