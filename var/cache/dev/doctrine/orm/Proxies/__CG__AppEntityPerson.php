<?php

namespace Proxies\__CG__\App\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Person extends \App\Entity\Person implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Proxy\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = [];



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Person' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Person' . "\0" . 'lastname', '' . "\0" . 'App\\Entity\\Person' . "\0" . 'firstname', '' . "\0" . 'App\\Entity\\Person' . "\0" . 'zipCode', '' . "\0" . 'App\\Entity\\Person' . "\0" . 'city', '' . "\0" . 'App\\Entity\\Person' . "\0" . 'roadNumber', '' . "\0" . 'App\\Entity\\Person' . "\0" . 'roadName', '' . "\0" . 'App\\Entity\\Person' . "\0" . 'birthday', '' . "\0" . 'App\\Entity\\Person' . "\0" . 'sex', '' . "\0" . 'App\\Entity\\Person' . "\0" . 'accounts', '' . "\0" . 'App\\Entity\\Person' . "\0" . 'beneficiaire'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Person' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Person' . "\0" . 'lastname', '' . "\0" . 'App\\Entity\\Person' . "\0" . 'firstname', '' . "\0" . 'App\\Entity\\Person' . "\0" . 'zipCode', '' . "\0" . 'App\\Entity\\Person' . "\0" . 'city', '' . "\0" . 'App\\Entity\\Person' . "\0" . 'roadNumber', '' . "\0" . 'App\\Entity\\Person' . "\0" . 'roadName', '' . "\0" . 'App\\Entity\\Person' . "\0" . 'birthday', '' . "\0" . 'App\\Entity\\Person' . "\0" . 'sex', '' . "\0" . 'App\\Entity\\Person' . "\0" . 'accounts', '' . "\0" . 'App\\Entity\\Person' . "\0" . 'beneficiaire'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Person $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId(): ?int
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getLastname(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLastname', []);

        return parent::getLastname();
    }

    /**
     * {@inheritDoc}
     */
    public function setLastname(string $lastname): \App\Entity\Person
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLastname', [$lastname]);

        return parent::setLastname($lastname);
    }

    /**
     * {@inheritDoc}
     */
    public function getFirstname(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFirstname', []);

        return parent::getFirstname();
    }

    /**
     * {@inheritDoc}
     */
    public function setFirstname(string $firstname): \App\Entity\Person
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFirstname', [$firstname]);

        return parent::setFirstname($firstname);
    }

    /**
     * {@inheritDoc}
     */
    public function getZipCode(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getZipCode', []);

        return parent::getZipCode();
    }

    /**
     * {@inheritDoc}
     */
    public function setZipCode(int $zipCode): \App\Entity\Person
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setZipCode', [$zipCode]);

        return parent::setZipCode($zipCode);
    }

    /**
     * {@inheritDoc}
     */
    public function getCity(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCity', []);

        return parent::getCity();
    }

    /**
     * {@inheritDoc}
     */
    public function setCity(string $city): \App\Entity\Person
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCity', [$city]);

        return parent::setCity($city);
    }

    /**
     * {@inheritDoc}
     */
    public function getRoadNumber(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRoadNumber', []);

        return parent::getRoadNumber();
    }

    /**
     * {@inheritDoc}
     */
    public function setRoadNumber(?int $roadNumber): \App\Entity\Person
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRoadNumber', [$roadNumber]);

        return parent::setRoadNumber($roadNumber);
    }

    /**
     * {@inheritDoc}
     */
    public function getRoadName(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRoadName', []);

        return parent::getRoadName();
    }

    /**
     * {@inheritDoc}
     */
    public function setRoadName(string $roadName): \App\Entity\Person
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRoadName', [$roadName]);

        return parent::setRoadName($roadName);
    }

    /**
     * {@inheritDoc}
     */
    public function getBirthday(): ?\DateTimeInterface
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBirthday', []);

        return parent::getBirthday();
    }

    /**
     * {@inheritDoc}
     */
    public function setBirthday(\DateTimeInterface $birthday): \App\Entity\Person
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBirthday', [$birthday]);

        return parent::setBirthday($birthday);
    }

    /**
     * {@inheritDoc}
     */
    public function getSex(): ?bool
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSex', []);

        return parent::getSex();
    }

    /**
     * {@inheritDoc}
     */
    public function setSex(bool $sex): \App\Entity\Person
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSex', [$sex]);

        return parent::setSex($sex);
    }

    /**
     * {@inheritDoc}
     */
    public function getAccounts(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAccounts', []);

        return parent::getAccounts();
    }

    /**
     * {@inheritDoc}
     */
    public function addAccount(\App\Entity\Account $account): \App\Entity\Person
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addAccount', [$account]);

        return parent::addAccount($account);
    }

    /**
     * {@inheritDoc}
     */
    public function removeAccount(\App\Entity\Account $account): \App\Entity\Person
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeAccount', [$account]);

        return parent::removeAccount($account);
    }

    /**
     * {@inheritDoc}
     */
    public function getBeneficiaire(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBeneficiaire', []);

        return parent::getBeneficiaire();
    }

    /**
     * {@inheritDoc}
     */
    public function addBeneficiaire(\App\Entity\Account $beneficiaire): \App\Entity\Person
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addBeneficiaire', [$beneficiaire]);

        return parent::addBeneficiaire($beneficiaire);
    }

    /**
     * {@inheritDoc}
     */
    public function removeBeneficiaire(\App\Entity\Account $beneficiaire): \App\Entity\Person
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeBeneficiaire', [$beneficiaire]);

        return parent::removeBeneficiaire($beneficiaire);
    }

}
