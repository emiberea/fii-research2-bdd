<?php

namespace EB\AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Admission
 *
 * @ORM\Entity(repositoryClass="EB\AppBundle\Repository\AdmissionRepository")
 * @ORM\Table(name="admission")
 */
class Admission
{
    const STATUS_OPEN = 0;
    const STATUS_PROCESSING = 1;
    const STATUS_CLOSED = 2;

    public static $statusArr = [
        self::STATUS_OPEN => 'Open',
        self::STATUS_PROCESSING => 'Processing',
        self::STATUS_CLOSED => 'Closed',
    ];

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="session_date", type="date")
     */
    private $sessionDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="budget_financed_no", type="integer")
     */
    private $budgetFinancedNo;

    /**
     * @var integer
     *
     * @ORM\Column(name="fee_payer_no", type="integer")
     */
    private $feePayerNo;

    /**
     * @var float
     *
     * @ORM\Column(name="budget_fee_threshold", type="decimal", precision=4, scale=2, nullable=true)
     */
    private $budgetFeeThreshold;

    /**
     * @var float
     *
     * @ORM\Column(name="fee_rejected_threshold", type="decimal", precision=4, scale=2, nullable=true)
     */
    private $feeRejectedThreshold;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="closed_at", type="datetime", nullable=true)
     */
    private $closedAt;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Student", mappedBy="admission", cascade={"persist", "remove"})
     */
    private $students;


    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->status = self::STATUS_OPEN;
        $this->students = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->sessionDate->format('Y-m-d') . ' (' . $this->budgetFinancedNo . '/' . $this->feePayerNo . ')';
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
     * @return \DateTime
     */
    public function getSessionDate()
    {
        return $this->sessionDate;
    }

    /**
     * @param \DateTime $sessionDate
     * @return $this
     */
    public function setSessionDate($sessionDate)
    {
        $this->sessionDate = $sessionDate;

        return $this;
    }

    /**
     * @return int
     */
    public function getBudgetFinancedNo()
    {
        return $this->budgetFinancedNo;
    }

    /**
     * @param int $budgetFinancedNo
     * @return $this
     */
    public function setBudgetFinancedNo($budgetFinancedNo)
    {
        $this->budgetFinancedNo = $budgetFinancedNo;

        return $this;
    }

    /**
     * @return int
     */
    public function getFeePayerNo()
    {
        return $this->feePayerNo;
    }

    /**
     * @param int $feePayerNo
     * @return $this
     */
    public function setFeePayerNo($feePayerNo)
    {
        $this->feePayerNo = $feePayerNo;

        return $this;
    }

    /**
     * @return float
     */
    public function getBudgetFeeThreshold()
    {
        return $this->budgetFeeThreshold;
    }

    /**
     * @param float $budgetFeeThreshold
     * @return $this
     */
    public function setBudgetFeeThreshold($budgetFeeThreshold)
    {
        $this->budgetFeeThreshold = $budgetFeeThreshold;

        return $this;
    }

    /**
     * @return float
     */
    public function getFeeRejectedThreshold()
    {
        return $this->feeRejectedThreshold;
    }

    /**
     * @param float $feeRejectedThreshold
     * @return $this
     */
    public function setFeeRejectedThreshold($feeRejectedThreshold)
    {
        $this->feeRejectedThreshold = $feeRejectedThreshold;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getClosedAt()
    {
        return $this->closedAt;
    }

    /**
     * @param \DateTime $closedAt
     * @return $this
     */
    public function setClosedAt($closedAt)
    {
        $this->closedAt = $closedAt;

        return $this;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getStudents()
    {
        return $this->students;
    }

    /**
     * @param Student $student
     * @return $this
     */
    public function addStudent($student)
    {
        $this->students->add($student);

        return $this;
    }

    /**
     * @param Student $student
     * @return $this
     */
    public function removeStudent($student)
    {
        $this->students->removeElement($student);

        return $this;
    }
}
