<?php
/**
 * @copyright Copyright (c) 2016 Joas Schilling <coding@schilljs.com>
 *
 * @author Joas Schilling <coding@schilljs.com>
 * @author Maxence Lange <maxence@nextcloud.com>
 * @author Roeland Jago Douma <roeland@famdouma.nl>
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
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace OCP\RichObjectStrings;


/**
 * Class Definitions
 *
 * @package OCP\RichObjectStrings
 * @since 11.0.0
 */
class Definitions {
	/**
	 * @var array
	 * @since 11.0.0
	 */
	public $definitions = [
		'addressbook' => [
			'author' => 'Nextcloud',
			'app' => 'dav',
			'since' => '11.0.0',
			'parameters' => [
				'id' => [
					'since' => '11.0.0',
					'required' => true,
					'description' => 'The id used to identify the addressbook on the instance',
					'example' => '42',
				],
				'name' => [
					'since' => '11.0.0',
					'required' => true,
					'description' => 'The display name of the addressbook which should be used in the visual representation',
					'example' => 'Contacts',
				],
			],
		],
		'addressbook-contact' => [
			'author' => 'Nextcloud',
			'app' => 'dav',
			'since' => '11.0.0',
			'parameters' => [
				'id' => [
					'since' => '11.0.0',
					'required' => true,
					'description' => 'The id used to identify the contact on the instance',
					'example' => '42',
				],
				'name' => [
					'since' => '11.0.0',
					'required' => true,
					'description' => 'The display name of the contact which should be used in the visual representation',
					'example' => 'John Doe',
				],
			],
		],
		'announcement' => [
			'author' => 'Joas Schilling',
			'app' => 'announcementcenter',
			'since' => '11.0.0',
			'parameters' => [
				'id' => [
					'since' => '11.0.0',
					'required' => true, 'description' => 'The id used to identify the announcement on the instance',
					'example' => '42',
				],
				'name' => [
					'since' => '11.0.0',
					'required' => true,
					'description' => 'The announcement subject which should be used in the visual representation',
					'example' => 'file.txt',
				],
				'link' => [
					'since' => '11.0.0',
					'required' => false,
					'description' => 'The full URL to the file',
					'example' => 'http://localhost/index.php/apps/announcements/#23',
				],
			],
		],
		'app' => [
			'author' => 'Nextcloud',
			'app' => 'updatenotification',
			'since' => '11.0.0',
			'parameters' => [
				'id' => [
					'since' => '11.0.0',
					'required' => true, 'description' => 'The app id',
					'example' => 'updatenotification',
				],
				'name' => [
					'since' => '11.0.0',
					'required' => true,
					'description' => 'The name of the app which should be used in the visual representation',
					'example' => 'Update notification',
				],
			],
		],
		'calendar' => [
			'author' => 'Nextcloud',
			'app' => 'dav',
			'since' => '11.0.0',
			'parameters' => [
				'id' => [
					'since' => '11.0.0',
					'required' => true,
					'description' => 'The id used to identify the calendar on the instance',
					'example' => '42',
				],
				'name' => [
					'since' => '11.0.0',
					'required' => true,
					'description' => 'The display name of the calendar which should be used in the visual representation',
					'example' => 'Personal',
				],
			],
		],
		'calendar-event' => [
			'author' => 'Nextcloud',
			'app' => 'dav',
			'since' => '11.0.0',
			'parameters' => [
				'id' => [
					'since' => '11.0.0',
					'required' => true,
					'description' => 'The id used to identify the event on the instance',
					'example' => '42',
				],
				'name' => [
					'since' => '11.0.0',
					'required' => true,
					'description' => 'The display name of the event which should be used in the visual representation',
					'example' => 'Workout',
				],
			],
		],
		'call' => [
			'author' => 'Nextcloud',
			'app' => 'spreed',
			'since' => '11.0.2',
			'parameters' => [
				'id' => [
					'since' => '11.0.2',
					'required' => true,
					'description' => 'The id used to identify the call on the instance',
					'example' => '42',
				],
				'name' => [
					'since' => '11.0.2',
					'required' => true,
					'description' => 'The display name of the call which should be used in the visual representation',
					'example' => 'Company call',
				],
				'call-type' => [
					'since' => '11.0.2',
					'required' => true,
					'description' => 'The type of the call: one2one, group or public',
					'example' => 'one2one',
				],
			],
		],
		'circle' => [
			'author' => 'Maxence Lange',
			'app' => 'circles',
			'since' => '12.0.0',
			'parameters' => [
				'id' => [
					'since' => '12.0.0',
					'required' => true,
					'description' => 'The id used to identify the circle on the instance',
					'example' => '42',
				],
				'name' => [
					'since' => '12.0.0',
					'required' => true,
					'description' => 'The display name of the circle which should be used in the visual representation',
					'example' => 'My friends',
				],
				'link' => [
					'since' => '12.0.0',
					'required' => true,
					'description' => 'The full URL to the circle',
					'example' => 'http://localhost/index.php/apps/circles/#42',
				],
			],
		],
		'email' => [
			'author' => 'Nextcloud',
			'app' => 'sharebymail',
			'since' => '11.0.0',
			'parameters' => [
				'id' => [
					'since' => '11.0.0',
					'required' => true,
					'description' => 'The mail-address used to identify the event on the instance',
					'example' => 'test@localhost',
				],
				'name' => [
					'since' => '11.0.0',
					'required' => true,
					'description' => 'The display name of a matching contact or the email (fallback) which should be used in the visual representation',
					'example' => 'Foo Bar',
				],
			],
		],
		'file' => [
			'author' => 'Nextcloud',
			'app' => 'dav',
			'since' => '11.0.0',
			'parameters' => [
				'id' => [
					'since' => '11.0.0',
					'required' => true,
					'description' => 'The id used to identify the file on the instance',
					'example' => '42',
				],
				'name' => [
					'since' => '11.0.0',
					'required' => true,
					'description' => 'The file name which should be used in the visual representation',
					'example' => 'file.txt',
				],
				'path' => [
					'since' => '11.0.0',
					'required' => true,
					'description' => 'The full path of the file for the user, should not start with a slash',
					'example' => 'path/to/file.txt',
				],
				'link' => [
					'since' => '11.0.0',
					'required' => false,
					'description' => 'The full URL to the file',
					'example' => 'http://localhost/index.php/f/42',
				],
				'mimetype' => [
					'since' => '16.0.0',
					'required' => false,
					'description' => 'The mimetype of the file/folder to allow clients to show a placeholder',
					'example' => 'text/plain',
				],
				'preview-available' => [
					'since' => '16.0.0',
					'required' => false,
					'description' => 'Whether or not a preview is available. If `no` the mimetype icon should be used',
					'example' => 'yes',
				],
			],
		],
		'highlight' => [
			'author' => 'Nextcloud',
			'app' => 'core',
			'since' => '13.0.0',
			'parameters' => [
				'id' => [
					'since' => '13.0.0',
					'required' => true,
					'description' => 'The id used to identify the highlighted object on the instance',
					'example' => '42',
				],
				'name' => [
					'since' => '13.0.0',
					'required' => true,
					'description' => 'The string that should be highlighted.',
					'example' => 'Hello World',
				],
				'link' => [
					'since' => '13.0.0',
					'required' => false,
					'description' => 'The full URL that should be opened when clicking the highlighted text.',
					'example' => 'http://localhost/index.php/f/42',
				],
			],
		],
		'open-graph' => [
			'author' => 'Maxence Lange',
			'app' => 'mood',
			'since' => '12.0.0',
			'parameters' => [
				'id' => [
					'since' => '12.0.0',
					'required' => true,
					'description' => 'The id used to identify the open graph data on the instance',
					'example' => '42',
				],
				'name' => [
					'since' => '12.0.0',
					'required' => true,
					'description' => 'The open graph title of the website',
					'example' => 'This is a website',
				],
				'description' => [
					'since' => '12.0.0',
					'required' => false,
					'description' => 'The open graph description from the website',
					'example' => 'This is the description of the website',
				],
				'thumb' => [
					'since' => '12.0.0',
					'required' => false,
					'description' => 'The full URL of the open graph thumbnail',
					'example' => 'http://localhost/index.php/apps/mood/data/image?url=https%3A%2F%2Fthumb.example.com%2Fimage.png',
				],
				'website' => [
					'since' => '12.0.0',
					'required' => false,
					'description' => 'The name of the described website',
					'example' => 'Nextcloud - App Store',
				],
				'link' => [
					'since' => '12.0.0',
					'required' => false,
					'description' => 'The full link to the website',
					'example' => 'https://apps.nextcloud.com/apps/mood',
				],
			],
		],
		'pending-federated-share' => [
			'author' => 'Nextcloud',
			'app' => 'dav',
			'since' => '11.0.0',
			'parameters' => [
				'id' => [
					'since' => '11.0.0',
					'required' => true,
					'description' => 'The id used to identify the federated share on the instance',
					'example' => '42',
				],
				'name' => [
					'since' => '11.0.0',
					'required' => true,
					'description' => 'The name of the shared item which should be used in the visual representation',
					'example' => 'file.txt',
				],
			],
		],
		'systemtag' => [
			'author' => 'Nextcloud',
			'app' => 'core',
			'since' => '11.0.0',
			'parameters' => [
				'id' => [
					'since' => '11.0.0',
					'required' => true,
					'description' => 'The id used to identify the systemtag on the instance',
					'example' => '23',
				],
				'name' => [
					'since' => '11.0.0',
					'required' => true,
					'description' => 'The display name of the systemtag which should be used in the visual representation',
					'example' => 'Project 1',
				],
				'visibility' => [
					'since' => '11.0.0',
					'required' => true,
					'description' => 'If the user can see the systemtag',
					'example' => '1',
				],
				'assignable' => [
					'since' => '11.0.0',
					'required' => true,
					'description' => 'If the user can assign the systemtag',
					'example' => '0',
				],
			],
		],
		'user' => [
			'author' => 'Nextcloud',
			'app' => 'core',
			'since' => '11.0.0',
			'parameters' => [
				'id' => [
					'since' => '11.0.0',
					'required' => true,
					'description' => 'The id used to identify the user on the instance',
					'example' => 'johndoe',
				],
				'name' => [
					'since' => '11.0.0',
					'required' => true,
					'description' => 'The display name of the user which should be used in the visual representation',
					'example' => 'John Doe',
				],
				'server' => [
					'since' => '11.0.0',
					'required' => false,
					'description' => 'The URL of the instance the user lives on',
					'example' => 'localhost',
				],
			],
		],
		'user-group' => [
			'author' => 'Nextcloud',
			'app' => 'core',
			'since' => '11.0.0',
			'parameters' => [
				'id' => [
					'since' => '11.0.0',
					'required' => true,
					'description' => 'The id used to identify the group on the instance',
					'example' => 'supportteam',
				],
				'name' => [
					'since' => '11.0.0',
					'required' => true,
					'description' => 'The display name of the group which should be used in the visual representation',
					'example' => 'Support Team',
				],
			],
		],
	];

	/**
	 * @param string $type
	 * @return array
	 * @throws InvalidObjectExeption
	 * @since 11.0.0
	 */
	public function getDefinition($type) {
		if (isset($this->definitions[$type])) {
			return $this->definitions[$type];
		}

		throw new InvalidObjectExeption('Object type is undefined');
	}
}
