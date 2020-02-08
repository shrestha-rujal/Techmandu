<?php

function presentPrice($price) {
  return money_format('$%i', $price / 100 );
}

function isActiveCategory($category, $output='active') {
  return request()->category === $category ? $output : '';
}

function checkSortOrder($sortOrder, $sortNum, $output = 'active') {
  return $sortOrder === $sortNum ? $output : '';
}
