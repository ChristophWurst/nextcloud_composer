<?php
/**
 * @copyright Copyright (c) 2016, ownCloud, Inc.
 *
 * @author Joas Schilling <coding@schilljs.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Noveen Sachdeva <noveen.sachdeva@research.iiit.ac.in>
 * @author Robin Appelman <robin@icewind.nl>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
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
 * along with this program. If not, see <http://www.gnu.org/licenses/>
 *
 */
namespace OCP\BackgroundJob;

/**
 * Interface IJobList
 *
 * This interface provides functions to register background jobs
 *
 * To create a new background job create a new class that inherits from either
 * \OC\BackgroundJob\Job, \OC\BackgroundJob\QueuedJob or
 * \OC\BackgroundJob\TimedJob and register it using ->add($job, $argument),
 * $argument will be passed to the run() function of the job when the job is
 * executed.
 *
 * A regular job will be executed every time cron.php is run, a QueuedJob will
 * only run once and a TimedJob will only run at a specific interval which is to
 * be specified in the constructor of the job by calling
 * $this->setInterval($interval) with $interval in seconds.
 *
 * @since 7.0.0
 */
interface IJobList {
	/**
	 * Add a job to the list
	 *
	 * @param \OCP\BackgroundJob\IJob|string $job
	 * @param mixed $argument The argument to be passed to $job->run() when the job is exectured
	 * @since 7.0.0
	 */
	public function add($job, $argument = null);

	/**
	 * Remove a job from the list
	 *
	 * @param \OCP\BackgroundJob\IJob|string $job
	 * @param mixed $argument
	 * @since 7.0.0
	 */
	public function remove($job, $argument = null);

	/**
	 * check if a job is in the list
	 *
	 * @param \OCP\BackgroundJob\IJob|string $job
	 * @param mixed $argument
	 * @return bool
	 * @since 7.0.0
	 */
	public function has($job, $argument);

	/**
	 * get all jobs in the list
	 *
	 * @return \OCP\BackgroundJob\IJob[]
	 * @since 7.0.0
	 * @deprecated 9.0.0 - This method is dangerous since it can cause load and
	 * memory problems when creating too many instances.
	 */
	public function getAll();

	/**
	 * get the next job in the list
	 *
	 * @param bool $onlyTimeSensitive
	 * @return \OCP\BackgroundJob\IJob|null
	 * @since 7.0.0 - In 24.0.0 parameter $onlyTimeSensitive got added
	 */
	public function getNext(bool $onlyTimeSensitive = false): ?IJob;

	/**
	 * @param int $id
	 * @return \OCP\BackgroundJob\IJob|null
	 * @since 7.0.0
	 */
	public function getById($id);

	/**
	 * @param int $id
	 * @return array|null
	 * @since 23.0.0
	 */
	public function getDetailsById(int $id): ?array;

	/**
	 * set the job that was last ran to the current time
	 *
	 * @param \OCP\BackgroundJob\IJob $job
	 * @since 7.0.0
	 */
	public function setLastJob(IJob $job);

	/**
	 * Remove the reservation for a job
	 *
	 * @param IJob $job
	 * @since 9.1.0
	 */
	public function unlockJob(IJob $job);

	/**
	 * set the lastRun of $job to now
	 *
	 * @param IJob $job
	 * @since 7.0.0
	 */
	public function setLastRun(IJob $job);

	/**
	 * set the run duration of $job
	 *
	 * @param IJob $job
	 * @param $timeTaken
	 * @since 12.0.0
	 */
	public function setExecutionTime(IJob $job, $timeTaken);

	/**
	 * Reset the $job so it executes on the next trigger
	 *
	 * @param IJob $job
	 * @since 23.0.0
	 */
	public function resetBackgroundJob(IJob $job): void;
}
