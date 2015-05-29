<?php

namespace Acme\WakkoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Schedule
 *
 * @ORM\Table(
 *  name="Schedule",
 *  indexes={
 *      @ORM\Index(name="idx_user_id", columns={"user_id"}),
 *  }
 * )
 * @ORM\Entity(repositoryClass="Acme\WakkoBundle\Repository\ScheduleRepository")
 */
class Schedule
{
    /**
     * Use constants to define configuration options that rarely change instead
     * of specifying them in app/config/config.yml.
     * See http://symfony.com/doc/current/best_practices/configuration.html#constants-vs-configuration-options
     */
    const NUM_ITEMS = 10;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="schedule_time", type="datetime", nullable=false)
     */
    private $scheduleTime;

    /**
     * @var \Customer
     *
     * @ORM\ManyToOne(targetEntity="Customer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     * })
     */
    private $customer;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;



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
     * Set scheduleTime
     *
     * @param \DateTime $scheduleTime
     * @return Schedule
     */
    public function setScheduleTime($scheduleTime)
    {
        $this->scheduleTime = $scheduleTime;

        return $this;
    }

    /**
     * Get scheduleTime
     *
     * @return \DateTime
     */
    public function getScheduleTime()
    {
        return $this->scheduleTime;
    }

    /**
     * Set customer
     *
     * @param \Acme\WakkoBundle\Entity\Customer $customer
     * @return Schedule
     */
    public function setCustomer(\Acme\WakkoBundle\Entity\Customer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \Acme\WakkoBundle\Entity\Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set user
     *
     * @param \Acme\WakkoBundle\Entity\User $user
     * @return Schedule
     */
    public function setUser(\Acme\WakkoBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Acme\WakkoBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
