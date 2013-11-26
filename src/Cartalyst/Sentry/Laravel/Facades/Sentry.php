<?php namespace Cartalyst\Sentry\Laravel\Facades;
/**
 * Part of the Sentry package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.  It is also available at
 * the following URL: http://www.opensource.org/licenses/BSD-3-Clause
 *
 * @package    Sentry
 * @version    3.0.0
 * @author     Cartalyst LLC
 * @license    BSD License (3-clause)
 * @copyright  (c) 2011 - 2013, Cartalyst LLC
 * @link       http://cartalyst.com
 */

use Illuminate\Support\Facades\Facade;

class Sentry extends Facade {

	/**
	 * Attempt to authenticate using HTTP Basic Auth.
	 *
	 * @param  string  $field
	 * @return \Cartalyst\Sentry\Users\UserInterface|bool
	 */
	public static function basic()
	{
		$user = static::$app['sentry']->getUserWithoutCheck();

		if ($user)
		{
			return $user;
		}

		$request = static::$app['request'];

		$credentials = array(
			'login' => $request->getUser(),
			'password' => $request->getPassword(),
		);

		return static::$app['sentry']->stateless($credentials);
	}

	/**
	 * {@inheritDoc}
	 */
	protected static function getFacadeAccessor()
	{
		return 'sentry';
	}

}