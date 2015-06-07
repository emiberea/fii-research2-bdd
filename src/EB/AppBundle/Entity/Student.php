<?php

namespace EB\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Student
 *
 * @ORM\Entity(repositoryClass="EB\AppBundle\Repository\StudentRepository")
 * @ORM\Table(name="student")
 */
class Student
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="father_initial", type="string", length=255)
     */
    private $fatherInitial;

    /**
     * @var string
     *
     * @ORM\Column(name="pin", type="string", length=255)
     */
    private $pin;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="high_school", type="string", length=255)
     */
    private $highSchool;

    /**
     * @var string
     *
     * @ORM\Column(name="specialization", type="string", length=255)
     */
    private $specialization;

    /**
     * @var float
     *
     * @ORM\Column(name="admission_exam_grade", type="decimal", precision=4, scale=2)
     */
    private $admissionExamGrade;

    /**
     * @var float
     *
     * @ORM\Column(name="baccalaureate_average_grade", type="decimal", precision=4, scale=2)
     */
    private $baccalaureateAverageGrade;

    /**
     * @var float
     *
     * @ORM\Column(name="baccalaureate_maximum_grade", type="decimal", precision=4, scale=2)
     */
    private $baccalaureateMaximumGrade;

    /**
     * @var float
     *
     * @ORM\Column(name="final_grade", type="decimal", precision=4, scale=2)
     */
    private $finalGrade;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var Admission
     *
     * @ORM\ManyToOne(targetEntity="Admission", inversedBy="students")
     */
    private $admission;


    public function __construct()
    {
        $this->createdAt = new \DateTime();
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
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return $this
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return $this
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string
     */
    public function getFatherInitial()
    {
        return $this->fatherInitial;
    }

    /**
     * @param string $fatherInitial
     * @return $this
     */
    public function setFatherInitial($fatherInitial)
    {
        $this->fatherInitial = $fatherInitial;

        return $this;
    }

    /**
     * @return string
     */
    public function getPin()
    {
        return $this->pin;
    }

    /**
     * @param string $pin
     * @return $this
     */
    public function setPin($pin)
    {
        $this->pin = $pin;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return $this
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return $this
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return string
     */
    public function getHighSchool()
    {
        return $this->highSchool;
    }

    /**
     * @param string $highSchool
     * @return $this
     */
    public function setHighSchool($highSchool)
    {
        $this->highSchool = $highSchool;

        return $this;
    }

    /**
     * @return string
     */
    public function getSpecialization()
    {
        return $this->specialization;
    }

    /**
     * @param string $specialization
     * @return $this
     */
    public function setSpecialization($specialization)
    {
        $this->specialization = $specialization;

        return $this;
    }

    /**
     * @return float
     */
    public function getAdmissionExamGrade()
    {
        return $this->admissionExamGrade;
    }

    /**
     * @param float $admissionExamGrade
     * @return $this
     */
    public function setAdmissionExamGrade($admissionExamGrade)
    {
        $this->admissionExamGrade = $admissionExamGrade;

        return $this;
    }

    /**
     * @return float
     */
    public function getBaccalaureateAverageGrade()
    {
        return $this->baccalaureateAverageGrade;
    }

    /**
     * @param float $baccalaureateAverageGrade
     * @return $this
     */
    public function setBaccalaureateAverageGrade($baccalaureateAverageGrade)
    {
        $this->baccalaureateAverageGrade = $baccalaureateAverageGrade;

        return $this;
    }

    /**
     * @return float
     */
    public function getBaccalaureateMaximumGrade()
    {
        return $this->baccalaureateMaximumGrade;
    }

    /**
     * @param float $baccalaureateMaximumGrade
     * @return $this
     */
    public function setBaccalaureateMaximumGrade($baccalaureateMaximumGrade)
    {
        $this->baccalaureateMaximumGrade = $baccalaureateMaximumGrade;

        return $this;
    }

    /**
     * @return float
     */
    public function getFinalGrade()
    {
        return $this->finalGrade;
    }

    /**
     * @param float $finalGrade
     * @return $this
     */
    public function setFinalGrade($finalGrade)
    {
        $this->finalGrade = $finalGrade;

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
     * @return Admission
     */
    public function getAdmission()
    {
        return $this->admission;
    }

    /**
     * @param Admission $admission
     * @return $this
     */
    public function setAdmission($admission)
    {
        $this->admission = $admission;

        return $this;
    }
}
