<?php

interface IPromoter{
	public function websiteChange($username,$password,$newWebsite);
	public function fblinkChange($username,$password,$newFb);
}