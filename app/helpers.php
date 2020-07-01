<?php

function setActive($routeName){
   return request()->routeIs($routeName) ? 'active' : '';
}

function setSelected($routeName){
   return request()->routeIs($routeName) ? 'bg-btn-lightgreen' : '';
}

function setOptionSelected($categoryId, $productCatId){
   return ($categoryId == $productCatId) ? 'selected' : '';
}
?>