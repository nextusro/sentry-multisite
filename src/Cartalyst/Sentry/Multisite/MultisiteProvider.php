<?php namespace Cartalyst\Sentry\Multisite;
/**
 * part of the sentry package.
 *
 * notice of license
 *
 * licensed under the 3-clause bsd license.
 *
 * this source file is subject to the 3-clause bsd license that is
 * bundled with this package in the license file.  it is also available at
 * the following url: http://www.opensource.org/licenses/bsd-3-clause
 *
 * @package    sentry
 * @version    2.0.0
 * @author     cartalyst llc
 * @license    bsd license (3-clause)
 * @copyright  (c) 2011 - 2013, cartalyst llc
 * @ink       http://cartalyst.com
 */


class MultisiteProvider implements MultisiteProviderInterface {

    /**
     * The key used in the Multisite.
     *
     * @var string
     */
    protected $mskey = 'app_id';

    /**
     * The value used in the Multisite.
     *
     * @var string
     */
    protected $msvalue = 1;

    /**
     * Creates a new Illuminate based Multisite for Sentry.
     *
     * @param  string  $mskey
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->mskey = Config::get('cartalyst/sentry::multisite.key');
        $this->msvalue = Config::get('cartalyst/sentry::multisite.value');
    }

    /**
     * Returns the multisite key.
     *
     * @return string
     */
    public function getMultisiteKey()
    {
        return $this->mskey;
    }

    /**
     * Returns the multisite value.
     *
     * @return string
     */
    public function getMultisiteValue()
    {
        return $this->msvalue;
    }

}
