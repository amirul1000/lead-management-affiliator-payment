<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account\Sip\Domain;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

class IpAccessControlListMappingContext extends InstanceContext {
    /**
     * Initialize the IpAccessControlListMappingContext
     *
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $accountSid The unique id of the Account that is responsible
     *                           for this resource.
     * @param string $domainSid A string that uniquely identifies the SIP Domain
     * @param string $sid A 34 character string that uniquely identifies the
     *                    resource to fetch.
     * @return \Twilio\Rest\Api\V2010\Account\Sip\Domain\IpAccessControlListMappingContext
     */
    public function __construct(Version $version, $accountSid, $domainSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('accountSid' => $accountSid, 'domainSid' => $domainSid, 'sid' => $sid, );

        $this->uri = '/Accounts/' . rawurlencode($accountSid) . '/SIP/Domains/' . rawurlencode($domainSid) . '/IpAccessControlListMappings/' . rawurlencode($sid) . '.json';
    }

    /**
     * Fetch a IpAccessControlListMappingInstance
     *
     * @return IpAccessControlListMappingInstance Fetched
     *                                            IpAccessControlListMappingInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new IpAccessControlListMappingInstance(
            $this->version,
            $payload,
            $this->solution['accountSid'],
            $this->solution['domainSid'],
            $this->solution['sid']
        );
    }

    /**
     * Deletes the IpAccessControlListMappingInstance
     *
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->version->delete('delete', $this->uri);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Api.V2010.IpAccessControlListMappingContext ' . implode(' ', $context) . ']';
    }
}