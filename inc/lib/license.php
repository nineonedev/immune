<?php
/* 
실 오픈시 발급 
도메인 + 사이트유니크키
*/


class Lisence {
	static $keys = []; 

	static function add($newLisence = ''){
		if(isset($newLisence) && !empty($newLisence)) {
			self::$keys[] = $newLisence;
		}
	}
	
	static function getAll(){
		return self::$keys; 
	}
}

Lisence::add('e0ce11fe927d90a83f90f17ee29481c6da1b8888184a2384a0c96dee39d44f1c');
Lisence::add('937e8d5fbb48bd4949536cd65b8d35c426b80d2f830c5c308e2cdec422ae2244');
Lisence::add('00f9c37d68a584fb3f1a0ce1c3ced112f21994c8b33687bc3b8a8de2f2f202b8');


Lisence::add('08fbca007a8984f916b33dd6c8dc00f1358cf24d1c6602a80efa47d5b4b88575');