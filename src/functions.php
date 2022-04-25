<?php
// Sanitize user input

function escape($string) {
  return htmlentities($string, ENT_QUOTES, 'UTF-8');
}