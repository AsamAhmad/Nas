<?php

namespace App\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 * @Vich\Uploadable
 */
class Produit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="datetime")
     * @var DateTime
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $applicationDiagram;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $specification;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $technicalSPE;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $protocol;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $security;

    /**
     * @ORM\Column(type="boolean")
     */
    private $spotlight;

    /**
     * @ORM\Column(type="boolean")
     */
    private $special;

    /**
     * @ORM\Column(type="boolean")
     */
    private $promotion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reference;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $barCode;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $active;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $marque;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fournisseur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categorie", inversedBy="produit")
     */
    private $categorie;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Document", inversedBy="produits")
     */
    private $documents;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Image", mappedBy="produit")
     */
    private $images;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image1")
     * @var File
     */
    private $imageFile1;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image2")
     * @var File
     */
    private $imageFile2;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image3")
     * @var File
     */
    private $imageFile3;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image4")
     * @var File
     */
    private $imageFile4;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image5")
     * @var File
     */
    private $imageFile5;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image6")
     * @var File
     */
    private $imageFile6;


    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image7")
     * @var File
     */
    private $imageFile7;

    /**
     * @ORM\Column(type="string", length=255)
     *@var string
     */
    private $image1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image4;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image5;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image6;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image7;

    public function __construct()
    {
        $this->documents = new ArrayCollection();
        $this->images = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getApplicationDiagram(): ?string
    {
        return $this->applicationDiagram;
    }

    public function setApplicationDiagram(?string $applicationDiagram): self
    {
        $this->applicationDiagram = $applicationDiagram;

        return $this;
    }

    public function getSpecification(): ?string
    {
        return $this->specification;
    }

    public function setSpecification(?string $specification): self
    {
        $this->specification = $specification;

        return $this;
    }

    public function getTechnicalSPE(): ?string
    {
        return $this->technicalSPE;
    }

    public function setTechnicalSPE(?string $technicalSPE): self
    {
        $this->technicalSPE = $technicalSPE;

        return $this;
    }

    public function getProtocol(): ?string
    {
        return $this->protocol;
    }

    public function setProtocol(?string $protocol): self
    {
        $this->protocol = $protocol;

        return $this;
    }

    public function getSecurity(): ?string
    {
        return $this->security;
    }

    public function setSecurity(?string $security): self
    {
        $this->security = $security;

        return $this;
    }

    public function getSpotlight(): ?bool
    {
        return $this->spotlight;
    }

    public function setSpotlight(bool $spotlight): self
    {
        $this->spotlight = $spotlight;

        return $this;
    }

    public function getSpecial(): ?bool
    {
        return $this->special;
    }

    public function setSpecial(bool $special): self
    {
        $this->special = $special;

        return $this;
    }

    public function getPromotion(): ?string
    {
        return $this->promotion;
    }

    public function setPromotion(string $promotion): self
    {
        $this->promotion = $promotion;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getBarCode(): ?string
    {
        return $this->barCode;
    }

    public function setBarCode(?string $barCode): self
    {
        $this->barCode = $barCode;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getFournisseur(): ?string
    {
        return $this->fournisseur;
    }

    public function setFournisseur(string $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection|Document[]
     */
    public function getDocuments(): Collection
    {
        return $this->documents;
    }

    public function addDocument(Document $document): self
    {
        if (!$this->documents->contains($document)) {
            $this->documents[] = $document;
        }

        return $this;
    }

    public function removeDocument(Document $document): self
    {
        if ($this->documents->contains($document)) {
            $this->documents->removeElement($document);
        }

        return $this;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setProduit($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->contains($image)) {
            $this->images->removeElement($image);
            // set the owning side to null (unless already changed)
            if ($image->getProduit() === $this) {
                $image->setProduit(null);
            }
        }

        return $this;
    }

    public function getImage1(): ?string
    {
        return $this->image1;
    }

    /*
     *Typage supprime sinon cette erreur ==> "Expected argument of type "string", "NULL" given."
     * */
    public function setImage1($image1): self
    {
        $this->image1 = $image1;

        return $this;
    }

    public function getImage2(): ?string
    {
        return $this->image2;
    }

    public function setImage2($image2): self
    {
        $this->image2 = $image2;

        return $this;
    }

    public function getImage3(): ?string
    {
        return $this->image3;
    }

    public function setImage3($image3): self
    {
        $this->image3 = $image3;

        return $this;
    }

    public function getImage4(): ?string
    {
        return $this->image4;
    }

    public function setImage4( $image4): self
    {
        $this->image4 = $image4;

        return $this;
    }

    public function getImage5(): ?string
    {
        return $this->image5;
    }

    public function setImage5($image5): self
    {
        $this->image5 = $image5;

        return $this;
    }

    public function getImage6(): ?string
    {
        return $this->image6;
    }

    public function setImage6($image6): self
    {
        $this->image6 = $image6;

        return $this;
    }

    public function getImage7(): ?string
    {
        return $this->image7;
    }

    public function setImage7($image7): self
    {
        $this->image7 = $image7;

        return $this;
    }

    /**
     * @param File|null $image
     * @throws \Exception
     */
    public function setImageFile1(File $image = null)
    {
        $this->imageFile1 = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->date = new DateTime('now');
        }
    }

    public function getImageFile1()
    {
        return $this->imageFile1;
    }

    /**
     * @param File|null $image
     * @throws \Exception
     */
    public function setImageFile2(File $image = null)
    {
        $this->imageFile2 = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->date = new DateTime('now');
        }
    }

    public function getImageFile2()
    {
        return $this->imageFile2;
    }

    /**
     * @param File|null $image
     * @throws \Exception
     */
    public function setImageFile3(File $image = null)
    {
        $this->imageFile3 = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->date = new DateTime('now');
        }
    }

    public function getImageFile3()
    {
        return $this->imageFile3;
    }

    /**
     * @param File|null $image
     * @throws \Exception
     */
    public function setImageFile4(File $image = null)
    {
        $this->imageFile4 = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->date = new DateTime('now');
        }
    }

    public function getImageFile4()
    {
        return $this->imageFile4;
    }

    /**
     * @param File|null $image
     * @throws \Exception
     */
    public function setImageFile5(File $image = null)
    {
        $this->imageFile5 = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->date = new DateTime('now');
        }
    }

    public function getImageFile5()
    {
        return $this->imageFile5;
    }

    /**
     * @param File|null $image
     * @throws \Exception
     */
    public function setImageFile6(File $image = null)
    {
        $this->imageFile6 = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->date = new DateTime('now');
        }
    }

    public function getImageFile6()
    {
        return $this->imageFile6;
    }

    /**
     * @param File|null $image
     * @throws \Exception
     */
    public function setImageFile7(File $image = null)
    {
        $this->imageFile7 = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->date = new DateTime('now');
        }
    }

    public function getImageFile7()
    {
        return $this->imageFile7;
    }
}
