<?php


namespace App\Model;


use Exception;

class Book
{
    private string $titre;
    private ?string $img;
    private ?string $auteur;
    private ?string $éditeur;
    private ?string $ISBN;
    private ?int $pages;
    private ?int $date;
    private ?string $genre;

    public function __construct($book)
    {
        try {
            $this->setTitre($book->titre);
        } catch (Exception $e) {
        }
        try {
            $this->setImg($book->img);
        } catch (Exception $e) {
        }
        try {
            $this->setAuteur($book->auteur);
        } catch (Exception $e) {
        }
        try {
            $this->setÉditeur($book->éditeur);
        } catch (Exception $e) {
        }
        try {
            $this->setISBN($book->ISBN);
        } catch (Exception $e) {
        }
        try {
            $this->setPages($book->pages);
        } catch (Exception $e) {
        }
        try {
            $this->setDate($book->date);
        } catch (Exception $e) {
        }
        try {
            $this->setGenre($book->genre);
        } catch (Exception $e) {
        }
    }


    /**
     * @return string
     */
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre(string $titre): void
    {
        $this->titre = ucfirst($titre);
    }

    /**
     * @return string|null
     */
    public function getImg(): ?string
    {
        return $this->img;
    }

    /**
     * @param string|null $img
     */
    public function setImg(?string $img): void
    {
        $this->img = $img;
    }

    /**
     * @return string|null
     */
    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    /**
     * @param string|null $auteur
     */
    public function setAuteur(?string $auteur): void
    {
        $this->auteur = ucfirst(strtolower($auteur));
    }

    /**
     * @return string|null
     */
    public function getÉditeur(): ?string
    {
        return $this->éditeur;
    }

    /**
     * @param string|null $éditeur
     */
    public function setÉditeur(?string $éditeur): void
    {
        $this->éditeur = ucfirst($éditeur);
    }

    /**
     * @return string|null
     */
    public function getISBN(): ?string
    {
        return $this->ISBN;
    }

    /**
     * @param string|null $ISBN
     */
    public function setISBN(?string $ISBN): void
    {
        $this->ISBN = $ISBN;
    }

    /**
     * @return int|null
     */
    public function getPages(): ?int
    {
        return $this->pages;
    }

    /**
     * @param int|null $pages
     */
    public function setPages(?int $pages): void
    {
        $this->pages = $pages;
    }

    /**
     * @return int|null
     */
    public function getDate(): ?int
    {
        return $this->date;
    }

    /**
     * @param int|null $date
     */
    public function setDate(?int $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string|null
     */
    public function getGenre(): ?string
    {
        return $this->genre;
    }

    /**
     * @param string|null $genre
     */
    public function setGenre(?string $genre): void
    {
        $this->genre = $genre;
    }


}
