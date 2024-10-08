<?php

declare(strict_types=1);
/**
 * SPDX-FileCopyrightText: 2023 Nextcloud GmbH and Nextcloud contributors
 * SPDX-License-Identifier: AGPL-3.0-or-later
 */
namespace OCP\Http\Client;

use Exception;
use LogicException;

/**
 * A wrapper around Guzzle's PromiseInterface
 * @see \GuzzleHttp\Promise\PromiseInterface
 * @since 28.0.0
 */
interface IPromise {
	/**
	 * @since 28.0.0
	 */
	public const STATE_PENDING = 'pending';
	/**
	 * @since 28.0.0
	 */
	public const STATE_FULFILLED = 'fulfilled';
	/**
	 * @since 28.0.0
	 */
	public const STATE_REJECTED = 'rejected';

	/**
	 * Appends fulfillment and rejection handlers to the promise, and returns
	 * a new promise resolving to the return value of the called handler.
	 *
	 * @param ?callable(IResponse): void $onFulfilled Invoked when the promise fulfills. Gets an \OCP\Http\Client\IResponse passed in as argument
	 * @param ?callable(Exception): void $onRejected Invoked when the promise is rejected. Gets an \Exception passed in as argument
	 *
	 * @return IPromise
	 * @since 28.0.0
	 */
	public function then(
		?callable $onFulfilled = null,
		?callable $onRejected = null,
	): IPromise;

	/**
	 * Get the state of the promise ("pending", "rejected", or "fulfilled").
	 *
	 * The three states can be checked against the constants defined:
	 * STATE_PENDING, STATE_FULFILLED, and STATE_REJECTED.
	 *
	 * @return self::STATE_*
	 * @since 28.0.0
	 */
	public function getState(): string;

	/**
	 * Cancels the promise if possible.
	 *
	 * @link https://github.com/promises-aplus/cancellation-spec/issues/7
	 * @since 28.0.0
	 */
	public function cancel(): void;

	/**
	 * Waits until the promise completes if possible.
	 *
	 * Pass $unwrap as true to unwrap the result of the promise, either
	 * returning the resolved value or throwing the rejected exception.
	 *
	 * If the promise cannot be waited on, then the promise will be rejected.
	 *
	 * @param bool $unwrap
	 *
	 * @return mixed
	 *
	 * @throws LogicException if the promise has no wait function or if the
	 *                        promise does not settle after waiting.
	 * @since 28.0.0
	 */
	public function wait(bool $unwrap = true): mixed;
}
