<?php  

class Musica{ 

    private $nome;
    private $id;
    private $cantor;
    private $anoLancamento;
    private $autor;
    private $album;
    private $favorita;

    /**
     * Get the value of nome
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome($nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of cantor
     */
    public function getCantor()
    {
        return $this->cantor;
    }

    /**
     * Set the value of cantor
     */
    public function setCantor($cantor): self
    {
        $this->cantor = $cantor;

        return $this;
    }

    /**
     * Get the value of anoLancamento
     */
    public function getAnoLancamento()
    {
        return $this->anoLancamento;
    }

    /**
     * Set the value of anoLancamento
     */
    public function setAnoLancamento($anoLancamento): self
    {
        $this->anoLancamento = $anoLancamento;

        return $this;
    }

    /**
     * Get the value of autor
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * Set the value of autor
     */
    public function setAutor($autor): self
    {
        $this->autor = $autor;

        return $this;
    }

    /**
     * Get the value of album
     */
    public function getAlbum()
    {
        return $this->album;
    }

    /**
     * Set the value of album
     */
    public function setAlbum($album): self
    {
        $this->album = $album;

        return $this;
    }

    /**
     * Get the value of favorita
     */
    public function getFavorita()
    {
        return $this->favorita;
    }

    /**
     * Set the value of favorita
     */
    public function setFavorita($favorita): self
    {
        $this->favorita = $favorita;

        return $this;
    }
}
