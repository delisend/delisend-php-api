<?php

namespace DelisendApi\Model;

use \ArrayAccess;
use DelisendApi\Contract\ModelInterface;
use DelisendApi\ObjectSerializer;


/**
 * Class Account
 * @package Delisend\Model
 */
class Account implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = 'classType';

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = 'Account';

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerTypes = [
        'name' => 'string',
        'email' => 'string',
        'tracking_id' => 'string',
        'status' => 'string',
        'stripe_id' => 'string',
        'billing_address' => 'string',
        'billing_address_line_2' => 'string',
        'billing_city' => 'string',
        'billing_state' => 'string',
        'billing_zip' => 'string',
        'billing_country' => 'string',
        'billing_phone' => 'string',
        'billing_email' => 'string',
        'company_name' => 'string',
        'company_id' => 'string',
        'tax_id' => 'string',
        'vat_id' => 'string',
        'trial_ends_at' => 'string',
        'terms' => 'string',
        'newsletter' => 'string',
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerFormats = [
        'name' => null,
        'email' => null,
        'tracking_id' => null,
        'status' => null,
        'stripe_id' => null,
        'billing_address' => null,
        'billing_address_line_2' => null,
        'billing_city' => null,
        'billing_state' => null,
        'billing_zip' => null,
        'billing_country' => null,
        'billing_phone' => null,
        'billing_email' => null,
        'company_name' => null,
        'company_id' => null,
        'tax_id' => null,
        'vat_id' => null,
        'trial_ends_at' => null,
        'terms' => null,
        'newsletter' => null,
    ];


    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'name' => 'name',
        'email' => 'email',
        'tracking_id' => 'tracking_id',
        'status' => 'status',
        'stripe_id' => 'stripe_id',
        'billing_address' => 'billing_address',
        'billing_address_line_2' => 'billing_address_line_2',
        'billing_city' => 'billing_city',
        'billing_state' => 'billing_state',
        'billing_zip' => 'billing_zip',
        'billing_country' => 'billing_country',
        'billing_phone' => 'billing_phone',
        'billing_email' => 'billing_email',
        'company_name' => 'company_name',
        'company_id' => 'company_id',
        'tax_id' => 'tax_id',
        'vat_id' => 'vat_id',
        'trial_ends_at' => 'trial_ends_at',
        'terms' => 'terms',
        'newsletter' => 'newsletter',
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'name' => 'setName',
        'email' => 'setEmail',
        'tracking_id' => 'setTrackingId',
        'status' => 'setStatus',
        'stripe_id' => 'setStripeId',
        'billing_address' => 'setBillingAddress',
        'billing_address_line_2' => 'setBillingAddressLine2',
        'billing_city' => 'setBillingCity',
        'billing_state' => 'setBillingState',
        'billing_zip' => 'setBillingZip',
        'billing_country' => 'setBillingCountry',
        'billing_phone' => 'setBillingPhone',
        'billing_email' => 'setBillingEmail',
        'company_name' => 'setCompanyName',
        'company_id' => 'setCompanyId',
        'tax_id' => 'setTaxId',
        'vat_id' => 'setVatId',
        'terms' => 'setTerms',
        'newsletter' => 'setNewsletter',
    ];


    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }


    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }


    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }


    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }


    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }


    /**
     * Constructor
     *
     * @param array|null $data Associated array of property values initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['email'] = isset($data['email']) ? $data['email'] : null;
        $this->container['tracking_id'] = isset($data['tracking_id']) ? $data['tracking_id'] : null;
        $this->container['stripe_id'] = isset($data['stripe_id']) ? $data['stripe_id'] : null;
        $this->container['billing_address'] = isset($data['billing_address']) ? $data['billing_address'] : null;
        $this->container['billing_address_line_2'] = isset($data['billing_address_line_2']) ? $data['billing_address_line_2'] : null;
        $this->container['billing_city'] = isset($data['billing_city']) ? $data['billing_city'] : null;
        $this->container['billing_state'] = isset($data['billing_state']) ? $data['billing_state'] : null;
        $this->container['billing_zip'] = isset($data['billing_zip']) ? $data['billing_zip'] : null;
        $this->container['billing_country'] = isset($data['billing_country']) ? $data['billing_country'] : null;
        $this->container['billing_phone'] = isset($data['billing_phone']) ? $data['billing_phone'] : null;
        $this->container['billing_email'] = isset($data['billing_email']) ? $data['billing_email'] : null;
        $this->container['company_name'] = isset($data['company_name']) ? $data['company_name'] : null;
        $this->container['company_id'] = isset($data['company_id']) ? $data['company_id'] : null;
        $this->container['tax_id'] = isset($data['tax_id']) ? $data['tax_id'] : null;
        $this->container['vat_id'] = isset($data['vat_id']) ? $data['vat_id'] : null;
        $this->container['terms'] = isset($data['terms']) ? $data['terms'] : null;
        $this->container['newsletter'] = isset($data['newsletter']) ? $data['newsletter'] : null;

        // Initialize discriminator property with the model name.
        $discriminator = array_search('classType', self::$attributeMap, true);
        $this->container[$discriminator] = static::$swaggerModelName;
    }


    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
        }
        if ($this->container['email'] === null) {
            $invalidProperties[] = "'email' can't be null";
        }
        if ($this->container['tracking_id'] === null) {
            $invalidProperties[] = "'tracking_id' can't be null";
        }
        if ($this->container['stripe_id'] === null) {
            $invalidProperties[] = "'stripe_id' can't be null";
        }
        if ($this->container['billing_address'] === null) {
            $invalidProperties[] = "'billing_address' can't be null";
        }
        if ($this->container['billing_address_line_2'] === null) {
            $invalidProperties[] = "'billing_address_line_2' can't be null";
        }
        if ($this->container['billing_city'] === null) {
            $invalidProperties[] = "'billing_city' can't be null";
        }
        if ($this->container['billing_state'] === null) {
            $invalidProperties[] = "'billing_state' can't be null";
        }
        if ($this->container['billing_zip'] === null) {
            $invalidProperties[] = "'billing_zip' can't be null";
        }
        if ($this->container['billing_country'] === null) {
            $invalidProperties[] = "'billing_country' can't be null";
        }
        if ($this->container['billing_phone'] === null) {
            $invalidProperties[] = "'billing_phone' can't be null";
        }
        if ($this->container['billing_email'] === null) {
            $invalidProperties[] = "'billing_email' can't be null";
        }
        if ($this->container['company_name'] === null) {
            $invalidProperties[] = "'company_name' can't be null";
        }
        if ($this->container['company_id'] === null) {
            $invalidProperties[] = "'company_id' can't be null";
        }
        if ($this->container['tax_id'] === null) {
            $invalidProperties[] = "'tax_id' can't be null";
        }
        if ($this->container['vat_id'] === null) {
            $invalidProperties[] = "'vat_id' can't be null";
        }
        if ($this->container['terms'] === null) {
            $invalidProperties[] = "'terms' can't be null";
        }
        if ($this->container['newsletter'] === null) {
            $invalidProperties[] = "'newsletter' can't be null";
        }

        return $invalidProperties;
    }


    /**
     * Gets name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->container['name'];
    }


    /**
     * Sets name
     *
     * @param string $name Client name (first + lastname)
     *
     * @return $this
     */
    public function setName(string $name): Account
    {
        $this->container['name'] = $name;

        return $this;
    }


    /**
     * Gets email
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->container['email'];
    }


    /**
     * Sets email
     *
     * @param string $email Customer email address
     *
     * @return $this
     */
    public function setEmail(string $email): Rating
    {
        $this->container['email'] = $email;

        return $this;
    }


    /**
     * Gets tracking_id
     *
     * @return string
     */
    public function getTrackingId(): string
    {
        return $this->container['tracking_id'];
    }


    /**
     * Sets tracking_id
     *
     * @param string tracking_id Delisend tracking ID
     *
     * @return $this
     */
    public function setTrackingId(string $tracking_id): Account
    {
        $this->container['tracking_id'] = $tracking_id;

        return $this;
    }


    /**
     * Gets stripe_id
     *
     * @return string
     */
    public function getStripeId(): string
    {
        return $this->container['stripe_id'];
    }


    /**
     * Sets stripe_id
     *
     * @param string stripe_id Current Stripe ID plan
     *
     * @return $this
     */
    public function setStripeId(string $stripe_id): Account
    {
        $this->container['stripe_id'] = $stripe_id;

        return $this;
    }


    /**
     * Gets billing_address
     *
     * @return string
     */
    public function getBillingAddress(): string
    {
        return $this->container['billing_address'];
    }


    /**
     * Sets billing_address
     *
     * @param string billing_address Billing address line2
     *
     * @return $this
     */
    public function setBillingAddress(string $billing_address): Account
    {
        $this->container['billing_address'] = $billing_address;

        return $this;
    }


    /**
     * Gets billing_address_line_2
     *
     * @return string
     */
    public function getBillingAddressLine2(): string
    {
        return $this->container['billing_address_line_2'];
    }


    /**
     * Sets billing_address_line_2
     *
     * @param string billing_address_line_2 Billing address line2
     *
     * @return $this
     */
    public function setBillingAddressLine2(string $billing_address_line_2): Account
    {
        $this->container['billing_address_line_2'] = $billing_address_line_2;

        return $this;
    }


    /**
     * Gets billing_city
     *
     * @return string
     */
    public function getBillingCity(): string
    {
        return $this->container['billing_city'];
    }


    /**
     * Sets billing_city
     *
     * @param string billing_city Billing city
     *
     * @return $this
     */
    public function setBillingCity(string $billing_city): Account
    {
        $this->container['billing_city'] = $billing_city;

        return $this;
    }


    /**
     * Gets billing_zip
     *
     * @return string
     */
    public function getBillingState(): string
    {
        return $this->container['billing_state'];
    }


    /**
     * Sets billing_state
     *
     * @param string billing_state Billing state
     *
     * @return $this
     */
    public function setBillingState(string $billing_state): Account
    {
        $this->container['billing_state'] = $billing_state;

        return $this;
    }


    /**
     * Gets billing_zip
     *
     * @return string
     */
    public function getBillingZip(): string
    {
        return $this->container['billing_zip'];
    }


    /**
     * Sets billing_zip
     *
     * @param string billing_zip Billing zip
     *
     * @return $this
     */
    public function setBillingZip(string $billing_zip): Account
    {
        $this->container['billing_zip'] = $billing_zip;

        return $this;
    }


    /**
     * Gets billing_country
     *
     * @return string
     */
    public function getBillingCountry(): string
    {
        return $this->container['billing_country'];
    }


    /**
     * Sets billing_country
     *
     * @param string billing_country Billing country
     *
     * @return $this
     */
    public function setBillingCountry(string $billing_country): Account
    {
        $this->container['billing_country'] = $billing_country;

        return $this;
    }


    /**
     * Gets billing_phone
     *
     * @return string
     */
    public function getBillingPhone(): string
    {
        return $this->container['billing_phone'];
    }


    /**
     * Sets billing_phone
     *
     * @param string billing_phone Phone email address
     *
     * @return $this
     */
    public function setBillingPhone(string $billing_phone): Account
    {
        $this->container['billing_phone'] = $billing_phone;

        return $this;
    }


    /**
     * Gets billing_email
     *
     * @return string
     */
    public function getBillingEmail(): string
    {
        return $this->container['billing_email'];
    }


    /**
     * Sets billing_email
     *
     * @param string billing_email Billing email address
     *
     * @return $this
     */
    public function setBillingEmail(string $billing_email): Account
    {
        $this->container['billing_email'] = $billing_email;

        return $this;
    }


    /**
     * Gets company_name
     *
     * @return string
     */
    public function getCompanyName(): string
    {
        return $this->container['company_name'];
    }


    /**
     * Sets company_name
     *
     * @param string company_name Company name
     *
     * @return $this
     */
    public function setCompanyName(string $company_name): Account
    {
        $this->container['company_name'] = $company_name;

        return $this;
    }


    /**
     * Gets company_id
     *
     * @return string
     */
    public function getCompanyId(): string
    {
        return $this->container['company_id'];
    }


    /**
     * Sets company_id
     *
     * @param string $company_id Company registration number
     *
     * @return $this
     */
    public function setCompanyId(string $company_id): Account
    {
        $this->container['company_id'] = $company_id;

        return $this;
    }


    /**
     * Gets tax_id
     *
     * @return string
     */
    public function getTaxId(): string
    {
        return $this->container['tax_id'];
    }


    /**
     * Sets tax_id
     *
     * @param string $tax_id Tax ID numbers
     *
     * @return $this
     */
    public function setTaxId(string $tax_id): Account
    {
        $this->container['tax_id'] = $tax_id;

        return $this;
    }


    /**
     * Gets vat_id
     *
     * @return string
     */
    public function getVatId(): string
    {
        return $this->container['vat_id'];
    }


    /**
     * Sets vat_id
     *
     * @param string $vat_id VAT identification numbers
     *
     * @return $this
     */
    public function setVatId(string $vat_id): Account
    {
        $this->container['vat_id'] = $vat_id;

        return $this;
    }


    /**
     * Gets terms
     *
     * @return string
     */
    public function getTerms(): string
    {
        return $this->container['terms'];
    }


    /**
     * Sets terms
     *
     * @param string $terms I Agree to Terms
     *
     * @return $this
     */
    public function setTerms(string $terms): Account
    {
        $this->container['terms'] = $terms;

        return $this;
    }


    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid(): bool
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }


    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }


    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }


    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }


    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString(): string
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
