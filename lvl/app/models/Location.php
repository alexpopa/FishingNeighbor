<?php

	class Location extends Eloquent
		{
			protected $table = 'locations';
			
			public function comments() {
				return $this->hasMany('Comment');
			}
		}