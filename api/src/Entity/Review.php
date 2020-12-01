<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ReviewRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * A review of a book
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ReviewRepository::class)
 */
class Review
{
    /**
     * @var int The id of this review.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @var int The rating of this review (between 0 and 5).
     *
     * @ORM\Column(type="smallint")
     * @Assert\Range(min=0, max=5)
     */
    public int $rating;

    /**
     * @var string the body of the review.
     *
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     */
    public string $body;

    /**
     * @var string The author of the review.
     *
     * @ORM\Column
     * @Assert\NotBlank
     */
    public string $author;

    /**
     * @var \DateTimeInterface The date of publication of this review.
     *
     * @ORM\Column(type="datetime")
     * @Assert\NotNull
     */
    public \DateTimeInterface $publicationDate;

    /**
     * @var Book The book this review is about.
     *
     * @ORM\ManyToOne(targetEntity="Book", inversedBy="reviews")
     * @Assert\NotNull
     */
    public Book $book;

    public function getId(): ?int
    {
        return $this->id;
    }
}
