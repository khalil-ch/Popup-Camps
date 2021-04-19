<?php
	class Campground{
		private ?int $id = null;
		private ?int $prix = null;
		private ?string $emplacement = null;
		private ?string $description = null;
		private ?int $duree = null;
		private ?string $proprietaire = null;
		
		function __construct(int $id, int $prix, string $emplacement, string $description,int $duree, string $proprietaire){
			
			$this->id=$id;
			$this->prix=$prix;
			$this->emplacement=$emplacement;
			$this->description=$description;
			$this->duree=$duree;
			$this->proprietaire=$proprietaire;
		}
		
		function getId(): int{
			return $this->id;
		}
		function getPrix(): string{
			return $this->prix;
		}
		function getEmplacement(): string{
			return $this->emplacement;
		}
		function getDescription(): string{
			return $this->description;
		}
		function getDuree(): string{
			return $this->duree;
		}
		function getProprietaire(): string{
			return $this->proprietaire;
		}

		function setId(int $id): void{
			$this->id=$id;
		}
		function setPrix(int $prix): void{
			$this->prix=$prix;
		}
		function setEmplacement(string $emplacement): void{
			$this->emplacement=$emplacement;
		}
		function setDescription(string $description): void{
			$this->description=$description;
		}
		function setDuree(int $duree): void{
			$this->duree=$duree;
		}
		function setProprietaire(string $proprietaire): void{
			$this->proprietaire=$proprietaire;
		}
	}
?>