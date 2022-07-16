<?php

namespace OC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo; // à ne pas oublier (cf doctrine extensions)
use Symfony\Component\Validator\Constraints as Assert; // !important pour définir le namespace pour les annotations de validation

/**
 * Advert
 *
 * @ORM\Table(name="oc_advert")
 * @ORM\Entity(repositoryClass="OC\PlatformBundle\Repository\AdvertRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Advert
{
	use Hydrater;
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $_id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     * @Assert\Length(min=10)
     */
    private $_title;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=255)
     * @Assert\Length(min=2)
     */
    private $_author;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     * @Assert\NotBlank()
     */
   
    private $_content;
    
    /**
     * @ORM\Column(name="date_publication", type="date", nullable=false)
     * @Assert\DateTime()
     */
    private $_datePublication;
    
    /**
     * @ORM\Column(name="published", type="boolean")
     */
    
    private $_published = true;
    
    /**
     * @ORM\OneToOne(targetEntity="OC\PlatformBundle\Entity\Image", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="image_id")
     * @Assert\Valid()
     */
    private $_image;
    
    /**
     * @ORM\ManyToMany(targetEntity="OC\PlatformBundle\Entity\Category", cascade={"persist"})
     * @ORM\JoinTable(name="oc_advert_category")
     */
    private $_categories;
    
    /**
     * @ORM\OneToMany(targetEntity="OC\PlatformBundle\Entity\Application", mappedBy="_advert")
     */
    private $_applications;
    
    /**
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $_updatedAt;
    
    /**
     * @ORM\Column(name="nb_applications", type="integer")
     */
    private $_nbApplications = 0;
    
    /**
     * @ORM\Column(name="email", type="string", length=150, nullable=true)
     */
    private $_email;
    
    /**
     * @Gedmo\Slug(fields={"_title"})
     * @ORM\Column(name="slug", type="string", length=255, unique=true)
     */
    private $_slug;
    
    /**
     * @ORM\OneToMany(targetEntity="OC\PlatformBundle\Entity\AdvertSkill", mappedBy="_advert")
     */
    private $_advertSkills;
    
    public function __construct(array $data = array()) {
        $this->_datePublication = new \DateTime();
        if(!empty($data))
        	$this->hydrate($data);
    }
}
