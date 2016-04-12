<?php

namespace Acme\Bundle\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Acme\Bundle\ProductBundle\Entity\Product;

/**
 * Serie
 */
class Serie
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="serie", cascade={"persist", "remove"})
     */
    protected $products;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Serie
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add products
     *
     * @param \Acme\Bundle\ProductBundle\Entity\Product $products
     * @return Serie
     */
    public function addProduct(\Acme\Bundle\ProductBundle\Entity\Product $products)
    {
        $this->products[] = $products;

        return $this;
    }

    /**
     * Remove products
     *
     * @param \Acme\Bundle\ProductBundle\Entity\Product $products
     */
    public function removeProduct(\Acme\Bundle\ProductBundle\Entity\Product $products)
    {
        $this->products->removeElement($products);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProducts()
    {
        return $this->products;
    }
}
