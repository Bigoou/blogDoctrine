<?php

/** @Entity @Table(name="message")**/
class Message
{
    /** @Id @Column(type="integer") @GeneratedValue**/
    private $id;
    /** @texte @Column(type="string",length=255) **/
    private $texte;
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
