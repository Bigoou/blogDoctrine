<?php

/** @Entity @Table(name="commentaire")**/
class Commentaire
{
    /** @Id @Column(type="integer") @GeneratedValue**/
    private $id;
    /** @texte @Column(type="string",length=255) **/
    private $texte;
     /** @texte @Column(type="string",length=255) **/
     private $auteur;
    /** @datepost @Column(type="date") **/
    private $datepost;
    /**
     * @ManyToOne(targetEntity="Utilisateur")
     */
    private $utilisateur;

    public function getUtilisateur()
    {
        return $this->utilisateur;
    }
    public function setUtilisateur($utilisateur)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function setAuteur($utilisateur)
    {
        $this->auteur = $utilisateur;

        return $this;
    }

    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * @ManyToOne(targetEntity="Message")
     */
    private $message;
    public function getMessage()
    {
        return $this->message;
    }
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setTexte($texte)
    {
        $this->texte = $texte;

        return $this;
    }


    public function getTexte()
    {
        return $this->texte;
    }

    public function setDatepost($datepost)
    {
        $this->datepost = $datepost;

        return $this;
    }


    public function getDatepost()
    {
        return $this->datepost;
    }
}