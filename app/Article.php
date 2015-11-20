<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
    protected $fillable = [
	"title",
	"body",
	"published_at",
	"user_id" //temporary!!
	];
	
	protected $dates = ["published_at"];
	
	/**
	*Scope queries to articles that have been published.
	*
	*@param $query
	*/
	public function scopePublished ($query){
		
		$query->where("published_at", "<=", Carbon::now());
		
		}
		
		public function scopeUnpublished($query){
		
		$query->where("published_at", ">=", Carbon::now());
		
		}
	
	public function setPublishedAtAttribute($date){ // <-- mutator, set the published_at attribute, @param $date
		
		$this->attributes["published_at"] = Carbon::parse($date);
		
		}
		
		/**
		* Get the published_at attribute.
		*
		* @param $date
		*@return string
		*/
		
		public function getPublishedAtAttribute($date){
			return Carbon::parse($date)->format("Y-m-d");
			}
		
		/**
		* An article is owned by a user.
		*
		* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
		*/
		
	public function user () {
		return $this->belongsTo("App\User");
		}
		
		/**
		* Get the tags associated with the given article.
		*
		* @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
		*/
	
	public function tags(){
		return $this->belongsToMany("App\Tag")->withTimestamps();
		}
		
		/**
		* Get a list of tag IDs associated with the current article
		*
		* @return array
		*/
	public function getTagListAttribute(){
		return $this->tags->lists("id")->all();
		}
}
