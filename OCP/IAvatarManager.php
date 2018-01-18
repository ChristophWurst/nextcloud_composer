<?php
declare(strict_types=1);
/**
 * @copyright Copyright (c) 2016, ownCloud, Inc.
 *
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Christopher Schäpers <kondou@ts.unde.re>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
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

namespace OCP;

/**
 * This class provides avatar functionality
 * @since 6.0.0
 */

interface IAvatarManager {

	/**
	 * return a user specific instance of \OCP\IAvatar
	 * @see IAvatar
	 * @param string $user the ownCloud user id
	 * @return IAvatar
	 * @throws \Exception In case the username is potentially dangerous
	 * @throws \OCP\Files\NotFoundException In case there is no user folder yet
	 * @since 6.0.0
	 */
	public function getAvatar(string $user) : IAvatar;
}
