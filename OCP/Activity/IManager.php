<?php
/**
 * @copyright Copyright (c) 2016, ownCloud, Inc.
 *
 * @author Christoph Wurst <christoph@owncloud.com>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

/**
 * Public interface of ownCloud for apps to use.
 * Activity/IManager interface
 */

// use OCP namespace for all classes that are considered public.
// This means that they should be used by apps instead of the internal ownCloud classes
namespace OCP\Activity;

/**
 * Interface IManager
 *
 * @package OCP\Activity
 * @since 6.0.0
 */
interface IManager {
	/**
	 * Generates a new IEvent object
	 *
	 * Make sure to call at least the following methods before sending it to the
	 * app with via the publish() method:
	 *  - setApp()
	 *  - setType()
	 *  - setAffectedUser()
	 *  - setSubject()
	 *
	 * @return IEvent
	 * @since 8.2.0
	 */
	public function generateEvent();

	/**
	 * Publish an event to the activity consumers
	 *
	 * Make sure to call at least the following methods before sending an Event:
	 *  - setApp()
	 *  - setType()
	 *  - setAffectedUser()
	 *  - setSubject()
	 *
	 * @param IEvent $event
	 * @throws \BadMethodCallException if required values have not been set
	 * @since 8.2.0
	 */
	public function publish(IEvent $event);

	/**
	 * In order to improve lazy loading a closure can be registered which will be called in case
	 * activity consumers are actually requested
	 *
	 * $callable has to return an instance of \OCP\Activity\IConsumer
	 *
	 * @param \Closure $callable
	 * @return void
	 * @since 6.0.0
	 */
	public function registerConsumer(\Closure $callable);

	/**
	 * In order to improve lazy loading a closure can be registered which will be called in case
	 * activity consumers are actually requested
	 *
	 * $callable has to return an instance of \OCP\Activity\IExtension
	 *
	 * @param \Closure $callable
	 * @return void
	 * @since 8.0.0
	 */
	public function registerExtension(\Closure $callable);

	/**
	 * @param string $filter Class must implement OCA\Activity\IFilter
	 * @return void
	 * @since 11.0.0
	 */
	public function registerFilter($filter);

	/**
	 * @return IFilter[]
	 * @since 11.0.0
	 */
	public function getFilters();

	/**
	 * @param string $id
	 * @return IFilter
	 * @throws \InvalidArgumentException when the filter was not found
	 * @since 11.0.0
	 */
	public function getFilterById($id);

	/**
	 * @param string $setting Class must implement OCA\Activity\ISetting
	 * @return void
	 * @since 11.0.0
	 */
	public function registerSetting($setting);

	/**
	 * @return ISetting[]
	 * @since 11.0.0
	 */
	public function getSettings();

	/**
	 * @param string $provider Class must implement OCA\Activity\IProvider
	 * @return void
	 * @since 11.0.0
	 */
	public function registerProvider($provider);

	/**
	 * @return IProvider[]
	 * @since 11.0.0
	 */
	public function getProviders();

	/**
	 * @param string $id
	 * @return ISetting
	 * @throws \InvalidArgumentException when the setting was not found
	 * @since 11.0.0
	 */
	public function getSettingById($id);

	/**
	 * Will return additional notification types as specified by other apps
	 *
	 * @param string $languageCode
	 * @return array Array "stringID of the type" => "translated string description for the setting"
	 * 				or Array "stringID of the type" => [
	 * 					'desc' => "translated string description for the setting"
	 * 					'methods' => [\OCP\Activity\IExtension::METHOD_*],
	 * 				]
	 * @since 8.0.0 - 8.2.0: Added support to allow limiting notifications to certain methods
	 * @deprecated 11.0.0 - Use getSettings() instead
	 */
	public function getNotificationTypes($languageCode);

	/**
	 * @param string $method
	 * @return array
	 * @since 8.0.0
	 * @deprecated 11.0.0 - Use getSettings()->isDefaulEnabled<method>() instead
	 */
	public function getDefaultTypes($method);

	/**
	 * @param string $type
	 * @return string
	 * @since 8.0.0
	 */
	public function getTypeIcon($type);

	/**
	 * @param string $type
	 * @param int $id
	 * @since 8.2.0
	 */
	public function setFormattingObject($type, $id);

	/**
	 * @return bool
	 * @since 8.2.0
	 */
	public function isFormattingFilteredObject();

	/**
	 * @param bool $status Set to true, when parsing events should not use SVG icons
	 * @since 12.0.1
	 */
	public function setRequirePNG($status);

	/**
	 * @return bool
	 * @since 12.0.1
	 */
	public function getRequirePNG();

	/**
	 * @param string $app
	 * @param string $text
	 * @param array $params
	 * @param boolean $stripPath
	 * @param boolean $highlightParams
	 * @param string $languageCode
	 * @return string|false
	 * @since 8.0.0
	 */
	public function translate($app, $text, $params, $stripPath, $highlightParams, $languageCode);

	/**
	 * @param string $app
	 * @param string $text
	 * @return array|false
	 * @since 8.0.0
	 */
	public function getSpecialParameterList($app, $text);

	/**
	 * @param array $activity
	 * @return integer|false
	 * @since 8.0.0
	 */
	public function getGroupParameter($activity);


	/**
	 * Set the user we need to use
	 *
	 * @param string|null $currentUserId
	 * @throws \UnexpectedValueException If the user is invalid
	 * @since 9.0.1
	 */
	public function setCurrentUserId($currentUserId);

	/**
	 * Get the user we need to use
	 *
	 * Either the user is logged in, or we try to get it from the token
	 *
	 * @return string
	 * @throws \UnexpectedValueException If the token is invalid, does not exist or is not unique
	 * @since 8.1.0
	 */
	public function getCurrentUserId();

	/**
	 * @return array
	 * @since 8.0.0
	 * @deprecated 11.0.0 - Use getFilters() instead
	 */
	public function getNavigation();

	/**
	 * @param string $filterValue
	 * @return boolean
	 * @since 8.0.0
	 * @deprecated 11.0.0 - Use getFilterById() instead
	 */
	public function isFilterValid($filterValue);

	/**
	 * @param array $types
	 * @param string $filter
	 * @return array
	 * @since 8.0.0
	 * @deprecated 11.0.0 - Use getFilterById()->filterTypes() instead
	 */
	public function filterNotificationTypes($types, $filter);

	/**
	 * @param string $filter
	 * @return array
	 * @since 8.0.0
	 * @deprecated 11.0.0 - Use getFilterById() instead
	 */
	public function getQueryForFilter($filter);
}
