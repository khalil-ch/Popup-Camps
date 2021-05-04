<?php
	class fournisseur{
		private ?string $id_f = null;
		private ?string $type_service_f = null;
        private ?string $telephone_f = null;
		private ?string $RIB_f = null;
		
		function __construct(string $id_f, string $type_service_f, string $telephone_f, string $RIB_f){
			
			$this->id_f=$id_f;
			$this->type_service_f=$type_service_f;
			$this->telephone_f=$telephone_f;
			$this->RIB_f=$RIB_f;
		}
		
		function getId_F(): string{
			return $this->id_f;
		}
		function getType_F(): string{
			return $this->type_service_f;
		}
		function getTel_F(): string{
			return $this->telephone_f;
		}
		function getRIB_F(): string{
			return $this->RIB_f;
		}

		function setId_F(string $id_f): void{
			$this->id_f=$id_f;
		}
		function setType_F(string $type_service_f): void{
			$this->type_service_f=$type_service_f;
		}
		function setTel_F(string $telephone_f): void{
			$this->telephone_f=$telephone_f;
		}
		function setRIB_F(string $RIB_f): void{
			$this->RIB_f=$RIB_f;
		}
	}
?>