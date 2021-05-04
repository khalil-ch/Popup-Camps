<?php
	class Review{
		private ?int $idReview = null;
		private ?string $nomCampRv = null;
		private ?int $note = null;
		private ?string $user = null;
		private ?string $comment = null;
		
		function __construct(int $idReview, string $nomCampRv,int $note, string $user, string $comment){
			$this->idReview = $idReview;
			$this->nomCampRv=$nomCampRv;
			$this->note=$note;
			$this->user=$user;
			$this->comment=$comment;
		}
		function getIdReview(): int{
			return $this->idReview;
		}
		function getNomCampRv(): string{
			return $this->nomCampRv;
		}
		function getNote(): int{
			return $this->note;
		}
		function getUser(): string{
			return $this->user;
		}
		function getComment(): string{
			return $this->comment;
		}
		function setidReview(int $idReview): void{
			$this->idReview=$idReview;
		}
		function setNomCampRv(int $nomCampRv): void{
			$this->nomCampRv=$nomCampRv;
		}
		function setNote(int $note): void{
			$this->note=$note;
		}
		function setUser(string $user): void{
			$this->user=$user;
		}
		function setComment(string $comment): void{
			$this->comment=$comment;
		}
	}
?>