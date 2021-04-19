<?php
	class Review{
		private ?int $note = null;
		private ?string $user = null;
		private ?string $comment = null;
		
		function __construct(int $note, string $user, string $comment){
			
			$this->note=$note;
			$this->user=$user;
			$this->comment=$comment;
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