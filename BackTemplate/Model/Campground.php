<?php
	class Campground{
		private ?string $nameCamp=null;
		private ?string $imageCamp= null;
		private ?int $prix = null;
		private ?string $emplacement = null;
		private ?string $description = null;
		private ?int $duree = null;
		private ?string $proprietaire = null;
		
		function __construct(string $nameCamp, string $imageCamp,int $prix, string $emplacement, string $description,int $duree, string $proprietaire){
			$this->nameCamp=$nameCamp;
			$this->imageCamp=$imageCamp;
			$this->prix=$prix;
			$this->emplacement=$emplacement;
			$this->description=$description;
			$this->duree=$duree;
			$this->proprietaire=$proprietaire;
		}
		
		function getNameCamp(): string{
			return $this->nameCamp;
		}
		function getImageCamp(){
			return $this->imageCamp;
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

		function setNameCamp(string $nameCamp): void{
			$this->nameCamp=$nameCamp;
		}
		function setImageCamp(string $imageCamp): void{
			$this->imageCamp=$imageCamp;
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