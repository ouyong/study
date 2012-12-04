<?php
	class Student extends EMongodDocument{
		
		public $name;
		public $gender;
		public $age;
		public $grade; //班级
		
		public function getCollectionName(){
			
			return "student";
		}
	}
