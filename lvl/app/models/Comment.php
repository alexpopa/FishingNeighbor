<?php

	class Comment extends Eloquent
		{
			
			public function location(){
				return $this->belongsTo('Location');
			}
		}
		