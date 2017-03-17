<?php



function formatNumber($id, $digits){
    return str_pad($id, $digits !== null ? $digits : 6, '0', STR_PAD_LEFT);
}

function limitarTexto($texto, $limite){
  $contador = strlen($texto);
  if ( $contador >= $limite ) {
      $texto = substr($texto, 0, $limite). '...';
      return $texto;
  } else{
    return $texto;
  }
} 
?>