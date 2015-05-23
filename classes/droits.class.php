<?php
	Class Droits
	{
		private $id_droit, $designation, $type;

		public function __construct()
		{
			$this->id_droit = 0;
			$this->designation = '';
			$this->type = 0;
		}

		//GETTERS
		public function getId_droit() {
			return $this->id_droit;
		}
		public function getDesignation() {
			return $this->designation;
		}
		public function getType() {
			return $this->type;
		}
		//SETTERS
		public function setId_droit($id_droit) {
			$this->id_droit = $id_droit;
		}
		public function setDesignation($designation) {
			$this->designation = $designation;
		}
		public function setType($type) {
			$this->type = $type;
		}
	}
?>