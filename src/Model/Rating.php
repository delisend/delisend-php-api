<?php

namespace DelisendApi\Model;

use \ArrayAccess;
use DelisendApi\Contract\ModelInterface;
use DelisendApi\ObjectSerializer;


/**
 * Class Account
 * @package Delisend\Model
 */
class Rating implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = 'classType';

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = 'Rating';

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
        'order_id' => 'string',
        'client_id' => 'string',
        'firstname' => 'string',
        'lastname' => 'string',
        'address' => 'string',
        'zip' => 'string',
        'customer_ip' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'type' => 'string',
        'user_agent' => 'string',
        'payment_method' => 'string',
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerFormats = [
        'order_id' => null,
        'client_id' => null,
        'firstname' => null,
        'lastname' => null,
        'address' => null,
        'zip' => null,
        'customer_ip' => null,
        'email' => null,
        'phone' => null,
        'type' => null,
        'user_agent' => null,
        'payment_method' => null,
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'order_id' => 'order_id',
        'client_id' => 'client_id',
        'firstname' => 'firstname',
        'lastname' => 'lastname',
        'address' => 'address',
        'zip' => 'zip',
        'customer_ip' => 'customer_ip',
        'email' => 'email',
        'phone' => 'phone',
        'type' => 'type',
        'user_agent' => 'user_agent',
        'payment_method' => 'payment_method',
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'order_id' => 'setOrderId',
        'client_id' => 'setClientId',
        'firstname' => 'setFirstName',
        'lastname' => 'setLastName',
        'address' => 'setAddress',
        'zip' => 'setZip',
        'customer_ip' => 'setCustomerIp',
        'email' => 'setEmail',
        'phone' => 'setPhone',
        'type' => 'setType',
        'user_agent' => 'setUserAgent',
        'payment_method' => 'setPaymentMethod',
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'order_id' => 'getOrderId',
        'client_id' => 'getClientId',
        'firstname' => 'getFirstName',
        'lastname' => 'getLastName',
        'address' => 'getAddress',
        'zip' => 'getZip',
        'customer_ip' => 'getCustomerIp',
        'email' => 'getEmail',
        'phone' => 'getPhone',
        'type' => 'getType',
        'user_agent' => 'getUserAgent',
        'payment_method' => 'getPaymentMethod',
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
        $this->container['order_id'] = isset($data['order_id']) ? $data['order_id'] : null;
        $this->container['client_id'] = isset($data['client_id']) ? $data['client_id'] : null;
        $this->container['firstname'] = isset($data['firstname']) ? $data['firstname'] : null;
        $this->container['lastname'] = isset($data['lastname']) ? $data['lastname'] : null;
        $this->container['address'] = isset($data['address']) ? $data['address'] : null;
        $this->container['zip'] = isset($data['zip']) ? $data['zip'] : null;
        $this->container['customer_ip'] = isset($data['customer_ip']) ? $data['customer_ip'] : null;
        $this->container['email'] = isset($data['email']) ? $data['email'] : null;
        $this->container['phone'] = isset($data['phone']) ? $data['phone'] : null;
        $this->container['type'] = isset($data['type']) ? $data['type'] : null;
        $this->container['user_agent'] = isset($data['user_agent']) ? $data['user_agent'] : null;
        $this->container['payment_method'] = isset($data['payment_method']) ? $data['payment_method'] : null;

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

        if ($this->container['order_id'] === null) {
            $invalidProperties[] = "'order_id' can't be null";
        }
        if ($this->container['client_id'] === null) {
            $invalidProperties[] = "'client_id' can't be null";
        }
        if ($this->container['firstname'] === null) {
            $invalidProperties[] = "'firstname' can't be null";
        }
        if ($this->container['lastname'] === null) {
            $invalidProperties[] = "'lastname' can't be null";
        }
        if ($this->container['address'] === null) {
            $invalidProperties[] = "'address' can't be null";
        }
        if ($this->container['zip'] === null) {
            $invalidProperties[] = "'zip' can't be null";
        }
        if ($this->container['customer_ip'] === null) {
            $invalidProperties[] = "'customer_ip' can't be null";
        }
        if ($this->container['email'] === null) {
            $invalidProperties[] = "'email' can't be null";
        }
        if ($this->container['phone'] === null) {
            $invalidProperties[] = "'phone' can't be null";
        }

        return $invalidProperties;
    }


    /**
     * Gets order_id
     *
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->container['order_id'];
    }


    /**
     * Sets order_id
     *
     * @param string $order_id Order identifier
     *
     * @return $this
     */
    public function setOrderId(string $order_id): Rating
    {
        $this->container['order_id'] = $order_id;

        return $this;
    }


    /**
     * Gets client_id
     *
     * @return string
     */
    public function getClientId(): string
    {
        return $this->container['client_id'];
    }


    /**
     * Sets client_id
     *
     * @param string $client_id Customer identifier
     *
     * @return $this
     */
    public function setClientId($client_id): Rating
    {
        $this->container['client_id'] = $client_id;

        return $this;
    }


    /**
     * Gets firstname
     *
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->container['firstname'];
    }


    /**
     * Sets firstname
     *
     * @param string $firstname Customer first name
     *
     * @return $this
     */
    public function setFirstName(string $firstname): Rating
    {
        $this->container['firstname'] = $firstname;

        return $this;
    }


    /**
     * Gets lastname
     *
     * @return string
     */
    public function getLastName(): string
    {
        return $this->container['lastname'];
    }


    /**
     * Sets lastname
     *
     * @param string $lastname Customer last name
     *
     * @return $this
     */
    public function setLastName(string $lastname): Rating
    {
        $this->container['lastname'] = $lastname;

        return $this;
    }


    /**
     * Gets address
     *
     * @return string
     */
    public function getAddress(): string
    {
        return $this->container['address'];
    }


    /**
     * Sets address
     *
     * @param string $address Customer address
     *
     * @return $this
     */
    public function setAddress(string $address): Rating
    {
        $this->container['address'] = $address;

        return $this;
    }


    /**
     * Gets zip
     *
     * @return string
     */
    public function getZip(): string
    {
        return $this->container['zip'];
    }


    /**
     * Sets zip
     *
     * @param string $zip Customer zip code
     *
     * @return $this
     */
    public function setZip(string $zip): Rating
    {
        $this->container['zip'] = $zip;

        return $this;
    }


    /**
     * Gets customer_ip
     *
     * @return string
     */
    public function getCustomerIp(): string
    {
        return $this->container['customer_ip'];
    }


    /**
     * Sets customer_ip
     *
     * @param string $customer_ip Customer IP address
     *
     * @return $this
     */
    public function setCustomerIp(string $customer_ip): Rating
    {
        $this->container['customer_ip'] = $customer_ip;

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
     * Gets phone
     *
     * @return string
     */
    public function getPhone(): string
    {
        return $this->container['phone'];
    }


    /**
     * Sets phone
     *
     * @param string $phone Customer phone address
     *
     * @return $this
     */
    public function setPhone(string $phone): Rating
    {
        $this->container['phone'] = $phone;

        return $this;
    }


    /**
     * Gets type
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->container['type'];
    }


    /**
     * Sets type
     *
     * @param string $type Set type of rating
     *
     * @return $this
     */
    public function setType(string $type): Rating
    {
        $this->container['type'] = $type;

        return $this;
    }


    /**
     * Gets user_agent
     *
     * @return string
     */
    public function getUserAgent(): string
    {
        return $this->container['user_agent'];
    }


    /**
     * Sets user_agent
     *
     * @param string $user_agent Set Customer browser's user-agent
     *
     * @return $this
     */
    public function setUserAgent(string $user_agent): Rating
    {
        $this->container['user_agent'] = $user_agent;

        return $this;
    }


    /**
     * Gets payment_method
     *
     * @return string
     */
    public function getPaymentMethod(): string
    {
        return $this->container['payment_method'];
    }


    /**
     * Sets payment_method
     *
     * @param string $payment_method Set Indication of payment from the customer
     *
     * @return $this
     */
    public function setPaymentMethod(string $payment_method): Rating
    {
        $this->container['payment_method'] = $payment_method;

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
