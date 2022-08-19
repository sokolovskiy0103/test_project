<?php

namespace App\Entity;

use App\Repository\SQSMessageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SQSMessageRepository::class)]
class SQSMessage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $body = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $recieved_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(string $body): self
    {
        $this->body = $body;
        return $this;
    }

    public function getRecievedAt(): ?\DateTimeInterface
    {
        return $this->recieved_at;
    }

    public function setRecievedAt(\DateTimeInterface $recieved_at): self
    {
        $this->recieved_at = $recieved_at;

        return $this;
    }
}
