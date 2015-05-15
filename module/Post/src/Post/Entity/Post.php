<?php

namespace Post\Entity;

use Base\Entity\AbstractEntity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Table(name="post", indexes={@ORM\Index(name="fk_category", columns={"category"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Post\Entity\PostRepository")
 */
class Post extends AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=80, nullable=false)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=150, nullable=true)
     */
    private $descricao;

    /**
     * @var string
     *
     * @ORM\Column(name="texto", type="text", nullable=true)
     */
    private $texto;

    /**
     * @var \DateTime
     *
     * @ORM\PrePersist
     * @ORM\Column(name="cadastro", type="datetime", nullable=false)
     */
    private $cadastro;

    /**
     * @var \DateTime
     *
     * @ORM\PosUpdate
     * @ORM\Column(name="alterado", type="datetime", nullable=true)
     */
    private $alterado;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ativo", type="boolean", nullable=true)
     */
    private $ativo = 0;

    /**
     * @var \Post\Entity\Category
     *
     * @ORM\ManyToOne(targetEntity="Post\Entity\Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category", referencedColumnName="id")
     * })
     */
    private $category;



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
     * Set titulo
     *
     * @param string $titulo
     * @return Post
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    
        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     * @return Post
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    
        return $this;
    }

    /**
     * Get descricao
     *
     * @return string 
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set texto
     *
     * @param string $texto
     * @return Post
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;
    
        return $this;
    }

    /**
     * Get texto
     *
     * @return string 
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * Set cadastro
     *
     * @param \DateTime $cadastro
     * @return Post
     */
    public function setCadastro($cadastro)
    {
        $this->cadastro = $cadastro;
    
        return $this;
    }

    /**
     * Get cadastro
     *
     * @return \DateTime 
     */
    public function getCadastro()
    {
        return $this->cadastro;
    }

    /**
     * Set alterado
     *
     * @param \DateTime $alterado
     * @return Post
     */
    public function setAlterado($alterado)
    {
        $this->alterado = $alterado;
    
        return $this;
    }

    /**
     * Get alterado
     *
     * @return \DateTime 
     */
    public function getAlterado()
    {
        return $this->alterado;
    }

    /**
     * Set ativo
     *
     * @param boolean $ativo
     * @return Post
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
    
        return $this;
    }

    /**
     * Get ativo
     *
     * @return boolean 
     */
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * Set category
     *
     * @param \Post\Entity\Category $category
     * @return Post
     */
    public function setCategory(\Categoria\Entity\Category $category = null)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return \Post\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }
}
