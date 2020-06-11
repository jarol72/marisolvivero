<?php

function setActive($routeName){
   return request()->routeIs($routeName) ? 'active' : '';
}

function setOptionSelected($categoryId, $productCatId){
   return ($categoryId == $productCatId) ? 'selected' : '';
}
?>