<?php
/**
 * @package Unlimited Elements
 * @author UniteCMS.net
 * @copyright (C) 2017 Unite CMS, All Rights Reserved. 
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * */
defined('UNLIMITED_ELEMENTS_INC') or die('Restricted access');

class UniteCreatorFiltersProcess{

	private static $filters = null;
	
	/**
	 * get request array
	 */
	private function getArrRequest(){
		
		$request = $_GET;
		if(!empty($_POST))
			$request = array_merge($request, $_POST);
		
		return($request);
	}
	
	/**
	 * add single category filter
	 */
	private function addSingleCategoryFilter($slug){
		
		$slug = trim($slug);
		
		$term = get_term_by("slug", $slug, "category");
		
		$termID = "0";
		if(!empty($term))
			$termID = $term->term_id;
		
		self::$filters["category"] = $termID;
		
	}
	
	
	/**
	 * get filters arguments
	 */
	public function getRequestFilters(){
		
		if(self::$filters !== null)
			return(self::$filters);
		
		self::$filters = array();
			
		$request = $this->getArrRequest();
		
		self::$filters = array();
		
		foreach($request as $key=>$value){
			
			switch($key){
				case "filter-category":
					
					$this->addSingleCategoryFilter($value);
					
				break;
			}
				
		}
		
		
		return(self::$filters);
	}
	
	
	/**
	 * get fitler url from the given slugs
	 */
	private function getUrlFilter_term($term, $taxonomyName){
				
		$key = "filter-term";

		$taxPrefix = $taxonomyName."--";
		
		if($taxonomyName == "category"){
			$taxPrefix = "";
			$key="filter-category";
		}
				
		$slug = $term->slug;

		$value = $taxPrefix.$slug;
		
		$urlAddition = "{$key}=".urlencode($value);

		$urlCurrent = GlobalsUC::$current_page_url;
		
		$urlCurrent = UniteFunctionsUC::removePathEndingSlash($urlCurrent);
		
		$url = UniteFunctionsUC::addUrlParams($urlCurrent, $urlAddition);
		
		return($url);
	}
	
	/**
	 * check if the term is acrive
	 */
	private function isTermActive($term, $arrActiveFilters = null){
		
		if(empty($term))
			return(false);
		
		if($arrActiveFilters === null)
			$arrActiveFilters = $this->getRequestFilters();
		
		if(empty($arrActiveFilters))
			return(false);
			
		$taxonomy = $term->taxonomy;
		
		$selectedTermID = UniteFunctionsUC::getVal($arrActiveFilters, $taxonomy);
		
		if(empty($selectedTermID))
			return(false);
			
		if($selectedTermID === $term->term_id)
			return(true);
			
		return(false);
	}
	
	/**
	 * put filters by tabs
	 */
	public function putFiltersTabs(){
		
		$arrActiveFilters = self::getRequestFilters();
		
		$taxonomy = "category";
		
		$terms = get_terms($taxonomy);
				
		?>
		
		<style>
		.uc-filters{
			list-style:none;
			margin:0px;
			padding:0px;
			display:flex;
			box-sizing:border-box;
			margin-top:20px;
			margin-bottom:20px;
		}
		.uc-filters li{
			margin:0px;
			padding:0px;
		}
		.uc-filters li a{
			padding:10px;
			border:1px solid black;
		}
		.uc-filters li.active a{
			background-color:gold;
		}
		</style>
		
		<ul class="uc-filters">
			<?php 
				$isFirst = true;
				foreach($terms as $term):
					
					$isTermActive = $this->isTermActive($term, $arrActiveFilters);
					
					$classActive = "";
					
					$termID = $term->term_id;
					$name = $term->name;
					$slug = $term->slug;
										
					$urlFilter = $this->getUrlFilter_term($term, $taxonomy);
					
					if($isTermActive == true)
						$classActive = " active";
					
					$isFirst = false;
			?>
			<li class="<?php echo $classActive?>">
				<a href="<?php echo $urlFilter?>"><?php echo $name?></a>
			</li>
				
			
			<?php endforeach?>
		</ul>
		
		
		<?php 
		
	}
	
	
	
}