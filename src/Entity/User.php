<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="cdm_users")
 * @UniqueEntity(fields={"username"}, message="There is already an account with this username")
 */
class User implements UserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private int $id;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=false)
     */
    private string $username;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=false)
     */
    private string $email;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=false)
     */
    private string $password;

    /**
     * @var string[]
     *
     * @ORM\Column(type="json", nullable=false)
     */
    private array $roles = [];

    /**
     * @var bool
     * @ORM\Column(type="boolean")
     */
    private bool $isVerified = false;

    public function getId()
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @param string[] $roles
     */
    public function setRoles(array $roles): self
    {
        $this->roles = $roles;
    }

    public function addRole(string $role): self
    {
        $this->roles[] = $role;
        $this->roles = \array_unique($this->roles);

        return $this;
    }

    /**
     * @return string[]
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials()
    {
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    public function getGravatar(int $size = 32): string
    {
        return 'https://www.gravatar.com/avatar/' . \md5(\mb_strtolower(\trim($this->getEmail()))) . 's=' . $size;
    }
}
